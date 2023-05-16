<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
            
        confirm_adminlogged_in();
            
        if(($_POST['staff'] != '') || ($_POST['role'] != ''))
        {
                $staff = $_POST['staff'];
                $adminroleid = $_POST['role'];
                $loginTime = date('Y-m-d H:i:s');


                // Insert the new admin
                $newprogress = $connection->query("INSERT INTO staffrole (staffNum, staffRoleNo, loginTime) 
                        VALUES ('$staff', '$adminroleid', '$loginTime')");
                confirm_query($connection, $newprogress);

                if($newprogress)
                {
                        header("Location:../dashboard.php");
                }else{
                        //not successful
                        echo "Admin cannot be added";
                }
        }else{
                header("Location:../dashboard.php");
        }
?>