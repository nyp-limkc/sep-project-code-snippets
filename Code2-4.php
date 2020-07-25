function getOrderSummary($item_id) {
    global $conn;
    $query = mysqli_query($conn, "SELECT sum(quantity) as totalQuantity, sum(amount) as totalAmount from order_details where item_id=$item_id");
    $result = mysqli_fetch_assoc($query);
    return $result;
}
