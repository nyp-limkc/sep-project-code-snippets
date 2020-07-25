require_once "../../controllers/restaurantController.php";

$restaurant_id = $_GET["id"];

$restaurant = getRestaurantById($restaurant_id);