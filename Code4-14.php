function updateRewardPoints($id,$reward_points) {
    $sqlStatement = "UPDATE customers set reward_points=$reward_points where user_id=$id";
    executeQuery($sqlStatement);
} 