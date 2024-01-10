<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{
	$select_blood=$pdo_conn->prepare("SELECT COUNT(blood_id) FROM blood_group WHERE blood_group_name LIKE '".$_POST['blood_group_name']."' ");
    $select_blood->execute();
    $bloodgroup = $select_blood->fetchAll();

	if($bloodgroup[0]['COUNT(blood_id)']==0)
	{
		$sql = "INSERT INTO blood_group(blood_group_name,description,status) VALUES (:blood_group_name,:description,:status)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':blood_group_name'=>$_POST['blood_group_name'],':description'=>$_POST['description'],':status'=>$_POST['status']));
	}
	else
	{
		echo "error";
	}
	if (!empty($result) )
	{
	  echo $msg = "Successfully Created";
	}	
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_blood=$pdo_conn->prepare("SELECT COUNT(blood_id) FROM blood_group WHERE blood_group_name LIKE '".$_POST['blood_group_name']."' AND blood_id!='".$_POST['blood_id']."'");
    $select_blood->execute();
    $blood = $select_blood->fetchAll();

	if($blood[0]['COUNT(blood_id)']==0)
	{
		$pdo_statement=$pdo_conn->prepare("update blood_group set blood_group_name='".$_POST['blood_group_name']."',description='".$_POST['description']."',status='".$_POST['status']."' where blood_id=".$_POST['blood_id']);
		$result = $pdo_statement->execute();
	}
	else
	{
		echo "error";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{	
	$pdo_statement="DELETE FROM blood_group where blood_id=".$_POST['blood_id'];
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}	
}

?>