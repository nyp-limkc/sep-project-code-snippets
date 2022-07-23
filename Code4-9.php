function getCustomerRecord($id){
    $sqlStatement = "SELECT * from customers c inner join users u on c.user_id=u.id where user_id=$id";
    return findOne($sqlStatement);
}