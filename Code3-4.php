function getCuisines() {
    global $conn;
    $query = mysqli_query($conn,"SELECT * from cuisines");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    return $result;
}
