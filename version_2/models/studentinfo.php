<?php 
    include_once("includes/session.php");
    include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_logged_in();

    $matno = $_SESSION['matno'];

    // Get Student Info
    $getstdnt = "SELECT * FROM reglist WHERE matno='$matno'";
    $stdnt = $connection->query($getstdnt);
    confirm_query($connection, $stdnt);

    $row = $stdnt->fetch_assoc();
    $fname =  $row['fname'];
    $sname =  $row['sname'];
    $mname =  $row['mname'];
    $sex =  $row['sex'];
    $program =  $row['program'];
    $yog =  $row['yog'];
    $level =  $row['level'];
    $studentshipStatus = $row['studentshipStatus'];
?>