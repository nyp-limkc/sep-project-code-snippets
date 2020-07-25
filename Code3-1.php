//to handle form submissions
if(isset($_GET["function"])) {
    $function = $_GET["function"];
    session_start();
    switch($function) {
        case "addRestaurant":
            addRestaurant();
        break;
        case "updateRestaurant":
            updateRestaurant();
        break;
        case "removeRestaurant":
            deleteRestaurant();
        break;
    }
}
