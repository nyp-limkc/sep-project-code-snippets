function updateProfile() {
    global $conn;
    if(!empty($_POST)) {
        session_start();
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $mobileNumber = $_POST["mobileNumber"];
        $address = $_POST["address"];

        mysqli_query($conn,"UPDATE users set name='$name', email='$email',password=MD5('$password') where id=$id");
        mysqli_query($conn,"UPDATE customers set mobileNumber=$mobileNumber,address='$address' where user_id=$id");

        //update the session variable as well to reflect changes on the UI
        $user = $_SESSION["loggedInUser"];
        $user["name"] = $name;
        $user["email"] = $email;
        $_SESSION["loggedInUser"] = $user;

        $_SESSION["updateProfileMessage"] = "Updated profile successfully!";
        //go back to previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function getCustomerRecord($id){
    global $conn;   
    $query = mysqli_query($conn,"SELECT * from customers c inner join users u on c.user_id=u.id where user_id=$id");
    $result = mysqli_fetch_assoc($query);
    return $result;
}