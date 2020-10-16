function updateRewardPoints($id,$reward_points) {
    global $conn;
    mysqli_query($conn,"UPDATE customers set reward_points=$reward_points where user_id=$id");
} 