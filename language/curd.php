<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
    $select_language=$pdo_conn->prepare("SELECT * FROM language WHERE language_name LIKE '".$_POST['language_name']."'  and delete_status='0'");
    $select_language->execute();
    $language = $select_language->fetchAll();
	if(count($language)==0)
	{
		$sql = "INSERT INTO language (language_name,description) VALUES (:language_name,:description)";
		$pdo_languagement = $pdo_conn->prepare($sql);
			
		$result = $pdo_languagement->execute(array(':language_name'=>$_POST['language_name'],':description'=>$_POST['description']));
	}
	else
	{
		echo "Already Exit";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
	//else { print_r($pdo_languagement->errorinfo()); }
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_language=$pdo_conn->prepare("SELECT * FROM language WHERE language_name LIKE '".$_POST['language_name']."'   and delete_status='0'");
    $select_language->execute();
    $language = $select_language->fetchAll();
	if(count($language)==0)
	{
	   $pdo_languagement=$pdo_conn->prepare("update language set language_name='".$_POST['language_name']."',description='".$_POST['description']."' where language_id=".$_POST['language_id']);
	   $result = $pdo_languagement->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
	//else { print_r($pdo_languagement->errorinfo()); }
	
} 

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{ 
	$pdo_languagement="UPDATE   language set delete_status='1' where language_id='".$_POST['language_id']."' ";
	$language_exec=$pdo_conn->prepare($pdo_languagement);
	$language_exec->execute();
 
	 }

?> 