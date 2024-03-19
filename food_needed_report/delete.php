<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("DELETE FROM food_needed WHERE food_needed_id='".$_POST['food_needed_id']."' ");
$survey->execute();

echo "Delete Successfully";
?>
