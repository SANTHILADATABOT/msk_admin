<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
//echo "SELECT * FROM join_masjith WHERE join_id='".$_POST['join_id']."'";


$survey = $pdo_conn->prepare("DELETE FROM join_masjith WHERE join_id='".$_POST['join_id']."' ");
$survey->execute();

echo "Delete Successfully";
?>
