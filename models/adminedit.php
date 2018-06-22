<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();
            
        $_SESSION['adminedit'] = $_GET['ad'];

        header("Location:../adminedit.php");
?>