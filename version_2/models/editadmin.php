<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();            

        $staffRoleId = $_GET['ad'];

        $adminroleid = $_POST['role'];

        $updating = "UPDATE staffrole SET staffRoleNo = '$adminroleid' WHERE staffRoleId = '$staffRoleId'";
        $updated = $connection->query($updating);
        
        header("Location:../dashboard.php");
        exit();
?>