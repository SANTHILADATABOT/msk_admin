<?php
error_reporting(0);

include("../inc/commonfunction.php");

$country_id = $_POST['country_id'];
$area_id = $_POST['area_id'];
$city_id = $_POST['city_id'];
$state_id = $_POST['state_id'];
$district_id = $_POST['district_id'];
$help_type = $_POST['help_type'];
$blood_id = $_POST['blood_id'];

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
?>
<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100 boreder">
	<thead>
		<tr>
			<th>#</th>
			<th>Helper Name</th>
			<th>Mobile Number</th>
			<th>Country Name</th>
			<th>State Name</th>
			<th>District Name</th>
			<th>City Name</th>
			<th>Area Name</th>
			<th>Help Type</th>
			<th>Blood Group</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
	    $survey = $pdo_conn->prepare("SELECT * FROM helpers_details WHERE helpers_details_id!='' $query ORDER BY helpers_details_id ASC");
		$survey->execute();
		$survey_list = $survey->fetchall();
		foreach ($survey_list as $value) { ?>
			<tr>
				<td><?php echo $roll_id; ?></td>
				<td><?php echo $value['helper_name'];	?> </td>
				<td><?php echo $value['mobile_no'];	?> </td>
				<td align="center"><?php echo get_country_name($value['country_id']);	?> </td>
				<td align="center"><?php echo get_state_name($value['state_id']); ?></td>
				<td align="center"><?php echo get_district_name($value['district_id']); ?></td>
				<td align="center"><?php echo get_city_name($value['city_id']); ?></td>
				<td align="center"><?php echo get_area_name($value['area_id']) ?></td>
				<td align="center"><?php echo $value['help_type']; ?></td>
         		<td align="center"><?php echo get_blood_group($value['blood_id']); ?></td>
         		<td align="center"><?php echo $value['remarks']; ?></td>
				<td>
					<a href="#" title="View" id="quotation_view_modal" onclick="helpers_report_view('<?php echo $value['helpers_details_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>
				</td>
			</tr>

		<?php $roll_id += 1;
		} ?>
	</tbody>
</table>
 <script>
 	$(document).ready(function() {
 		$('#example').DataTable();
 	});
 </script>