function getAllRestaurantsByMerchant($id) {
    //select everything from restaurants and cuisine name from cuisine
    $sqlStatement = "SELECT r.*, c.name as cuisine FROM restaurants r INNER JOIN merchant_restaurant mr ON r.id=mr.restaurant_id INNER JOIN cuisines c ON c.id=r.cuisine_id WHERE mr.merchant_id=$id";
    return findAll($sqlStatement);
}