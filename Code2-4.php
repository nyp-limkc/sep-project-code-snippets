function getOrderSummary($item_id) {
    $sqlStatement = "SELECT sum(quantity) as totalQuantity, sum(amount) as totalAmount from order_details where item_id=$item_id";
    return findOne($sqlStatement);
}