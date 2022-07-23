function updateRewardAvailability($id) {
    $sqlStatement = "UPDATE rewards SET availability=availability-1 WHERE id=$id";
    executeQuery($sqlStatement);
}