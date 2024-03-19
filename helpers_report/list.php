<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	<h1>
		<div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Helpers Report</span></div>
	</h1>
</section>

<?php

$country_id =   $_SESSION['country_id'];
$state_id =   $_SESSION['state_id'];
$district_id =   $_SESSION['district_id'];
$city_id =   $_SESSION['city_id'];
$area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];
if ($user_type == '1') {
	$user_type_query = '';
	$country_query  =   '';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '2') {
	$user_type_query = '  and country_id="' . $country_id . '"';
	$country_query  =   '  and country_id="' . $country_id . '"';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '3') {
	$user_type_query = '  and country_id="' . $country_id . '"  and state_id="' . $state_id . '" ';
	$country_query  =   '  and country_id="' . $country_id . '"';
	$state_query    =   ' and country_id="' . $country_id . '"  and state_id="' . $state_id . '"';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '4') {
	$user_type_query = '  and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '"';
	$country_query  =   '  and country_id="' . $country_id . '"';
	$state_query    =   ' and country_id="' . $country_id . '"  and state_id="' . $state_id . '"';
	$district_query =   ' and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '"';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '5') {
	$user_type_query = '  and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '"';
	$country_query  =   '  and country_id="' . $country_id . '"';
	$state_query    =   ' and country_id="' . $country_id . '"  and state_id="' . $state_id . '"';
	$district_query =   ' and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '"';
	$city_query =   ' and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '"';
	$area_query =   '';
} else if ($user_type == '6') {
	$user_type_query = '  and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '" and area_id="' . $area_id . '"';
	$country_query  =   '  and country_id="' . $country_id . '"';
	$state_query    =   ' and country_id="' . $country_id . '"  and state_id="' . $state_id . '"';
	$district_query =   ' and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '"';
	$city_query =   ' and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '"';
	$area_query =   ' and country_id="' . $country_id . '" and state_id="' . $state_id . '" and district_id="' . $district_id . '" and city_id="' . $city_id . '" and area_id="' . $area_id . '"';
}

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
<!-- Main content -->
<section class="content">
	<form>
		<div class="box">
			<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-2">
							<h5 class="list-content">Country</h5>
							<select name="country_id" id="country_id" required class="form-control select2 item_name" onchange="get_state_list(country_id.value)">
								<option value="">Select Country</option>
								<?php
								$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1' $country_query");
								$prepare->execute();
								$country_list = $prepare->fetchall();
								foreach ($country_list as $value) { ?>
									<option value="<?php echo $value['country_id'] ?>"><?php echo $value['country_name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<h5 class="list-content">State</h5>
							<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district_list(country_id.value,state_id.value)">
								<option value="">Select State</option>
							</select>
						</div>
						<div class="col-md-2">
							<h5 class="list-content">District</h5>
							<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
								<option value="">Select District</option>
							</select>
						</div>
						<div class="col-md-2">
							<h5 class="list-content">City</h5>
							<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
								<option value="">Select City</option>
							</select>
						</div>
						<div class="col-md-2">
							<h5 class="list-content">Area</h5>
							<select name="area_id" id="area_id" required class="form-control select2 item_name">
								<option value="">Select Area</option>
							</select>
						</div>
						<div class="col-md-2">
							<h5 class="list-content">Help Type</h5>
							<select name="help_type" id="help_type" required class="form-control select2 item_name">
								<option value="">Select Help Type</option>
								<option value="Education">Education</option>
								<option value="Job">Job</option>
								<option value="Medical">Medical</option>
								<option value="Shelter">Shelter</option>
								<option value="Widow">Widow</option>
								<option value="Blood">Blood</option>
								<option value="Food">Food</option>
							</select>
						</div>
						<div class="col-md-2">
							<h5 class="list-content">Blood Group</h5>
							<select name="blood_id" id="blood_id" required class="form-control select2 item_name">
								<option value="">Select Blood Group</option>
								<?php
								$blood_group = $pdo_conn->prepare("SELECT blood_id,blood_group_name FROM blood_group WHERE status='1' ");
								$blood_group->execute();
								$blood_group_list = $blood_group->fetchall();
								foreach($blood_group_list as $value) { ?>
								<option value="<?php echo $value['blood_id'] ?>"><?php echo $value['blood_group_name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="go-btn ">
						<a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value,help_type.value,blood_id.value)" class="hvr-sweep-to-top">GO</a>
					</div>
				</div>
			</div>
			<table border="0" cellspacing="0" width="90%">
				<tr>
					<td width="10%" align="center">
						<a onclick="javascript:helpers_report_overall_print(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value,help_type.value,blood_id.value)" style="float:right"><img align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
					</td>
				</tr>
			</table>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive" id="areawise_count_list">
				</div>
			</div>
	</form>
</section>
</div>
<script type="text/javascript">
	function get_state_list(country_id) {
		var state_query = '<?php echo $state_query; ?>';
		format = $("form").serialize() + "&action=state_list" + "&state_query=" + state_query;
		jQuery.ajax({
			type: "POST",
			url: "inc/commonfunction.php",
			data: format,
			success: function(msg) {
				$("#state_id").html(msg);
			}
		});
	}

	function get_district_list(country_id, state_id) {
		var district_query = '<?php echo $district_query; ?>';
		format = $("form").serialize() + "&action=district_list" + "&district_query=" + district_query;
		jQuery.ajax({
			type: "POST",
			url: "inc/commonfunction.php",
			data: format,
			success: function(msg) {
				$("#district_id").html(msg);
			}
		});
	}

	function get_city_list(country_id, state_id, district_id) {
		var city_query = '<?php echo $city_query; ?>';
		format = $("form").serialize() + "&action=city_list" + "&city_query=" + city_query;
		jQuery.ajax({
			type: "POST",
			url: "inc/commonfunction.php",
			data: format,
			success: function(msg) {
				$("#city_id").html(msg);
			}
		});
	}

	function get_area_list(country_id, state_id, district_id, city_id) {
		var area_query = '<?php echo $area_query; ?>';
		format = $("form").serialize() + "&action=area_list" + "&area_query=" + area_query;
		jQuery.ajax({
			type: "POST",
			url: "inc/commonfunction.php",
			data: format,
			success: function(msg) {
				$("#area_id").html(msg);
			}
		});
	}

	function get_filter_list(country_id, state_id, district_id, city_id, area_id, help_type, blood_id) {
	    var user_type_query='<?php echo $user_type_query; ?>';
		jQuery.ajax({
			type: "POST",
			url: "helpers_report/helpers_report_list.php",
			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id + "&help_type=" + help_type+"&blood_id="+blood_id+"&user_type_query="+user_type_query,
			success: function(msg) {
				$("#areawise_count_list").html(msg);
			}
		});
	}
	$(document).ready(function(){
	    get_filter_list('', '', '', '', '', '', '');
	});

	function helpers_report_view(helpers_details_id) {
		jQuery.ajax({
			type: "POST",
			url: "helpers_report/helpers_report_view.php?",
			data: "helpers_details_id=" + helpers_details_id,
			success: function(msg) {
				window.open('helpers_report/helpers_report_view.php?helpers_details_id=' + helpers_details_id, 'onmouseover', 'height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');
			}
		});
	}

	function food_needed_delete(food_needed_id) {
		if (confirm("Are you sure?")) {
			// your deletion code
			//alert(food_needed_id);
			jQuery.ajax({
				type: "POST",
				url: "food_needed_report/delete.php?",
				data: "food_needed_id=" + food_needed_id,
				success: function(msg) {
					alert(msg);
					window.location.href = 'index.php?file=food_needed_report/list';
				}
			});

		}
		return false;
	}

	function helpers_report_overall_print(country_id, state_id, district_id, city_id, area_id, help_type, blood_id) {
		var dash_country_id = '<?php echo $dash_country_id; ?>';
		var dash_state_id = '<?php echo $dash_state_id; ?>';
		var dash_district_id = '<?php echo $dash_district_id; ?>';
		var dash_city_id = '<?php echo $dash_city_id; ?>';
		var dash_area_id = '<?php echo $dash_area_id; ?>';
		var user_type_query = '<?php echo $user_type_query; ?>';
        window.open('helpers_report/helpers_report_overall_print.php?country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + "&help_type=" + help_type +"&blood_id="+blood_id+ "&dash_country_id=" + dash_country_id + "&dash_state_id=" + dash_state_id + "&dash_district_id=" + dash_district_id + "&dash_city_id=" + dash_city_id + "&dash_area_id=" + dash_area_id+"&user_type_query="+user_type_query, 'onmouseover', 'height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');
		/*jQuery.ajax({
			type: "POST",
			url: "helpers_report/helpers_report_overall_print.php",
			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id + "&help_type=" + help_type +"&blood_id="+blood_id+ "&dash_country_id=" + dash_country_id + "&dash_state_id=" + dash_state_id + "&dash_district_id=" + dash_district_id + "&dash_city_id=" + dash_city_id + "&dash_area_id=" + dash_area_id,
			success: function(msg) {
				//alert(msg);
				window.open('helpers_report/helpers_report_overall_print.php?country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + "&help_type=" + help_type + "&dash_country_id=" + dash_country_id + "&dash_state_id=" + dash_state_id + "&dash_district_id=" + dash_district_id + "&dash_city_id=" + dash_city_id + "&dash_area_id=" + dash_area_id, 'onmouseover', 'height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');
			}
		});*/

	}
</script>