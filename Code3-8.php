function updateRestaurant() {
    global $conn;
    if(!empty($_POST)) {
        $restaurant_id = $_GET["id"];
        $name = $_POST["name"];
        $open_hours = $_POST["open_hours"];
        $close_hours = $_POST["close_hours"];
        $cuisine = $_POST["cuisine"];
        $website = $_POST["website"];
        $address = $_POST["address"];
        $image_name = $_FILES["image"]["name"];

        $hasFile = $_FILES["image"]["size"]!=0;
        // __DIR__ refer to the directory this file resides in.

        if($hasFile) {
            $target = __DIR__."/../views/uploaded_images/".$image_name;
            move_uploaded_file($_FILES["image"]["tmp_name"] , $target);
            mysqli_query($conn,"UPDATE restaurants set name='$name',open_hours='$open_hours',close_hours='$close_hours',cuisine_id=$cuisine,website='$website',image='$image_name',address='$address' where id=$restaurant_id");
        } else {
            mysqli_query($conn,"UPDATE restaurants set name='$name',open_hours='$open_hours',close_hours='$close_hours',cuisine_id=$cuisine,website='$website',address='$address' where id=$restaurant_id");
        }

        $_SESSION["restaurantUpdateMsg"] = "Restaurant is updated successfully!";
        //go back to previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function deleteRestaurant() {
    global $conn;
    if(!empty($_GET)) {
        $restaurant_id = $_GET["id"];
        $merchant_id = $_SESSION["loggedInUser"]["id"];

        mysqli_query($conn,"DELETE from restaurants where id=$restaurant_id");

        $_SESSION["merchantHomeMessage"] = "Restaurant is removed successfully!";
        header("Location: ../views/merchant/index.php");
    }
}