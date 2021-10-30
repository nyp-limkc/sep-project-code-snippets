function getAssignedJobs($rider_id) {
    global $conn;
    $query = mysqli_query($conn,"select * from jobs j inner join orders o on j.order_id=o.id where j.rider_id=$rider_id and j.delivery_status<>'Delivered'");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    return $result;

}