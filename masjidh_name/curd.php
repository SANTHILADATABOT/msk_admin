<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{
	$select_masjidh=$pdo_conn->prepare("SELECT COUNT(masjidh_id) FROM masjidh_name WHERE masjidh_name LIKE '".$_POST['masjidh_name']."' ");
    $select_masjidh->execute();
    $masjidh = $select_masjidh->fetchAll();
    //echo "asfsdf";
	if($masjidh[0]['COUNT(masjidh_id)']==0)
	{
		$sql = "INSERT INTO masjidh_name(masjidh_name,description,status) VALUES (:masjidh_name,:description,:status)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':masjidh_name'=>$_POST['masjidh_name'],':description'=>$_POST['description'],':status'=>$_POST['status']));
		 //echo $result;
	}
	else
	{
		echo "Already Exit";
	}
	//echo $result;
	if (!empty($result) )
	{
	  echo $msg = "Successfully Created";
	}	
}

/************************************* UPDATE ********************************************/
if($_POST['action']=="Update")
{
	$select_masjidh=$pdo_conn->prepare("SELECT COUNT(masjidh_id) FROM masjidh_name WHERE masjidh_name LIKE '".$_POST['masjidh_name']."' AND masjidh_id!='".$_POST['masjidh_id']."'");
    $select_masjidh->execute();
    $masjidh = $select_masjidh->fetchAll();

	if($masjidh[0]['COUNT(masjidh_id)']==0)
	{
		$pdo_statement=$pdo_conn->prepare("update masjidh_name set masjidh_name='".$_POST['masjidh_name']."',description='".$_POST['description']."',status='".$_POST['status']."' where masjidh_id=".$_POST['masjidh_id']);
		$result = $pdo_statement->execute();
	}
	else
	{
		echo "Already Exit";
	}
	if(!empty($result)) {
		echo $msg = "Successfully Updated";
	}
}

/************************************* DELETE ********************************************/

if($_POST['action']=="Delete")
{	
	$pdo_statement="DELETE FROM masjidh_name where masjidh_id=".$_POST['masjidh_id'];
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}	
}

?>