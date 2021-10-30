function getRestaurantFromItem($itemId) {
    global $conn;
    $query = mysqli_query($conn,"SELECT r.name,r.address,i.name as itemName from items i inner join restaurants r on i.restaurant_id = r.id where i.id=$itemId");
    $result = mysqli_fetch_assoc($query); 
    return $result;
}