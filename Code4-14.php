function updateRewardAvailability($id) {
    global $conn;
    mysqli_query($conn, "UPDATE rewards SET availability=availability-1 WHERE id=$id");
}