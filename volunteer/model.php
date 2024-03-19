<?php

require_once('../inc/dbConnect.php');

if($_POST['action']=="Update_status")
{
    $active_status=$_POST['active_status'];
    $active_status1=json_decode($_POST['active_status1'],true);
    
    $pdo_statement = $pdo_conn->prepare("update usercreation set active_status='".$active_status."' where user_id in (".implode(',',$active_status1).")");
	$result = $pdo_statement->execute();
	echo $msg = "Successfully Updated";
} ?>