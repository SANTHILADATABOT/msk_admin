<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");



$survey = $pdo_conn->prepare("DELETE FROM matrimonial_information WHERE matrimonial_id='".$_POST['matrimonial_id']."' ");
$survey->execute();

echo "Delete Successfully";
?>
