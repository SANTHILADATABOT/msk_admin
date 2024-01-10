<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_district=$pdo_conn->prepare("SELECT * FROM district WHERE state_id='".$_POST['state_id']."' AND district_name LIKE '".$_POST['district_name']."' and country_id='".$_POST['country_id']."' ");
    $select_district->execute();
    $district = $select_district->fetchAll();
	if(count($district)==0)
	{
		$sql = "INSERT INTO district (country_id,state_id,district_name,status) VALUES (:country_id,:state_id,:district_name,:status)";
		$pdo_districtment = $pdo_conn->prepare($sql);
			
		$pdo_array=array(':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_name'=>$_POST['district_name'],':status'=>$_POST['status']);

		$result = $pdo_districtment->execute($pdo_array);
	}
	else
	{
		echo "Already Exit";
	}
	 
	
	if (!empty($result)){
	  echo $msg = "Successfully Created";
	}
	/*else 
	{ 
		$array = array('error'=> $pdo_districtment->errorinfo());
		echo json_encode($array);
		
	}*/
	//else { print_r($pdo_cityment->errorinfo()); }
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_district=$pdo_conn->prepare("SELECT COUNT(district_id) FROM district WHERE state_id LIKE '".$_POST['state_id']."' AND district_name LIKE '".$_POST['district_name']."' AND district_id!='".$_POST['district_id']."' ");
    $select_district->execute();
    $district = $select_district->fetchAll();
	if($district[0]['COUNT(district_id)']==0)
	{
		$pdo_districtment=$pdo_conn->prepare("update district set state_id='".$_POST['state_id']."',district_name='".$_POST['district_name']."',status='".$_POST['status']."' where district_id=".$_POST['district_id']);
		$result = $pdo_districtment->execute();
	}
	else
	{
		echo "error";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_cityment->errorinfo()); }
	
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{
	
	$pdo_cityment="UPDATE district Set delete_status='1' where district_id=".$_POST['district_id'];
	$result=$pdo_conn->exec($pdo_cityment);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}

	$pdo_cityment="UPDATE city Set delete_status='1' where district_id=".$_POST['district_id'];
	$result=$pdo_conn->exec($pdo_cityment);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}

	$pdo_cityment="UPDATE area Set delete_status='1' where district_id=".$_POST['district_id'];
	$result=$pdo_conn->exec($pdo_cityment);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}
	//else { print_r($pdo_cityment->errorinfo()); }
	
}



?>