function getAllRedeemedRewards($id) {
    $sqlStatement = "SELECT t1.id,t1.description,t2.redeemed_on FROM rewards t1 INNER JOIN reward_redemption t2 ON t1.id = t2.reward_id where t2.user_id=$id and t2.has_used=0";
    return findAll($sqlStatement);
}

function getUnredeemedRewards($id) {
    $sqlStatement = "SELECT * FROM rewards WHERE availability>0 and id NOT IN (SELECT reward_id FROM reward_redemption where user_id=$id)";
    return findAll($sqlStatement);
}