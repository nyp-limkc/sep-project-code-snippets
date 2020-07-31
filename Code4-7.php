function removeOutstandingOrders() {
    global $conn;
    $customer_id =  $_SESSION["loggedInUser"]["id"];
    $order_query = mysqli_query($conn,"SELECT * from orders where customer_id=$customer_id and checked_out=0");
    $order_query_result = mysqli_fetch_assoc($order_query);
    //remove all outstanding un-checked out orders from db
    if($order_query_result) {
        $order_id = $order_query_result["id"];
        mysqli_query($conn, "DELETE from orders where id=$order_id");
    }
}