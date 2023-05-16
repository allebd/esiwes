<?php
		include_once("../includes/session.php");
        include_once("../includes/zz.php"); 
        include_once("../includes/functions.php");

		$letterId = $_GET['letter'];

		$thefile = '../acceptance/'.$letterId;

		header('Content-Description: File Transfer');
	    header('Content-Type: application/force-download');
	    header("Content-Disposition: attachment; filename=\"" . basename($thefile) . "\";");
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($thefile));
	    ob_clean();
	    flush();
	    readfile($thefile); 

?>.