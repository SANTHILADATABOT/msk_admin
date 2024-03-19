<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{ 
	$err=''; $result='';
	
	$sql ="SELECT COUNT(accountyear_id) FROM accountyear WHERE from_account_year = '".$_POST['from_account_year']."' AND to_account_year = '".$_POST['to_account_year']."' AND delete_status !=1 ";
    $select_accountyear=$pdo_conn->prepare($sql);
    $select_accountyear->execute();
    $accountyear = $select_accountyear->fetchAll();
	if($accountyear[0]['COUNT(accountyear_id)']==0 and ($_POST['from_account_year'] < $_POST['to_account_year']))
	{
		$sql ="SELECT COUNT(active_status) as status FROM accountyear WHERE active_status = 'active' AND delete_status !='1' ";
		$status_accountyear=$pdo_conn->prepare($sql);
		$status_accountyear->execute();
		$statusaccountyear = $status_accountyear->fetchAll();
		if($statusaccountyear[0]['status'] == 0 || ($statusaccountyear[0]['status'] > 0 && $_POST['active_status'] == 'inactive')){
			$sql = "INSERT INTO accountyear (from_account_year,to_account_year,active_status) VALUES (:from_account_year,:to_account_year,:active_status)";
			$pdo_active_statusment = $pdo_conn->prepare($sql);
				
			$result = $pdo_active_statusment->execute(array(':from_account_year'=>$_POST['from_account_year'],':to_account_year'=>$_POST['to_account_year'],':active_status'=>$_POST['active_status']));
			 
			if ($result == TRUE){
				$err = "0";
			}else{ 
				$err = $pdo_active_statusment->errorinfo();
			}	
		}else{
			$err = "Active accounting year already exists..!";
		}
	}
	else
	{
		$err = "To Account Year is must greater than From Account Year";
	}
	
	echo $err;
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_accountyear=$pdo_conn->prepare("SELECT COUNT(accountyear_id) FROM accountyear WHERE from_account_year LIKE '".$_POST['from_account_year']."' AND to_account_year LIKE '".$_POST['to_account_year']."' AND accountyear_id!='".$_POST['accountyear_id']."' AND delete_status !=1");
    $select_accountyear->execute();
    $accountyear = $select_accountyear->fetchAll();
	if($accountyear[0]['COUNT(accountyear_id)']==0 and ($_POST['from_account_year'] < $_POST['to_account_year']))
	{
		$sql ="SELECT COUNT(active_status) as status FROM accountyear WHERE active_status = 'active' AND delete_status !='1' ";
		$status_accountyear=$pdo_conn->prepare($sql);
		$status_accountyear->execute();
		$statusaccountyear = $status_accountyear->fetchAll();
		if($statusaccountyear[0]['status'] == 0 || ($statusaccountyear[0]['status'] > 0 && $_POST['active_status'] == 'inactive')){
			
			$pdo_active_statusment=$pdo_conn->prepare("update accountyear set from_account_year='".$_POST['from_account_year']."',to_account_year='".$_POST['to_account_year']."',active_status='".$_POST['active_status']."' where accountyear_id=".$_POST['accountyear_id']);
			$result = $pdo_active_statusment->execute();
			
			if ($result == TRUE){
				$err = "1";
			}else{ 
				$err = $pdo_active_statusment->errorinfo();
			}
		
		}else{
			$err = "Active accounting year already exists..!";
		}
	}else{
		$err = "To Account Year is must greater than From Account Year";
	}
	
	echo $err;
	
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{
	
	$pdo_active_statusment="UPDATE accountyear SET delete_status='1' where accountyear_id=".$_POST['accountyear_id'];
	$result=$pdo_conn->exec($pdo_active_statusment);
	if(!empty($result)) {
		echo $msg = "Successfully Deleted";
	}
	//else { print_r($pdo_active_statusment->errorinfo()); }
	
}

?>