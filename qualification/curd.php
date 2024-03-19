<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/
//print_r($_POST);
if($_POST['action']=="Add")
{ 
    
    $select_qualification=$pdo_conn->prepare("SELECT * FROM qualification WHERE qualification_name LIKE '".$_POST['qualification_name']."'  and delete_status='0'");
    $select_qualification->execute();
    $qualification = $select_qualification->fetchAll();
	if(count($qualification)==0)
	{
		$sql = "INSERT INTO qualification (qualification_name,description) VALUES (:qualification_name,:description)";
		$pdo_qualificationment = $pdo_conn->prepare($sql);
			
		$result = $pdo_qualificationment->execute(array(':qualification_name'=>$_POST['qualification_name'],':description'=>$_POST['description']));
	}
	else
	{
		echo "Already Exit";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
	//else { print_r($pdo_qualificationment->errorinfo()); }
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_qualification=$pdo_conn->prepare("SELECT * FROM qualification WHERE qualification_name LIKE '".$_POST['qualification_name']."'   and delete_status='0' and qualification_id != '".$_POST['qualification_id']."'");
    $select_qualification->execute();
    $qualification = $select_qualification->fetchAll();
	if(count($qualification)==0)
	{
	   $pdo_qualificationment=$pdo_conn->prepare("update qualification set qualification_name='".$_POST['qualification_name']."',description='".$_POST['description']."' where qualification_id=".$_POST['qualification_id']);
	   $result = $pdo_qualificationment->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_qualificationment->errorinfo()); }
	
} 

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{ 
	$pdo_qualificationment="UPDATE   qualification set delete_status='1' where qualification_id='".$_POST['qualification_id']."' ";
	$qualification_exec=$pdo_conn->prepare($pdo_qualificationment);
	$qualification_exec->execute();
 
	 }

?> 