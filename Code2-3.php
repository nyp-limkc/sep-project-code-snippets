function getAllItemsFromRestaurant($id) {
    global $conn;
    $query = mysqli_query($conn,"SELECT * from items where restaurant_id=$id");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    return $result;
}
