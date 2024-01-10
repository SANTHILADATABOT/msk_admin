<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_relationship=$pdo_conn->prepare("SELECT * FROM relationship WHERE relationship_name LIKE '".$_POST['relationship_name']."'  and delete_status='0'");
    $select_relationship->execute();
    $relationship = $select_relationship->fetchAll();
	if(count($relationship)==0)
	{
		$sql = "INSERT INTO relationship (relationship_name,description) VALUES (:relationship_name,:description)";
		$pdo_relationshipment = $pdo_conn->prepare($sql);
			
		$result = $pdo_relationshipment->execute(array(':relationship_name'=>$_POST['relationship_name'],':description'=>$_POST['description']));
	}
	else
	{
		echo "Already Exit";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
	//else { print_r($pdo_relationshipment->errorinfo()); }
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_relationship=$pdo_conn->prepare("SELECT * FROM relationship WHERE relationship_name LIKE '".$_POST['relationship_name']."'   and delete_status='0'");
    $select_relationship->execute();
    $relationship = $select_relationship->fetchAll();
	if(count($relationship)==0)
	{
	   $pdo_relationshipment=$pdo_conn->prepare("update relationship set relationship_name='".$_POST['relationship_name']."',description='".$_POST['description']."' where relationship_id=".$_POST['relationship_id']);
	   $result = $pdo_relationshipment->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_relationshipment->errorinfo()); }
	
} 

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{ 
	$pdo_relationshipment="UPDATE   relationship set delete_status='1' where relationship_id='".$_POST['relationship_id']."' ";
	$relationship_exec=$pdo_conn->prepare($pdo_relationshipment);
	$relationship_exec->execute();
 
	 }

?> 