<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{
	$select_surgical=$pdo_conn->prepare("SELECT COUNT(surgical_id) FROM surgical WHERE surgical_name LIKE '".$_POST['surgical_name']."' ");
    $select_surgical->execute();
    $surgical = $select_surgical->fetchAll();

	if($surgical[0]['COUNT(surgical_id)']==0)
	{
		$sql = "INSERT INTO surgical(surgical_name,description,status) VALUES (:surgical_name,:description,:status)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':surgical_name'=>$_POST['surgical_name'],':description'=>$_POST['description'],':status'=>$_POST['status']));
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
	$select_surgical=$pdo_conn->prepare("SELECT COUNT(surgical_id) FROM surgical WHERE surgical_name LIKE '".$_POST['surgical_name']."' AND surgical_id!='".$_POST['surgical_id']."'");
    $select_surgical->execute();
    $surgical = $select_surgical->fetchAll();

	if($surgical[0]['COUNT(surgical_id)']==0)
	{
		$pdo_statement=$pdo_conn->prepare("update surgical set surgical_name='".$_POST['surgical_name']."',description='".$_POST['description']."',status='".$_POST['status']."' where surgical_id=".$_POST['surgical_id']);
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
	$pdo_statement="DELETE FROM surgical where surgical_id=".$_POST['surgical_id'];
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}	
}

?>