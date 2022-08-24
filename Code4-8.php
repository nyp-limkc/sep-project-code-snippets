require_once "../controllers/ordersController.php";

$user = $_SESSION["loggedInUser"];
if($user["role"]=="customer") {
    removeOutstandingOrders();
}