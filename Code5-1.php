function getAvailableOrders() {
    $date = date("Y-m-d");
    $time = date("H:i:s");

    // combine results for (date>today)  + (date=today AND time>=now) (basically orders after the current time)

    $sqlStatement = "select * from orders where delivery_date='$date' and delivery_time>='$time' and status='unassigned'
    UNION select * from orders where delivery_date>'$date' and status='unassigned'";

    return findAll($sqlStatement);
}