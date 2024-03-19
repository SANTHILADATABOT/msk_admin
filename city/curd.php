<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_city=$pdo_conn->prepare("SELECT * FROM city WHERE state_id='".$_POST['state_id']."' AND country_id='".$_POST['country_id']."' AND district_id LIKE '".$_POST['district_id']."' AND city_name LIKE '".$_POST['city_name']."' ");
    $select_city->execute();
    $city = $select_city->fetchAll();
	if(count($city)==0)
	{
		$sql = "INSERT INTO city (country_id,state_id,district_id,city_name,status) VALUES (:country_id,:state_id,:district_id,:city_name,:status)";
		$pdo_cityment = $pdo_conn->prepare($sql);
			
		$result = $pdo_cityment->execute(array(':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':city_name'=>$_POST['city_name'],':status'=>$_POST['status']));
	}
	else
	{
		echo "Already Exit";
	}
	
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_city=$pdo_conn->prepare("SELECT *  FROM city WHERE state_id='".$_POST['state_id']."' AND district_id='".$_POST['district_id']."' AND country_id='".$_POST['country_id']."' and city_name LIKE '".$_POST['city_name']."' AND city_id!='".$_POST['city_id']."' ");
    $select_city->execute();
    $city = $select_city->fetchAll();
	if(count($city)==0)
	{
		$pdo_cityment=$pdo_conn->prepare("update city set state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',city_name='".$_POST['city_name']."',status='".$_POST['status']."' where city_id=".$_POST['city_id']);
		$result = $pdo_cityment->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_cityment->errorinfo()); }
	
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{
	
	$pdo_cityment="UPDATE city set delete_status='1' where city_id=".$_POST['city_id'];
	$city_exec=$pdo_conn->prepare($pdo_cityment);
	$result = $city_exec->execute();
	//$result=$pdo_conn->execute($pdo_cityment);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}
	//else { print_r($pdo_cityment->errorinfo()); }
	
}


 ?>
 
 