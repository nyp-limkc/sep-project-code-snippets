require_once "../../controllers/restaurantController.php";
require_once "../../controllers/ordersController.php";

$restaurant_id = $_GET["id"];

$restaurant = getRestaurantById($restaurant_id);