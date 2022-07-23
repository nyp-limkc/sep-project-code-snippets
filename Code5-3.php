function getRestaurantFromItem($itemId) {
    $sqlStatement = "SELECT r.name,r.address,i.name as itemName from items i inner join restaurants r on i.restaurant_id = r.id where i.id=$itemId";
    return findOne($sqlStatement);
}