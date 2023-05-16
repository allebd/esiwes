<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
        // include_once("studentinfo.php");
        require('../assets/fpdf/fpdf.php');

        $matno = $_SESSION['matno'];

        confirm_logged_in();
            
        if($_POST['logbookDesc'] == '')
        {
                header("Location:../mylogs.php?error=description");
        }else{
                if(((($_FILES["logbookAttach"]["type"] == "application/msword") 
                        || ($_FILES["logbookAttach"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
                        || ($_FILES["logbookAttach"]["type"] == "application/vnd.ms-excel")
                        || ($_FILES["logbookAttach"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
                        || ($_FILES["logbookAttach"]["type"] == "application/pdf")) 
                        && ($_FILES["logbookAttach"]["size"] < 3000000)) 
                        || ($_FILES['logbookAttach']['name'] == ''))
                {
                        if($_FILES['logbookAttach']['name'] != '')
                        {
                        move_uploaded_file($_FILES["logbookAttach"]["tmp_name"],"../attachlogs/".$matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES["logbookAttach"]["name"]);                
                        }

                        $logbookMat = $matno;
                        $logbookDesc = $_POST['logbookDesc'];
                        
                        if($_FILES['logbookAttach']['name'] != '')
                        {
                        $logbookAttach = $matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES['logbookAttach']['name'];
                        }else{
                        $logbookAttach = '';       
                        }

                        $logbookDate = date('Y-m-d');
                        $logbookTime = date('H:i:s');


                        // Insert the new work done
                        $newprogress = $connection->query("INSERT INTO logbook (logbookMat, logbookDesc, logbookAttach, logbookDate, logbookTime) 
                                VALUES ('$logbookMat', '$logbookDesc','$logbookAttach','$logbookDate', '$logbookTime')");
                        confirm_query($connection, $newprogress);                

                        if($newprogress)
                        {
                                $newlogprocess = "SELECT * FROM logbook ORDER BY logbookId DESC LIMIT 1";
                                $thelogprocess = $connection->query($newlogprocess);
                                $logrow = $thelogprocess->fetch_assoc();;
                                $logbookId = $logrow['logbookId'];
                                $loggingDesc = html_entity_decode(strip_tags($logrow['logbookDesc']));

                                $pdflogging = '../pdflogs/'.$logbookMat.' '.$logbookDate.' ('.$logbookId.').pdf';

                                $pdf = new FPDF();
                                $pdf->AddPage();
                                $pdf->SetFont('Times','',12);
                                $pdf->MultiCell(0, 5, $loggingDesc);
                                $pdf->Output($pdflogging, 'F');

                                header("Location:../mylogbook.php");
                        }else{
                                //not successful
                                echo "New Work Done cannot be added";
                        }
                }else{
                        header("Location:../mylogs.php?error=attachment");
                }
        }
?>