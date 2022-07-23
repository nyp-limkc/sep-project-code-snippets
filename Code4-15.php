require_once "customerController.php";
require_once "rewardController.php";


//to handle form submissions
if(isset($_GET["function"])) {
    $function = $_GET["function"];
    switch($function) {
        case "add":
            addRewardRedemption();
        break;
        case "updateUsed":
            updateUsedReward();
        break;
    }
}

function addRewardRedemption() {
    //check to ensure there was a post data
    if(!empty($_POST)) {
        $reward_id = $_POST["reward_id"];
        $redeem_points = $_POST["redeem_points"];

        $user = $_SESSION["loggedInUser"];
        $customer = getCustomerRecord($user["id"]);

        if($customer["reward_points"]<$redeem_points) {
            $_SESSION["redeem_message"] = "Sorry! You do not have enough points to redeem the reward.";
        } else {
            $reward_points = $customer["reward_points"]-$redeem_points;

            $sqlStatement = "INSERT into reward_redemption(reward_id,user_id) values ($reward_id,".$user["id"].")";
            executeQuery($sqlStatement);

            updateRewardPoints($user["id"],$reward_points);  //inside customer controller
            
            updateRewardAvailability($reward_id); //inside reward controller
            
            $_SESSION["redeem_message"] = "You have successfully redeemed the reward!";
        }
        header("Location: ../views/customer/redeem_rewards.php");
    } 
}