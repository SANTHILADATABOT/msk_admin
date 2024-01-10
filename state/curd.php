<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_state=$pdo_conn->prepare("SELECT * FROM state WHERE state_name LIKE '".$_POST['state_name']."' AND status LIKE '".$_POST['status']."' and country_id='".$_POST['country_id']."' ");
    $select_state->execute();
    $state = $select_state->fetchAll();
	if(count($state) ==0)
	{
		$sql = "INSERT INTO state (country_id,state_name,status) VALUES (:country_id,:state_name,:status)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':country_id'=>$_POST['country_id'],':state_name'=>$_POST['state_name'],':status'=>$_POST['status']));
	}
	else
	{
		echo "Already Exit";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
	//else { print_r($pdo_statement->errorinfo()); }
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_state=$pdo_conn->prepare("SELECT * FROM state WHERE state_name LIKE '".$_POST['state_name']."' AND status LIKE '".$_POST['status']."' AND state_id!='".$_POST['state_id']."' ");
    $select_state->execute();
    $state = $select_state->fetchAll();
	if(count($state) ==0)
	{
	   $pdo_statement=$pdo_conn->prepare("update state set state_name='".$_POST['state_name']."',status='".$_POST['status']."',country_id='".$_POST['country_id']."' where state_id=".$_POST['state_id']);
	   $result = $pdo_statement->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_statement->errorinfo()); }
	
} 

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{
	
		 
	$pdo_statement="DELETE FROM state where state_id='".$_POST['state_id']."' ";
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}
	//else { print_r($pdo_statement->errorinfo()); }

	//District
	$dis_del="DELETE FROM district where state_id='".$_POST['state_id']."' ";
	$result=$pdo_conn->exec($dis_del);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted DISTRICT";
	}

	//City
	$city_del="DELETE FROM city where state_id='".$_POST['state_id']."' ";
	$result=$pdo_conn->exec($city_del);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted CITY";
	}

	$pdo_cityment="UPDATE area Set delete_status='1' where state_id=".$_POST['state_id'];
	$result=$pdo_conn->exec($pdo_cityment);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}
	
}

?> 