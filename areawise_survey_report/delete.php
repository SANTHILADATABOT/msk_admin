<?php 
error_reporting(0); 

include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE survey_id='".$_POST['survey_id']."' ");
$survey->execute();
$record = $survey->fetch();

$survey = $pdo_conn->prepare("DELETE FROM fact_finding_form WHERE survey_id='".$_POST['survey_id']."' ");
$survey->execute();

$survey2_sub_det=$pdo_conn->prepare("DELETE From fact_finding_subform  where random_no='".$record['unique_no']."'  ");
$survey2_sub_det->execute();
$togg_survey_sub_disease=$pdo_conn->prepare("DELETE From fact_family_disease  where unique_no='".$record['unique_no']."'  ");
$togg_survey_sub_disease->execute();

echo "Delete Successfully";
?>