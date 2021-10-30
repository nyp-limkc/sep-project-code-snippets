function getAvailableOrders() {
    global $conn;
    $date = date("Y-m-d");
    $time = date("H:i:s");

    // combine results for date > today  + date=today AND time>now (basically orders after the current time)
    $query = mysqli_query($conn,
    "select * from orders where delivery_date='$date' and delivery_time>='$time' and status='unassigned'
    UNION select * from orders where delivery_date>'$date' and status='unassigned'");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    return $result;
}