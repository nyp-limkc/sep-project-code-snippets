function getCustomerCurrentOrder() {
    global $conn;
    if(isset($_SESSION["loggedInUser"])) {
        $customer_id =  $_SESSION["loggedInUser"]["id"];
        $order_query = mysqli_query($conn,"SELECT od.*, o.amount as totalAmount, i.name FROM order_details od INNER JOIN items i ON od.item_id=i.id INNER JOIN orders o ON od.order_id=o.id where o.customer_id=$customer_id and o.checked_out=0");
        $order_query_result = mysqli_fetch_all($order_query, MYSQLI_ASSOC);
        return $order_query_result;
    }
    //return empty array if the customer is not logged in
    return array();
}