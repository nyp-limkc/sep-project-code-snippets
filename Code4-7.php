function removeOutstandingOrders() {
    $customer_id =  $_SESSION["loggedInUser"]["id"];
    $sqlStatement = "SELECT * from orders where customer_id=$customer_id and checked_out=0";
    $order_query_result = findOne($sqlStatement);
    //remove all outstanding un-checked out orders from db
    if($order_query_result) {
        $order_id = $order_query_result["id"];
        $sqlStatement = "DELETE from orders where id=$order_id";
        executeQuery($sqlStatement);
    }
}