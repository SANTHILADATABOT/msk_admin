<?php

require_once('../inc/dbConnect.php');

/************************************* INSERT ********************************************/

if($_POST['action']=="Add")
{
	$select_house=$pdo_conn->prepare("SELECT COUNT(house_id) FROM house WHERE house_name LIKE '".$_POST['house_name']."' ");
    $select_house->execute();
    $house = $select_house->fetchAll();

	if($house[0]['COUNT(house_id)']==0)
	{
		$sql = "INSERT INTO house(house_name,description,status) VALUES (:house_name,:description,:status)";
		$pdo_statement = $pdo_conn->prepare($sql);
			
		$result = $pdo_statement->execute(array(':house_name'=>$_POST['house_name'],':description'=>$_POST['description'],':status'=>$_POST['status']));
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
	$select_house=$pdo_conn->prepare("SELECT COUNT(house_id) FROM house WHERE house_name LIKE '".$_POST['house_name']."' AND house_id!='".$_POST['house_id']."'");
    $select_house->execute();
    $house = $select_house->fetchAll();

	if($house[0]['COUNT(house_id)']==0)
	{
		$pdo_statement=$pdo_conn->prepare("update house set house_name='".$_POST['house_name']."',description='".$_POST['description']."',status='".$_POST['status']."' where house_id=".$_POST['house_id']);
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
	$pdo_statement="DELETE FROM house where house_id=".$_POST['house_id'];
	$result=$pdo_conn->exec($pdo_statement);
	if(!empty($result)) 
	{
		echo $msg = "Successfully Deleted";
	}	
}

?>