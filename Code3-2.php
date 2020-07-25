function addRestaurant() {
    global $conn;
    if(!empty($_POST)) {
        $merchant_id = $_SESSION["loggedInUser"]["id"];
        $name = $_POST["name"];
        $open_hours = $_POST["open_hours"];
        $close_hours = $_POST["close_hours"];
        $cuisine = $_POST["cuisine"];
        $website = $_POST["website"];
        $address = $_POST["address"];
        $image_name = $_FILES["image"]["name"];

        // __DIR__ refer to the directory this file resides in.
        $target = __DIR__."/../views/uploaded_images/".$image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"] , $target);

        mysqli_query($conn,"INSERT into restaurants(name,open_hours,close_hours,cuisine_id,website,image,address) values('$name','$open_hours','$close_hours',$cuisine,'$website','$image_name','$address')");
        $last_id = mysqli_insert_id($conn);
        mysqli_query($conn,"INSERT into merchant_restaurant(merchant_id,restaurant_id) values($merchant_id,$last_id)");

        $_SESSION["merchantHomeMessage"] = "Restaurant is added successfully!";
        //go back to previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
