<?php
error_reporting(0);
ob_start();
session_start();

include("dbConnect.php");

$usercreationid = $_SESSION['usercreation_id'];
$fullname = $_SESSION['full_name'];
$userroll = $_SESSION['user_roll'];
//$current_acc_year =  $_SESSION['account_year'];

include("commonfunction.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>MASJITH</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<!-- Bootstrap-extend -->
	<link rel="stylesheet" href="assets/css/bootstrap-extend.css">
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="assets/vendor_components/morris.js/morris.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    	
	<!-- weather weather -->
	<link rel="stylesheet" href="assets/vendor_components/weather-icons/weather-icons.css">
	
	<!-- date picker -->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
	
	<!-- daterange picker -->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <!-- Select2 -->
	<link rel="stylesheet" href="assets/vendor_components/select2/dist/css/select2.min.css">
    
    <!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="assets/vendor_plugins/iCheck/all.css">
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="assets/css/master_style.css">
	
	<!-- Lion_admin skins -->
	<link rel="stylesheet" href="assets/css/skins/_all-skins.css">
	
	<!-- common style -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	<!-- xeditable css -->
    <link href="assets/vendor_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
	
	<!--<link href="//code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet"/> -->
	<link href="assets/css/ionic.css" rel="stylesheet"/>
	
	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.js"></script>
	<script src="assets/js/bootstrap-validate.js"></script>
	<script src="../js/chosen.jquery.js"></script>
	<script src="../js/chosen.jquery.min.js"></script>
	<script src="../js/canvasjs.min.js"></script>
	<script src="../js/loader.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
  </head>
  
  <body class="hold-transition skin-blue-light sidebar-mini">
<?php /*?>  <?php echo $current_acc_year ?><?php */ ?>