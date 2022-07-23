function searchRestaurants($search) {
    $sqlStatement = "SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id where r.name like '%$search%'";
    return findAll($sqlStatement);
}