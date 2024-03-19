<?php
$user_country_id =   $_SESSION['country_id'];
$user_state_id =   $_SESSION['state_id'];
$user_district_id =   $_SESSION['district_id'];
$user_city_id =   $_SESSION['city_id'];
$user_area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];

if ($user_type == '1') {
	$user_type_query = '';
	$country_query  =   '';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '2') {
	$user_type_query = '  and country_id="' . $user_country_id . '"';
	$country_query  =   '  and country_id="' . $user_country_id . '"';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '3') {
	$user_type_query = '  and country_id="' . $user_country_id . '"  and state_id="' . $user_state_id . '" ';
	$country_query  =   '  and country_id="' . $user_country_id . '"';
	$state_query    =   ' and country_id="' . $user_country_id . '"  and state_id="' . $user_state_id . '"';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '4') {
	$user_type_query = '  and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '"';
	$country_query  =   '  and country_id="' . $user_country_id . '"';
	$state_query    =   ' and country_id="' . $user_country_id . '"  and state_id="' . $user_state_id . '"';
	$district_query =   ' and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '"';
	$city_query =   '';
	$area_query =   '';
} else if ($user_type == '5') {
	$user_type_query = '  and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '"';
	$country_query  =   '  and country_id="' . $user_country_id . '"';
	$state_query    =   ' and country_id="' . $user_country_id . '"  and state_id="' . $user_state_id . '"';
	$district_query =   ' and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '"';
	$city_query =   ' and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '"';
	$area_query =   '';
} else if ($user_type == '6') {
	$user_type_query = '  and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '" and area_id="' . $user_area_id . '"';
	$country_query  =   '  and country_id="' . $user_country_id . '"';
	$state_query    =   ' and country_id="' . $user_country_id . '"  and state_id="' . $user_state_id . '"';
	$district_query =   ' and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '"';
	$city_query =   ' and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '"';
	$area_query =   ' and country_id="' . $user_country_id . '" and state_id="' . $user_state_id . '" and district_id="' . $user_district_id . '" and city_id="' . $user_city_id . '" and area_id="' . $user_area_id . '"';
}

$country_id = $_GET['country_id'];
$area_id = $_GET['area_id'];
$city_id = $_GET['city_id'];
$state_id = $_GET['state_id'];
$district_id = $_GET['district_id'];

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
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	<h1>
		<div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Area Wise Report</span><br><span class="welcom inline-welcome">Report // Area Wise Report</span></div>
	</h1>
</section>
<section class="content">
	<form>
		<div class="box">
			<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
				<div class="col-md-2">
					<h5 class="list-content">Country</h5>
					<select name="country_id" id="country_id" required class="form-control select2 item_name" onchange="get_state_list(country_id.value)">
						<option value="">Select Country</option>
						<?php
						$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1' $country_query");
						$prepare->execute();
						$country_list = $prepare->fetchall();
						foreach ($country_list as $value) { ?>
							<option value="<?php echo $value['country_id'] ?>" <?php if ($value['country_id'] == $country_id) {echo "selected";} ?>><?php echo $value['country_name'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-2">
					<h5 class="list-content">State</h5>
					<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district_list(country_id.value,state_id.value)">
						<option value="">Select State</option>
						<?php
						if ($country_id != '') {
							$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1' and country_id=" . $country_id);
							$state->execute();
							$state_list = $state->fetchall();
							foreach ($state_list as $value) { ?>
								<option value="<?php echo $value['state_id']; ?>" <?php if ($value['state_id'] == $_GET['state_id']) {echo "selected";} ?>><?php echo $value['state_name']; ?></option>
						<?php }
						}
						?>
					</select>
				</div>
				<div class="col-md-2">
					<h5 class="list-content">District</h5>
					<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
						<option value="">Select District</option>
						<?php
						if ($state_id != '') {
							$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1' and state_id=" . $state_id);
							$district->execute();
							$district_list = $district->fetchall();
							foreach ($district_list as $value) {
						?>
							<option value="<?php echo $value['district_id'] ?>" <?php if ($value['district_id'] == $district_id) {echo "selected";} ?>><?php echo $value['district_name'] ?></option>
						<?php }
						} ?>
					</select>
				</div>
				<div class="col-md-2">
					<h5 class="list-content">City</h5>
					<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
						<option value="">Select City</option>
						<?php
						if ($district_id != '') {
							$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' and district_id=" . $district_id);
							$city->execute();
							$city_list = $city->fetchall();
							foreach ($city_list as $value) {
						?>
							<option value="<?php echo $value['city_id'] ?>" <?php if ($value['city_id'] == $city_id) {echo "selected";} ?>><?php echo $value['city_name'] ?></option>
						<?php }
						} ?>
					</select>
				</div>
				<div class="col-md-2">
					<h5 class="list-content">Area</h5>
					<select name="area_id" id="area_id" required class="form-control select2 item_name">
						<option value="">Select Area</option>
						<?php
						if ($city_id != '') {
							$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' and city_id=" . $city_id);
							$area->execute();
							$area_list = $area->fetchall();
							foreach ($area_list as $value) {
						?>
							<option value="<?php echo $value['area_id'] ?>" <?php if ($value['area_id'] == $area_id) {echo "selected";} ?>><?php echo $value['area_name'] ?></option>
						<?php }
						} ?>
					</select>
				</div>
				<div class="col-md-2">
					<div class="go-btn ">
						<a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
						<a onclick="set_filter_clear_list()" class="hvr-sweep-to-top"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;</a>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="table-responsive" id="areawise_count_list">
				</div>
			</div>
		</div>
	</form>
</section>
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
	function get_filter_list(country_id, state_id, district_id, city_id, area_id) {
		//window.location.href = "index.php?file=areawise_survey_report/list&country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id;
		var user_type_query='<?php echo $user_type_query; ?>';
	    jQuery.ajax({
			type: "POST",
			url: "areawise_survey_report/areawise_survey_list.php",
			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id+"&user_type_query="+user_type_query,
			success: function(msg) {
				// /alert(msg);
				$("#areawise_count_list").html(msg);
			}
		});
	}
 	$(document).ready(function() {
 		get_filter_list('','','','','');
 	});
	function set_filter_clear_list() {
		window.location.href = "index.php?file=areawise_survey_report/list";
	}
	function area_survey_view(survey_id) {
		jQuery.ajax({
			type: "POST",
			url: "areawise_survey_report/view.php?",
			data: "survey_id=" + survey_id,
			success: function(msg) {
				window.open('areawise_survey_report/view.php?survey_id=' + survey_id, 'onmouseover', 'height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');
				//alert(msg);
				//$("#quotation_view_modal_body").html(msg);
			}
		});
	}
	function area_survey_delete(survey_id) {
		if (confirm("Are you sure?")) {
			jQuery.ajax({
				type: "POST",
				url: "areawise_survey_report/delete.php?",
				data: "survey_id=" + survey_id,
				success: function(msg) {
					alert(msg);
					//window.location.href = 'index.php?file=areawise_survey_report/list';
					window.location.reload();
					//$("#quotation_view_modal_body").html(msg);
				}
			});
		}
		return false;
	}
</script>