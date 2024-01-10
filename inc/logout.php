<?php 
    session_start();
	
	unset($_SESSION['usercreation_id']);
	unset($_SESSION['full_name']);
	unset($_SESSION['user_roll']);
	unset($_SESSION['account_year']);
	
	session_destroy();

			
?>