function searchRestaurants($search) {
    global $conn;
    $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id where r.name like '%$search%'");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    return $result;
}