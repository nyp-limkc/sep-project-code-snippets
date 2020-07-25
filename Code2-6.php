//Retrieve all the order details and join with the items table.
function getOrderDetailsById($order_id) {
    global $conn;
    $query = mysqli_query($conn, "SELECT od.*, i.name from order_details od INNER JOIN items i on od.item_id=i.id where od.order_id=$order_id");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
    return $result;
}


//Retrieve all the orders which have been checked_out. Recall that this field is to indicate if the customer has checked out the orders.
function getAllOrders() {
    global $conn;
    $customer_id =  $_SESSION["loggedInUser"]["id"];
    $order_query = mysqli_query($conn,"SELECT * FROM orders where checked_out=1 order by order_date DESC");
    $order_query_result = mysqli_fetch_all($order_query, MYSQLI_ASSOC);
    return $order_query_result;
}
