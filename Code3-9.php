function getRestaurantById($id) {
    global $conn;
    $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id where r.id=$id");
    $result = mysqli_fetch_assoc($query); 
    return $result;
}