<?php
	if(!isset($_SESSION)) 
	{
		session_start();
		  
		session_set_cookie_params(2*7*24*60*60);
	}
	
	function logged_in()
	{
		return isset($_SESSION['is_logged_in']);
		
	}

	function confirm_logged_in()
	{
		if(!logged_in())
		{
			header("Location:index.php");
		}
	}

	function adminlogged_in()
	{
		return isset($_SESSION['is_adminlogged_in']);
		
	}

	function confirm_adminlogged_in()
	{
		if(!adminlogged_in())
		{
			header("Location:siwesadmin.php");
		}
	}
