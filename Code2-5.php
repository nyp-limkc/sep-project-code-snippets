<h1>Restaurants Sales</h1>
<?php
    $restaurant_count=1;
    foreach($restaurants as $restaurant) {
        echo "<article class='restaurant_sales restaurant'>";
        echo "<h2>$restaurant_count. $restaurant[name]</h2>";
        $items = getAllItemsFromRestaurant($restaurant["id"]);
        echo "<ol class='restaurant_sales'>";
        $grandTotal = 0;
        foreach($items as $item) {
            $itemOrder = getOrderSummary($item["id"]);
            echo "<li>";
            echo $item["name"];
            if(isset($itemOrder["totalQuantity"]))
            {
                echo " ( Sold: $itemOrder[totalQuantity] Sales: $$itemOrder[totalAmount] )";
                $grandTotal+=$itemOrder["totalAmount"];
            }
            echo "</li>";
        }
        echo "</ol>";
        echo "Total sales: <b>$$grandTotal</b>";
        echo "</article>";
        $restaurant_count++;
    }
?>