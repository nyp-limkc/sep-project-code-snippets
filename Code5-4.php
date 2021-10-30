<section>
<ol>
<?php
    if(count($availableOrders)==0) {
        echo "There are no available orders";
    }
    else { 
        foreach ($availableOrders as $order) {
            $orderDetails = getOrderDetailsById($order["id"]);
            $customer = getCustomerRecord($order["customer_id"]);
?>
            <li>
                    Delivery Date & Time: <u><?=$order["delivery_date"]?> <?=$order["delivery_time"]?></u><br><br>
                    <?php foreach($orderDetails as $details) {
                        $restaurant = getRestaurantFromItem($details["item_id"]);
                        echo "<b>Restaurant:</b> ".$restaurant["name"]." ( ".$restaurant["address"]." )<br>";
                        echo "<b>Item:</b> ".$restaurant["itemName"]." x ".$details["quantity"]."<br><br>";
                    }?>

                    Deliver to: <?=$customer["name"]. " at " . $customer["address"]?><br>
                    <h2>Accept job function to be implemented by students</h2>
            </li>
    <?php
        }
    }
    ?>
</ol>
</section>