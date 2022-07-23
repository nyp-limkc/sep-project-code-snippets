function getCuisines() {
    $sqlStatement = "SELECT * from cuisines";
    return findAll($sqlStatement);
}