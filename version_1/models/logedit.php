<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_logged_in();
            
        $_SESSION['mylogid'] = $_GET['log'];

        header("Location:../logedit.php");
?>