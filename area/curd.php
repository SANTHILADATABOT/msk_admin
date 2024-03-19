<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
     
    
    $select_area=$pdo_conn->prepare("SELECT * FROM area WHERE state_id='".$_POST['state_id']."' and country_id='".$_POST['country_id']."' AND district_id = '".$_POST['district_id']."' and city_id='".$_POST['city_id']."' AND area_name LIKE '".$_POST['area_name']."' ");
    $select_area->execute();
    $area = $select_area->fetchAll();
	if(count($area)==0)
	{
		$sql = "INSERT INTO area (country_id,state_id,district_id,city_id,area_name,status) VALUES (:country_id,:state_id,:district_id,:city_id,:area_name,:status)";
		$pdo_areament = $pdo_conn->prepare($sql);
			
		$result = $pdo_areament->execute(array(':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':city_id'=>$_POST['city_id'],':area_name'=>$_POST['area_name'],':status'=>$_POST['status']));
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
	$select_area=$pdo_conn->prepare("SELECT *  FROM area WHERE state_id='".$_POST['state_id']."' AND district_id='".$_POST['district_id']."' AND country_id='".$_POST['country_id']."' and area_name LIKE '".$_POST['area_name']."' AND area_id!='".$_POST['area_id']."' ");
    $select_area->execute();
    $area = $select_area->fetchAll();
	if(count($area)==0)
	{
		$pdo_areament=$pdo_conn->prepare("update area set state_id='".$_POST['state_id']."',district_id='".$_POST['district_id']."',area_name='".$_POST['area_name']."',status='".$_POST['status']."',city_id='".$_POST['city_id']."' where area_id=".$_POST['area_id']);
		$result = $pdo_areament->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_areament->errorinfo()); }
	
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{
	
	$pdo_areament="UPDATE area  set delete_status='1' where area_id=".$_POST['area_id'];
	$result=$pdo_conn->exec($pdo_areament);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}
	//else { print_r($pdo_areament->errorinfo()); }
	
}


 ?>