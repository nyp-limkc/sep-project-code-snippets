function getAllItemsFromRestaurant($id) {
    $sqlStatement = "SELECT * from items where restaurant_id=$id";
    return findAll($sqlStatement);
}