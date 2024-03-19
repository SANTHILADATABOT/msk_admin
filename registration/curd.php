<?php
error_reporting(0);
require_once('../inc/dbConnect.php');
 
if($_POST['action']=="Add")
{
	$select_registration=$pdo_conn->prepare("SELECT  * FROM registration WHERE   mobile='".$_POST['mobile']."' ");
    $select_registration->execute();
    $registration = $select_registration->fetchAll();

	if(count($registration)==0)
	{
		$sql = "INSERT INTO registration (name,user_type,active_status,mobile,country_id,state_id,district_id,city_id,area_id) VALUES (:name,:user_type,:active_status,:mobile,:country_id,:state_id,:district_id,:city_id,:area_id)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':name'=>$_POST['name'],':user_type'=>$_POST['user_type'],':active_status'=>$_POST['active_status'],':mobile'=>$_POST['mobile'],':country_id'=>$_POST['country_id'],':state_id'=>$_POST['state_id'],':district_id'=>$_POST['district_id'],':city_id'=>$_POST['city_id'],':area_id'=>$_POST['area_id']));
	}
	else
	{
		echo "Already Exit";
	}
	if($result==TRUE)
	{
		echo "Success";
	}
	else 
	{ 
		$array = array('error'=> $pdo_statement->errorinfo());
		echo json_encode($array);
		
	}
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_registration=$pdo_conn->prepare("SELECT COUNT(user_id) FROM registration WHERE name LIKE '".$_POST['name']."' AND password LIKE '".$_POST['password']."' AND email LIKE '".$_POST['email']."' AND user_type LIKE '".$_POST['user_type']."' AND user_id!='".$_POST['user_id']."'");
    $select_registration->execute();
    $registration = $select_registration->fetchAll();
	if($registration[0]['COUNT(user_id)']==0)
	{
		$pdo_statement=$pdo_conn->prepare("update registration set name='".$_POST['name']."',password='".$_POST['password']."',email='".$_POST['email']."',user_type='".$_POST['user_type']."',active_status='".$_POST['active_status']."' where user_id=".$_POST['user_id']);
		$result = $pdo_statement->execute();
	}
	else
	{
		echo "error";
	}
	if(!empty($result)) 
	{
		echo $msg = "Successfully Updated";
	}	
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{
	$pdo_statement="DELETE FROM registration where user_id=".$_POST['user_id'];
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}
}

/************************************* State ********************************************/

?>