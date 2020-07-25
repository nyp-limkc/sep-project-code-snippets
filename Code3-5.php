<?php
    $user = $_SESSION["loggedInUser"];
    $restaurants = getAllRestaurantsByMerchant($user["id"]);
    if(count($restaurants)==0) {
        echo "<p>You have no restaurants currently.</p>";
    } else {
        echo "<h2>List of restaurants</h2>";
        echo "<article class='restaurants'>";
        foreach($restaurants as $restaurant) {
?>
        <a href="restaurant.php?id=<?=$restaurant['id']?>">
            <aside class="restaurant">
                <img class="restaurant_img" src="<?='../uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>">
                <p class="restaurantName">
                    <?=$restaurant['name']?>
                </p>
            </aside>
        </a>
<?php
            
        }
        echo "</article>";
    }
?>
