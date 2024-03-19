<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");


$survey = $pdo_conn->prepare("DELETE FROM job_application WHERE job_id='".$_POST['job_id']."' ");
$survey->execute();

echo "Delete Successfully";
?>
