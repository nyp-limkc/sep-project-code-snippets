//to handle form submissions
if(isset($_GET["function"])) {
    $function = $_GET["function"];
    switch($function) {
        case "register":
            registerCustomer();
            break;
    }
}

function registerCustomer() {
    if(!empty($_POST)) {
        session_start();
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $mobileNumber = $_POST["mobileNumber"];
        $address = $_POST["address"];       

        $sqlStatement = "INSERT into users(name,email,password,role) values ('$name','$email',MD5('$password'),'customer')";
        $last_id = executeQuery($sqlStatement);

        $sqlStatement = "INSERT into customers(user_id,mobileNumber,address) values ($last_id,$mobileNumber,'$address')";
        executeQuery($sqlStatement);


        //to obtain the registered user info to put into session
        $sqlStatement = "SELECT * from users where id=$last_id";
        $_SESSION["loggedInUser"] = findOne($sqlStatement);

        header("Location: $GLOBALS[path]");
    }
}
