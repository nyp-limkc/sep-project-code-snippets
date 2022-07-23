function getRestaurantById($id) {
    $sqlStatement="SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id where r.id=$id";
    return findOne($sqlStatement);        
}