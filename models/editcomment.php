<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();
            
        $_SESSION['commentedit'] = $_GET['ad'];

        header("Location:../editcomment.php");
?>