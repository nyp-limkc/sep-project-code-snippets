//Retrieve all the order details and join with the items table.
function getOrderDetailsById($order_id) {
    $sqlStatement = "SELECT od.*, i.name from order_details od INNER JOIN items i on od.item_id=i.id where od.order_id=$order_id";
    return findAll($sqlStatement);
}


//Retrieve all the orders which have been checked_out. Recall that this field is to indicate if the customer has checked out the orders.
function getAllOrders() {
    $sqlStatement = "SELECT * FROM orders where checked_out=1 order by order_date DESC";
    return findAll($sqlStatement);
}
