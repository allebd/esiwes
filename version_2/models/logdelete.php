<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_logged_in(); 
            
        $logbookId = $_GET['log'];
        $reason = $_POST['reason'];

        $updating = "UPDATE logbook SET logbookDelete = 'deleted', logDeleteReason = '$reason' WHERE logbookId = '$logbookId'";
        $updated = $connection->query($updating);
        
        header("Location:../mylogbook.php");
        exit();
?>