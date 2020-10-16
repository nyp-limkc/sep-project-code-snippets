function getAllRedeemedRewards($id) {
    global $conn;
    $query = mysqli_query($conn,"SELECT t1.id,t1.description,t2.redeemed_on FROM rewards t1 INNER JOIN reward_redemption t2 ON t1.id = t2.reward_id where t2.user_id=$id and t2.has_used=0");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
}

function getUnredeemedRewards($id) {
    global $conn;
    $query = mysqli_query($conn,"SELECT * FROM rewards WHERE availability>0 and id NOT IN (SELECT reward_id FROM reward_redemption where user_id=$id)");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $result;
}