//to handle form submissions
if(isset($_GET["function"])) {
    $function = $_GET["function"];
    switch($function) {
        case "register":
            registerMerchant();
    }
}

function registerMerchant() {
    if(!empty($_POST)) {
        session_start();
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $mobileNumber = $_POST["mobileNumber"];
        $company = $_POST["company"];

        $sqlStatement = "INSERT into users(name,email,password,role) values ('$name','$email',MD5('$password'),'merchant')";
        $last_id = executeQuery($sqlStatement);

        $sqlStatement = "INSERT into merchants(user_id,mobileNumber,company) values ($last_id,$mobileNumber,'$company')";
        executeQuery($sqlStatement);

        //to obtain the registered user info to put into session
        $sqlStatement = "SELECT * from users where id=$last_id";
        $_SESSION["loggedInUser"] = findOne($sqlStatement);

        header("Location: ../views/merchant/index.php");
    }
}