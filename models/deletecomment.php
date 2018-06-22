<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in(); 

        $theMat = $_GET['ad'];    
        $logbookId = $_GET['logging'];

        $updating = "UPDATE logbook SET logbookComment = '' WHERE logbookId= '$logbookId'";
        $updated = mysql_query($updating);
        
        header("Location:../workdone.php?ad=$theMat");
        exit();
?>