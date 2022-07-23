function getAssignedJobs($rider_id) {
    $sqlStatement = "select * from jobs j inner join orders o on j.order_id=o.id where j.rider_id=$rider_id and j.delivery_status<>'Delivered'";
    return findAll($sqlStatement);
}