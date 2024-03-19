<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
//echo "SELECT * FROM medical_help WHERE delete_status!='1' $query ORDER BY medical_help_id DESC";



$survey = $pdo_conn->prepare("DELETE FROM medical_help WHERE medical_help_id  = '$_POST[medical_help_id]' ");
$survey->execute();

echo "Delete Successfully";
?>
