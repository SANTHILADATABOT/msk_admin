<?php 
ob_start();
session_start();
	require_once('dbConnect.php');
	
	$login_name = $_POST['login_name'];
	$login_password = $_POST['login_password'];

	$select_usercreation=$pdo_conn->prepare("SELECT * FROM usercreation  WHERE 	username='$login_name' AND password='$login_password' ");
	$select_usercreation->execute();
	
	$checklogin = $select_usercreation->fetchAll();
	
	if(count($checklogin) > 0) 
	{	
		foreach($checklogin as $value) 
		{
			$_SESSION['usercreation_id'] = $value['user_id'];
			$_SESSION['full_name'] = $value['username'];
			$_SESSION['user_roll'] = $value['user_type'];
			$_SESSION['country_id'] =   $value['country_id'];
			$_SESSION['state_id'] =   $value['state_id'];
			$_SESSION['district_id'] =   $value['district_id'];
			$_SESSION['city_id'] =   $value['city_id'];
			$_SESSION['area_id'] =   $value['area_id'];
		} 
		echo  "success";
	}
	else
	{
		echo "failed";
	}	

?>