<?php 
error_reporting(0); 

include ("../inc/commonfunction.php");

$survey_id=$_POST['survey_id'];

$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE survey_id='".$survey_id."' ");
$survey->execute();
$record = $survey->fetch();

$unique_no=$record['unique_no'];

$survey2_sub_det=$pdo_conn->prepare("DELETE From fact_finding_subform  where random_no='".$unique_no."'  ");
$survey2_sub_det->execute();

$togg_survey_sub_disease=$pdo_conn->prepare("DELETE From fact_family_disease  where unique_no='".$unique_no."'  ");
$togg_survey_sub_disease->execute();

$survey = $pdo_conn->prepare("DELETE FROM fact_finding_form WHERE survey_id='".$survey_id."' ");
$survey->execute();

echo "Delete Successfully";
?>