<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_country=$pdo_conn->prepare("SELECT * FROM country WHERE country_name LIKE '".$_POST['country_name']."' AND status LIKE '".$_POST['status']."'  and delete_status='0'");
    $select_country->execute();
    $country = $select_country->fetchAll();
	if(count($country)==0)
	{
		$sql = "INSERT INTO country (country_name,status) VALUES (:country_name,:status)";
		$pdo_countryment = $pdo_conn->prepare($sql);
			
		$result = $pdo_countryment->execute(array(':country_name'=>$_POST['country_name'],':status'=>$_POST['status']));
	}
	else
	{
		echo "Already Exit";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
	//else { print_r($pdo_countryment->errorinfo()); }
}
/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	
	$select_country=$pdo_conn->prepare("SELECT * FROM country WHERE country_name LIKE '".$_POST['country_name']."' AND status LIKE '".$_POST['status']."' AND country_id!='".$_POST['country_id']."' and delete_status='0'");
    $select_country->execute();
    $country = $select_country->fetchAll();
	if(count($country)==0)
	{
	   $pdo_countryment=$pdo_conn->prepare("update country set country_name='".$_POST['country_name']."',status='".$_POST['status']."' where country_id=".$_POST['country_id']);
	   $result = $pdo_countryment->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_countryment->errorinfo()); }
	
} 

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{ 
	$pdo_countryment="UPDATE   country set delete_status='1' where country_id='".$_POST['country_id']."' ";
	$country_exec=$pdo_conn->prepare($pdo_countryment);
	$country_exec->execute();
 
	$state_del="UPDATE   state set delete_status='1' where country_id='".$_POST['country_id']."' ";
	$state_exec=$pdo_conn->prepare($state_del);
	$state_exec->execute();

	$dis_del="UPDATE   district set delete_status='1' where country_id='".$_POST['country_id']."' ";
	$district_exec=$pdo_conn->prepare($dis_del);
	$district_exec->execute();

	$city_del="UPDATE   city set delete_status='1' where country_id='".$_POST['country_id']."' ";
	$city_exec=$pdo_conn->prepare($city_del);	
	$city_exec->execute();

	$city_del="UPDATE   area set delete_status='1' where country_id='".$_POST['country_id']."' ";
	$city_exec=$pdo_conn->prepare($city_del);	
	$city_exec->execute();
}

?> 