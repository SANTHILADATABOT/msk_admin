<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{
	$select_userroll1=$pdo_conn->prepare("SELECT userroll_id FROM userroll WHERE roll_name like 'admin' and active_status ='1'");
    $select_userroll1->execute();
    $userroll1 = $select_userroll1->fetch();
	$admin = $userroll1['userroll_id'];
	$select_usercreation=$pdo_conn->prepare("SELECT COUNT(user_id) FROM usercreation WHERE   username='".$_POST['username']."' and password='".$_POST['password']."' ");
    $select_usercreation->execute();
    $usercreation = $select_usercreation->fetchAll();

	if($usercreation[0]['COUNT(user_id)']==0)
	{
		$sql = "INSERT INTO usercreation 
		(username,password,email,user_type,active_status) VALUES (:username,:password,:email,:user_type,:active_status)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':username'=>$_POST['username'],':password'=>$_POST['password'],':email'=>$_POST['email'],':user_type'=>$_POST['user_type'],':active_status'=>$_POST['active_status']));
	}
	else
	{
		echo "error";
	}
	if (!empty($result) ){
	  echo $msg = "Successfully Created";
	}
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_usercreation=$pdo_conn->prepare("SELECT COUNT(user_id) FROM usercreation WHERE username LIKE '".$_POST['username']."' AND password LIKE '".$_POST['password']."' AND email LIKE '".$_POST['email']."' AND user_type LIKE '".$_POST['user_type']."' AND user_id!='".$_POST['user_id']."'");
    $select_usercreation->execute();
    $usercreation = $select_usercreation->fetchAll();
	if($usercreation[0]['COUNT(user_id)']==0)
	{
		$pdo_statement=$pdo_conn->prepare("update usercreation set username='".$_POST['username']."',password='".$_POST['password']."',email='".$_POST['email']."',user_type='".$_POST['user_type']."',active_status='".$_POST['active_status']."' where user_id=".$_POST['user_id']);
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
	$pdo_statement="DELETE FROM usercreation where user_id=".$_POST['user_id'];
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}
}

/************************************* State ********************************************/

?>