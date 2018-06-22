<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();
            
        $_SESSION['supervisor'] = $_SESSION['staffno'];

        header("Location:../students.php");
?>