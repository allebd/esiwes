<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in(); 
            
        $supervisor = $_SESSION['supervisor'];
        $stdntmatno = $_POST['stdntmatno'];

        $updating = "UPDATE siwespost SET siwesOfficer = '$supervisor' WHERE siwesMat= '$stdntmatno'";
        $updated = $connection->query($updating);
        
        header("Location:../students.php");
        exit();
?>