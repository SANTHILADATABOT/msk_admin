<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_disease=$pdo_conn->prepare("SELECT * FROM disease WHERE disease_name LIKE '".$_POST['disease_name']."'  and delete_status='0'");
    $select_disease->execute();
    $disease = $select_disease->fetchAll();
	if(count($disease)==0)
	{
		$sql = "INSERT INTO disease (disease_name,description) VALUES (:disease_name,:description)";
		$pdo_diseasement = $pdo_conn->prepare($sql);
			
		$result = $pdo_diseasement->execute(array(':disease_name'=>$_POST['disease_name'],':description'=>$_POST['description']));
	}
	else
	{
		echo "Already Exit";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
	//else { print_r($pdo_diseasement->errorinfo()); }
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_disease=$pdo_conn->prepare("SELECT * FROM disease WHERE disease_name LIKE '".$_POST['disease_name']."'   and delete_status='0'");
    $select_disease->execute();
    $disease = $select_disease->fetchAll();
	if(count($disease)==0)
	{
	   $pdo_diseasement=$pdo_conn->prepare("update disease set disease_name='".$_POST['disease_name']."',description='".$_POST['description']."' where disease_id=".$_POST['disease_id']);
	   $result = $pdo_diseasement->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_diseasement->errorinfo()); }
	
} 

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{ 
	$pdo_diseasement="UPDATE   disease set delete_status='1' where disease_id='".$_POST['disease_id']."' ";
	$disease_exec=$pdo_conn->prepare($pdo_diseasement);
	$disease_exec->execute();
 
	 }

?> 