//check to ensure there was a post data
if(!empty($_POST)) {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sqlStatement = "SELECT * from users where email='$email' and password=MD5('$password')";
    $result = findOne($sqlStatement);
    //check if result contains something.
    if($result) {
        // To be implemented by students. Check if user is banned.
        $_SESSION["loggedInUser"] = $result;
        header("Location: $GLOBALS[path]");
    } else {
        $_SESSION["loginErrorMessage"] = "You have entered the wrong login credentials. Please try again.";
        header("Location: ../views/login.php");
    }
}