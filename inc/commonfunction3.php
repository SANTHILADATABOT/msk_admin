<?php

// customer data
function customer_data($condition='',$fields='*')
{
  global $pdo_conn;

	$has_deleted = '1';

	$sql = "SELECT ".$fields." FROM customer_creation WHERE delete_status!=".$has_deleted;
	
	if (!empty($condition)) {
		$sql .= " AND ".$condition;
	}
	
	$prepared = $pdo_conn->prepare($sql);
	$executed = $prepared->execute();
	$customer_data = $prepared->fetchAll(PDO::FETCH_ASSOC);
	return $customer_data;
}


function traymaster_data($condition='',$fields='*')
{
	global $pdo_conn;
		
	$has_deleted = '1';

	$sql = "SELECT ".$fields." FROM traymaster WHERE delete_status!=".$has_deleted;
	
	if (!empty($condition)) {
		$sql .= " AND ".$condition;
	}

	$prepared = $pdo_conn->prepare($sql);
	$executed = $prepared->execute();
	$traymaster_data = $prepared->fetchAll(PDO::FETCH_ASSOC);
	return $traymaster_data;
}



function trayin_data($trayin_id='')
{
	global $pdo_conn;
	$has_deleted = '1';
	$sql = "SELECT * FROM trayin WHERE delete_status!=".$has_deleted;
	if (!empty($trayin_id)) {

		$sql .= " AND trayin_id='".$trayin_id."'";
	}

	$prepared = $pdo_conn->prepare($sql);
	$executed = $prepared->execute();
	$trayin_data = $prepared->fetchAll(PDO::FETCH_ASSOC);
	return $trayin_data;
}

?>