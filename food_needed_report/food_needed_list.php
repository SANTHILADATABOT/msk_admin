 <?php
error_reporting(0);

include("../inc/commonfunction.php");

$country_id = $_POST['country_id'];
$area_id = $_POST['area_id'];
$city_id = $_POST['city_id'];
$state_id = $_POST['state_id'];
$district_id = $_POST['district_id'];
$user_type_query=$_POST['user_type_query'];

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
?>
<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100 boreder">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>Address</th>
			<th>Profession</th>
			<th>Reason For Choosing Food</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$survey = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' $user_type_query $query ORDER BY food_needed_id DESC");
		$survey->execute();
		$survey_list = $survey->fetchall();
		foreach ($survey_list as $value) { ?>
			<tr>
				<td><?php echo $roll_id; ?></td>
				<td><?php echo $value['name'];	?> </td>
				<td><?php echo $value['mobile_no'];	?> </td>
				<td><?php echo $value['address'];	?> </td>
				<td><?php echo $value['profession'];	?> </td>
				<td><?php echo $value['reason_for_choosing_food'];	?> </td>
				<td>
					<!--<a href="#" title="View" id="quotation_view_modal" onclick="food_needed_view('<?php echo $value['food_needed_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
					<a href="#" title="View" id="quotation_view_modal" onclick="food_needed_view('<?php echo $value['food_needed_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a href="#" title="Delete" id="quotation_view_modal" onclick="food_needed_delete('<?php echo $value['food_needed_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<?php
	// / echo "SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC";
	/*$survey = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' $query ORDER BY food_needed_id DESC");
	$survey->execute();
	$survey_list = $survey->fetchall();

	foreach ($survey_list as $value) { ?>

 	<tr>
 		<td><?php echo $roll_id; ?></td>
 		<td><?php echo $value['name'];	?> </td>
 		<td><?php echo $value['mobile_no'];	?> </td>
 		<td><?php echo $value['address'];	?> </td>
 		<td><?php echo $value['profession'];	?> </td>
 		<td><?php echo $value['reason_for_choosing_food'];	?> </td>

 		<td>
 			<!-- 	 <a href="#" title="View" id="quotation_view_modal" onclick="area_survey_view('<?php echo $value['survey_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
 		</td>
 	</tr>

<?php $roll_id += 1;
}*/ ?>