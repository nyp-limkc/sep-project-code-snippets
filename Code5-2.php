require_once "../../controllers/jobController.php";
require_once "../../controllers/ordersController.php";
require_once "../../controllers/itemController.php";
require_once "../../controllers/customerController.php";

$availableOrders = getAvailableOrders();
$user = $_SESSION["loggedInUser"];