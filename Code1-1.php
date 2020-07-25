<?php
    if(isset($_SESSION["loginErrorMessage"])) {
        echo $_SESSION["loginErrorMessage"];
        unset($_SESSION["loginErrorMessage"]);
    }
?>
