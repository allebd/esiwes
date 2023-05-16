<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
        //include_once("studentinfo.php");
           
        $matno = $_SESSION['matno'];
         
        confirm_logged_in();
            
        if(((($_FILES["siwesCompLetter"]["type"] == "application/pdf") 
            || ($_FILES["siwesCompLetter"]["type"] == "application/msword")
            || ($_FILES["siwesCompLetter"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
         && ($_FILES["siwesCompLetter"]["size"] < 3000000)) || ($_FILES['siwesCompLetter']['name'] == ''))
        {
                if($_FILES['siwesCompLetter']['name'] != '')
                {
                    move_uploaded_file($_FILES["siwesCompLetter"]["tmp_name"],"../acceptance/".$matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES["siwesCompLetter"]["name"]);                
                }

                $siwesMat = $matno;
                $siwesCompName = $_POST['siwesCompName'];
                $siwesCompAdd = $_POST['siwesCompAdd'];
                $siwesCompCountry = $_POST['siwesCompCountry'];
                $siwesSupervisor = $_POST['siwesSupervisor'];
                $siwesSupervisorNo = $_POST['siwesSupervisorNo'];
                $siwesSupervisorSkype = $_POST['siwesSupervisorSkype'];
                $siwesStudentSkype = $_POST['siwesStudentSkype'];

                if($_POST['siwesCompCountry'] != "NIGERIA")
                {
                        $siwesCompState = '';
                }else{
                      $siwesCompState = $_POST['siwesCompState'];  
                }
                
                if($_FILES['siwesCompLetter']['name'] != '')
                {
                    $siwesCompLetter = $matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES['siwesCompLetter']['name'];
                }else{
                    $siwesCompLetter = '';
                }
                
                $siwesCompDate = date('Y-m-d');
                $siwesCompTime = date('H:i:s');

                $getpost = "SELECT * FROM siwespost WHERE siwesMat = '$matno'";
                $thepost = $connection->query(getpost);

                if(mysql_num_rows($thepost) > 1)
                {
                    // Update the siwes posting
                    $newprogress = $connection->query("UPDATE siwespost SET siwesCompName = '$siwesCompName', siwesCompAdd = '$siwesCompAdd', siwesCompCountry = '$siwesCompCountry', siwesCompState = '$siwesCompState', siwesCompLetter = '$siwesCompLetter', siwesSupervisor = '$siwesSupervisor', siwesSupervisorNo = '$siwesSupervisorNo', siwesSupervisorSkype = '$siwesSupervisorSkype', siwesStudentSkype = '$siwesStudentSkype' WHERE siwesMat = '$siwesMat'");
                }else{
                    // Insert the new siwes posting
                    $newprogress = $connection->query("INSERT INTO siwespost (siwesMat, siwesCompName, siwesCompAdd, siwesCompCountry, siwesCompState, siwesCompLetter, siwesCompDate, siwesCompTime, siwesSupervisor, siwesSupervisorNo, siwesSupervisorSkype, siwesStudentSkype) 
                            VALUES ('$siwesMat', '$siwesCompName','$siwesCompAdd','$siwesCompCountry', '$siwesCompState','$siwesCompLetter','$siwesCompDate', '$siwesCompTime', '$siwesSupervisor','$siwesSupervisorNo','$siwesSupervisorSkype', '$siwesStudentSkype')", $connection);
                }

                confirm_query($connection, $newprogress);

                if($newprogress)
                {
                    header("Location:../siwes.php");
                }else{
                    //not successful
                    echo "SIWES posting cannot be added";
                }
        }else{
                header("Location:../mysiwes.php");
        }
?>