if(isset($_SESSION["loggedInUser"])) {
    $user = $_SESSION["loggedInUser"];
    $role = $user["role"];
    if($role=="admin") {
        header("Location: ./views/admin/index.php");
    } else if($role=="merchant") {
        header("Location: ./views/merchant/index.php");
    }
}
