<?php
    if(isset($_SESSION["deliveryConfirmation"])) {
        echo "<script>alert('".$_SESSION["deliveryConfirmation"]."')</script>";
        unset($_SESSION["deliveryConfirmation"]);
    }
    $user = $_SESSION["loggedInUser"];
    $assignedJobs = getAssignedJobs($user['id']);
    if(count($assignedJobs)==0) {
        echo "No jobs assigned to you yet.";
    } else {
        echo "<ol>";
        foreach($assignedJobs as $job) {
    ?>
            <li>
                <h3>Order details to be implemented by students</h3>        
                <h3>Update job status to be implemented by students</h3>
            </li>
    <?php
        }
        echo "</ol>";
    }
?>