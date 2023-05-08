<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in(); 
            
        $stdntmatno = $_GET['ad'];

        $updating = "UPDATE siwespost SET siwesOfficer = '' WHERE siwesMat= '$stdntmatno'";
        $updated = mysql_query($updating);
        
        header("Location:../students.php");
        exit();
?>