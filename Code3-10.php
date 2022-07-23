<?php
    $edit = isset($_POST["edit"]);
?>
<article class="restaurant">
    <img class="restaurant_img" src="../uploaded_images/<?=$restaurant['image']?>" alt="<?=$restaurant['image']?>">
    <?php
        if($edit) {
            echo "<form action='../../controllers/restaurantController.php?function=updateRestaurant&id=$restaurant[id]' enctype='multipart/form-data' method='POST'>";
            echo "<input type='file' name='image' id='image' accept='image/*' onchange='readURL(this);'><br>";
        }
    ?>
    <aside class="restaurant_description">
        <?php
            if(!$edit) {
        ?>
                <h3><?=$restaurant["name"];?></h3>
                <!-- the date function is to format the SQL time to more human-readable format.  -->
                <div>Opened from <?=date("h:i A",strtotime($restaurant["open_hours"]))?> to <?=date("h:i A",strtotime($restaurant["close_hours"]))?></div>
                <div>
                    Type of cuisine: <?=$restaurant['cuisine']?><br>
                    Website: <a href="<?=$restaurant['website']?>" target="_blank"><?=$restaurant['website']?></a><br>
                    Address: <?=$restaurant['address']?>
                </div>
        <?php
            } else {
        ?>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?=$restaurant["name"];?>" required><br>
                <label for="open_hours">Opening hours</label>
                <input type="time" name="open_hours" id="open_hours" value="<?=$restaurant["open_hours"]?>" required><br>
                <label for="close_hours">Closing hours</label>
                <input type="time" name="close_hours" id="close_hours" value="<?=$restaurant["close_hours"]?>" required><br>
                <label for="cuisine">Cuisine:</label>
                <select name="cuisine" id="cuisine" required>
                <?php
                    $cuisines = getCuisines();
                    foreach ($cuisines as $cuisine) {
                        if($restaurant["cuisine"]==$cuisine["name"]) {
                            echo "<option value='$cuisine[id]' selected=true>$cuisine[name]</option>";
                        } else {
                            echo "<option value='$cuisine[id]'>$cuisine[name]</option>";
                        }
                    }
                ?>
                </select><br>
                <label for="website">Website:</label>
                <input type="text" name="website" id="website" value="<?=$restaurant['website']?>" required><br>
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="20" rows="5" required><?=$restaurant['address']?></textarea><br>
                <input type="submit" value="Update restaurant information">
                </form>
        <?php
            }
        ?>
    </aside>
    <?php
        if(!$edit) {
    ?>
        <form method="post">
            <input type='submit' name="edit" id='edit' value='Edit restaurant information'>
        </form>
        <form action="../../controllers/restaurantController.php?function=removeRestaurant&id=<?=$restaurant["id"]?>" method='post' onsubmit="return confirmDelete();">
            <input type='submit' name='delete' value='Delete restaurant'>
        </form>
    <?php
        }
    ?>
</article>