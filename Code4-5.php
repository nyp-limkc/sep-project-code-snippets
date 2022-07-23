//to handle form submissions
if(isset($_GET["function"])) {
    $function = $_GET["function"];
    session_start();
    switch($function) {
        case "add":
            addOrder();
        break;
    }
}

function addOrder() {
    if(!isset($_SESSION["loggedInUser"])) {
        $_SESSION["orderPromptMessage"] = "Please <a href='$GLOBALS[viewsPath]/login.php'>login</a> before making an order";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        if(!empty($_POST)) { 
            $customer_id =  $_SESSION["loggedInUser"]["id"];
            $sqlStatement = "SELECT * from orders where customer_id=$customer_id and checked_out=0";
            $order_query_result = findOne($sqlStatement);
            $order_id = -1;
            //if order has been created before, it means it is the current order but haven't checked out
            if($order_query_result) {
                $order_id = $order_query_result["id"];
            } else {    //otherwise, create a new order record
                $sqlStatement = "INSERT into orders (customer_id) values ($customer_id)";
                $order_id = executeQuery($sqlStatement);
            }

            $item_id = $_POST["item_id"];
            $item_price = $_POST["item_price"];

            $sqlStatement = "SELECT * from order_details where order_id=$order_id and item_id=$item_id";
            $order_detail_query_result = findOne($sqlStatement);

            //if there exist the item in this particular order, then update the quantity and amouunt
            if($order_detail_query_result) {
                $sqlStatement = "UPDATE order_details set quantity=quantity+1, amount=amount+$item_price where order_id=$order_id and item_id=$item_id";
                executeQuery($sqlStatement);
            } else {
                $sqlStatement = "INSERT into order_details (order_id,item_id,quantity,amount) values($order_id,$item_id,1,$item_price)";
                executeQuery($sqlStatement);
            }

            //update total amount in orders table
            $sqlStatement = "UPDATE orders set amount=amount+$item_price where id=$order_id";
            executeQuery($sqlStatement);
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}