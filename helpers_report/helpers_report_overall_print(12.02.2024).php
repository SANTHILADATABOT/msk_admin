<style type="text/css">
	.style1 {
		font-weight: normal;
		font-family: calibri;
		font-size: 14px;
	}
	.style2 {
		font-weight: normal;
		font-family: calibri;
		font-size: 16px;
	}
	.style3 {
		font-weight: bold;
		text-align: right;
		font-family: calibri;
		font-size: 12px;
	}
	.style4 {
		font-weight: bold;
		font-family: calibri;
		font-size: 16px;
	}
	.style5 {
		font-family: calibri;
		font-weight: bold;
		font-size: 18px;
	}
	.style6 {
		font-family: calibri;
		font-weight: bold;
		font-size: 16px;
	}
	.style10 {
		border-top: solid 1px;
		border-top-color: #BFBFBF;
	}
	.bottom {
		border-bottom: solid 1px;
		border-bottom-color: #BFBFBF;
	}
	.right {
		border-right: solid 1px;
		border-bottom-color: #BFBFBF;
	}
</style>
<?php
error_reporting(0);
session_start();
include("../inc/commonfunction.php");

$cur_date = date('Y-m-d');

$user_country_id =   $_SESSION['country_id'];
$user_state_id =   $_SESSION['state_id'];
$user_district_id =   $_SESSION['district_id'];
$user_city_id =   $_SESSION['city_id'];
$user_area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];


if ($user_type == '1') {
	$user_type_query = '';
} else if ($user_type == '2') {
	$user_type_query = '  and country_id="' . $user_country_id . '"';
} else if ($user_type == '3') {
	$user_type_query = '  and country_id="' . $user_country_id . '"  and state_id="' . $user_state_id . '" ';
} else if ($user_type == '4') {
	$user_type_query = '  and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '"';
} else if ($user_type == '5') {
	$user_type_query = '  and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '"';
} else if ($user_type == '6') {
	$user_type_query = '  and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '" and area_id="' . $user_area_id . '"';
}

$country_id = $_REQUEST['country_id'];
$area_id = $_REQUEST['area_id'];
$city_id = $_REQUEST['city_id'];
$state_id = $_REQUEST['state_id'];
$district_id = $_REQUEST['district_id'];
$help_type = $_REQUEST['help_type'];
$blood_id = $_REQUEST['blood_id'];
$query = '';
if ($country_id != '') {
	$query .= '   and country_id="' . $country_id . '"';
}
if ($state_id != '') {
	$query .= '   and state_id="' . $state_id . '"';
}
if ($district_id != '') {
	$query .= '   and district_id="' . $district_id . '"';
}
if ($city_id != '') {
	$query .= '   and city_id="' . $city_id . '"';
}
if ($area_id != '') {
	$query .= '   and area_id="' . $area_id . '"';
}
if ($help_type != '') {
	$query .= '   and help_type="' . $help_type . '"';
}
if ($blood_id != '') {
	$query .= '   and blood_id="' . $blood_id . '"';
}
//echo "<br>query-->".$query;

$dash_country_id =   $_GET['dash_country_id'];
$dash_state_id =   $_GET['dash_state_id'];
$dash_district_id =   $_GET['dash_district_id'];
$dash_city_id =   $_GET['dash_city_id'];
$dash_area_id =   $_GET['dash_area_id'];
$dash_query = '';
if ($dash_country_id != '') {
	$dash_query .= '   and country_id="' . $dash_country_id . '"';
}
if ($dash_state_id != '') {
	$dash_query .= '   and state_id="' . $dash_state_id . '"';
}
if ($dash_district_id != '') {
	$dash_query .= '   and district_id="' . $dash_district_id . '"';
}
if ($dash_city_id != '') {
	$dash_query .= '   and city_id="' . $dash_city_id . '"';
}
if ($dash_area_id != '') {
	$dash_query .= '   and area_id="' . $dash_area_id . '"';
}
?>
<?php
$survey = $pdo_conn->prepare("SELECT * FROM helpers_details WHERE helpers_details_id!='' $query ORDER BY helpers_details_id ASC");
$survey->execute();
$survey_list = $survey->fetchall();
?>
<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td height="37" align="center" class="style5">Helpers Report</td>
		</tr>
	</table>
	<br>
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
			<td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mobile No</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Country Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;State Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;District Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;City Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Area Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Help Type</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Blood Group</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Remarks</strong></td>
		</tr>
		<tr>
			<td height="0" colspan="11" align="center" class="style10 style3 right"></td>
		</tr>
		<?php foreach ($survey_list as $value) { ?>
			<tr>
				<td align="center" height="25" class="style2 right"><?php echo $roll_id; ?></td>
				<td class="style2 right"><?php echo $value['helper_name'];	?> </td>
				<td class="style2 right"><?php echo $value['mobile_no'];	?> </td>
				<td align="center" class="style2 right"><?php echo get_country_name($value['country_id']);	?> </td>
				<td align="center" class="style2 right"><?php echo get_state_name($value['state_id']); ?></td>
				<td align="center" class="style2 right"><?php echo get_district_name($value['district_id']); ?></td>
				<td align="center" class="style2 right"><?php echo get_city_name($value['city_id']); ?></td>
				<td align="center" class="style2 right"><?php echo get_area_name($value['area_id']) ?></td>
				<td align="center" class="style2 right"><?php echo $value['help_type']; ?></td>
				<td align="center" class="style2 right"><?php echo get_blood_group($value['blood_id']) ?></td>
				<td align="center" class="style2 right"><?php echo $value['remarks']; ?></td>
			</tr>
		<?php $roll_id += 1;
		}
		?>
		<tr><td colspan="11" align="right" class="style10 style1">Printed Date :<?php echo $curdate = date('d-m-Y'); ?></td></tr>
	</table>
</div>