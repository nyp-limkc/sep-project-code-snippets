//to handle form submissions
if(isset($_GET["function"])) {
    session_start();
    $function = $_GET["function"];
    switch($function) {
        case "register":
            registerRider();
            break;
    }
}

function registerRider() {
    if(!empty($_POST)) {
        session_start();
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $mobileNumber = $_POST["mobileNumber"];
        $vehicle = $_POST["vehicleNumber"];
        $account = $_POST["accountNumber"];

        $sqlStatement = "INSERT into users(name,email,password,role) values ('$name','$email',MD5('$password'),'rider')";
        $last_id = executeQuery($sqlStatement);

        $sqlStatement = "INSERT into riders(user_id,mobile_number,vehicle_number,account_number) values ($last_id,$mobileNumber,'$vehicle','$account')";
        executeQuery($sqlStatement);

        //to obtain the registered user info to put into session
        $sqlStatement = "SELECT * from users where id=$last_id";
        $result = findOne($sqlStatement);
        $_SESSION["loggedInUser"] = $result;

        header("Location: ../views/rider/index.php");
    }
}