function getCustomerCurrentOrder() {
    if(isset($_SESSION["loggedInUser"])) {
        $customer_id =  $_SESSION["loggedInUser"]["id"];
        $sqlStatement = "SELECT od.*, o.amount as totalAmount, i.name FROM order_details od INNER JOIN items i ON od.item_id=i.id INNER JOIN orders o ON od.order_id=o.id where o.customer_id=$customer_id and o.checked_out=0";
        $order_query_result = findAll($sqlStatement);
        return $order_query_result;
    }
    //return empty array if the customer is not logged in
    return array();
}