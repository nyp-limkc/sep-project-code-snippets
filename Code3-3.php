function getAllRestaurantsByMerchant($id) {
    global $conn;
    //select everything from restaurants and cuisine name from cuisine
    $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine FROM restaurants r INNER JOIN merchant_restaurant mr ON r.id=mr.restaurant_id INNER JOIN cuisines c ON c.id=r.cuisine_id WHERE mr.merchant_id=$id");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    return $result;
}
