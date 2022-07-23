<section class="searchSection">
    <form method="post">
        <input type="text" name="search" id="search" size="40" placeholder="Search restaurants">
        <input type="submit" value="Search">
    </form>
</section>
<?php
    if(isset($_POST['search']) && $_POST['search']!="") {
        echo "Showing search results for \"". $_POST['search'] . "\"<br><br>";
    }
?>