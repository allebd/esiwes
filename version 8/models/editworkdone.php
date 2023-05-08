<?php
        include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php"); 
        // include_once("studentinfo.php");
        require('../assets/fpdf/fpdf.php');
            
        $matno = $_SESSION['matno'];

        confirm_logged_in();

        $logbookId = $_GET['logging'];
            
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
                        if($logbookAttach != '')
                        {
                        move_uploaded_file($_FILES["logbookAttach"]["tmp_name"],"../attachlogs/".$matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES["logbookAttach"]["name"]);                
                        }

                        $logbookMat = $matno;
                        $logbookDesc = $_POST['logbookDesc'];
                        $logbookAttach = $_FILES['logbookAttach']['name'];
                        $logbookAttached = $matno.' '.date('Y_m_d').' '.date('H_i_s').' '.$_FILES['logbookAttach']['name'];

                        if($logbookAttach == '')
                        {
                                // Update the work done
                                $updating = "UPDATE logbook SET logbookDesc = '$logbookDesc' WHERE logbookId = '$logbookId'";
                                $updated = mysql_query($updating);
                        }else{
                                // Update the work done
                                $updating = "UPDATE logbook SET logbookDesc = '$logbookDesc', logbookAttach = '$logbookAttached' WHERE logbookId = '$logbookId'";
                                $updated = mysql_query($updating);
                        }
                        
                        if($updated)
                        {
                                $newlogprocess = "SELECT * FROM logbook WHERE logbookId = '$logbookId'";
                                $thelogprocess = mysql_query($newlogprocess);
                                $logrow = mysql_fetch_array($thelogprocess);
                                $logbookId = $logrow['logbookId'];                                
                                $logbookDate = $logrow['logbookDate']; 

                                $loggingDesc = html_entity_decode(strip_tags($logrow['logbookDesc']));

                                $pdflogging = '../pdflogs/'.$logbookMat.' '.$logbookDate.' Update ('.$logbookId.').pdf';
                                //$pdflogging = 'http://covenantuniversity.edu.ng/~/attachlogs/'.$logbookMat.' '.$logbookDate.' Update ('.$logbookId.').pdf';

                                $pdf = new FPDF();
                                $pdf->AddPage();
                                $pdf->SetFont('Times','',12);
                                $pdf->MultiCell(0, 5, $loggingDesc);
                                $pdf->Output($pdflogging, 'F');

                                header("Location:../mylogbook.php");
                        }else{
                                //not successful
                                echo "The Work Done cannot be updated";
                        }
                }else{
                        header("Location:../mylogs.php?error=attachment");
                }
        }
?>