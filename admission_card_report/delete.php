<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");



$survey = $pdo_conn->prepare("DELETE FROM admission_card WHERE admission_card_id='".$_POST['admission_card_id']."' ");
$survey->execute();

echo "Delete Successfully";

?>
