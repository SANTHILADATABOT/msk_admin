 <section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
 	<h1>
 		<div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">MSK Activists Report</span><br><span class="welcom inline-welcome">Report // MSK Activists Report</span></div>
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
 						<?php
							// 			$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1' ");
							// 			$state->execute();
							// 			$state_list = $state->fetchall();
							// 			foreach($state_list as $value) { 
							?>
 						<!--<option value="<?php echo $value['state_id'] ?>"><?php echo $value['state_name'] ?></option>-->
 						<?php //} 
							?>
 					</select>
 				</div>

 				<div class="col-md-2">
 					<h5 class="list-content">District</h5>
 					<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
 						<option value="">Select District</option>
 						<?php
							// 			$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1' ");
							// 			$district->execute();
							// 			$district_list = $district->fetchall();
							// 			foreach($district_list as $value) { 
							?>
 						<!--<option value="<?php echo $value['district_id'] ?>"><?php echo $value['district_name'] ?></option>-->
 						<?php //} 
							?>
 					</select>
 				</div>

 				<div class="col-md-2">
 					<h5 class="list-content">City</h5>
 					<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
 						<option value="">Select City</option>
 						<?php
							// 	$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' ");
							// 	$city->execute();
							// 	$city_list = $city->fetchall();
							// 	foreach($city_list as $value) { 
							?>
 						<!--<option value="<?php echo $value['city_id'] ?>"><?php echo $value['city_name'] ?></option>-->
 						<?php //} 
							?>
 					</select>
 				</div>
 				<!--
<div class="modal fade" id="quotation_view">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
 				<!--   <div class="modal-header">
			                  <h3 class="modal-title">Join Form View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <!-- Modal body -->
 				<!--   <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>
			                <!-- Modal footer -->
 				<!--  <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> -->
 				<div class="col-md-2">
 					<h5 class="list-content">Area</h5>
 					<select name="area_id" id="area_id" required class="form-control select2 item_name">
 						<option value="">Select Area</option>
 						<?php
							// 	$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' ");
							// 	$area->execute();
							// 	$area_list = $area->fetchall();
							// 	foreach($area_list as $value) { 
							?>
 						<!--<option value="<?php echo $value['area_id'] ?>"><?php echo $value['area_name'] ?></option>-->
 						<?php //} 
							?>
 					</select>
 				</div>

 				<div class="col-md-2">
 					<div class="go-btn ">
 						<a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
 					</div>
 				</div>

 			</div>

 			<table border="0" cellspacing="0" width="90%">
 				<tr>

 					<td width="10%" align="center">
 						<a onclick="javascript:Join_form_overall_print(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" style="float:right"><img align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
 					</td>
 				</tr>
 			</table>


 			<!-- /.box-header -->
 			<div class="box-body">
 				<div class="table-responsive" id="join_form_list">

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

 	function get_filter_list(country_id, state_id, district_id, city_id, area_id) {
 	    var user_type_query='<?php echo $user_type_query; ?>';
 		jQuery.ajax({
 			type: "POST",
 			url: "join_form/join_form_list.php",
 			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id+"&user_type_query="+user_type_query,
 			success: function(msg) {
 				// /alert(msg);
 				$("#join_form_list").html(msg);
 			}
 		});
 	}
 	$(document).ready(function() {
 		get_filter_list('', '', '', '', '');
 	});

 	function join_form_view(join_id) { //alert("join_id"+join_id);
 		jQuery.ajax({
 			type: "POST",
 			url: "join_form/msk_activists.php?",
 			data: "join_id=" + join_id,
 			success: function(msg) {
 				// $("#quotation_view_modal_body").html(msg);
 				window.open('join_form/msk_activists.php?join_id=' + join_id, 'onmouseover', 'height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');
 			}
 		});
 	}

 	function join_form_delete(join_id) { //alert("join_id"+join_id);
 		if (confirm("Are you sure?")) {
 			// your deletion code

 			jQuery.ajax({
 				type: "POST",
 				url: "join_form/delete.php?",
 				data: "join_id=" + join_id,
 				success: function(msg) {
 					alert(msg);
 					window.location.href = 'index.php?file=join_form/list';
 				}
 			});

 		}
 		return false;
 	}


 	function Join_form_overall_print(country_id, state_id, district_id, city_id, area_id) {
 		var dash_country_id = '<?php echo $dash_country_id; ?>';
 		var dash_state_id = '<?php echo $dash_state_id; ?>';
 		var dash_district_id = '<?php echo $dash_district_id; ?>';
 		var dash_city_id = '<?php echo $dash_city_id; ?>';
 		var dash_area_id = '<?php echo $dash_area_id; ?>';

 		jQuery.ajax({
 			type: "POST",
 			url: "join_form/Join_form_overall_print.php",
 			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id + "&dash_country_id=" + dash_country_id + "&dash_state_id=" + dash_state_id + "&dash_district_id=" + dash_district_id + "&dash_city_id=" + dash_city_id + "&dash_area_id=" + dash_area_id,
 			success: function(msg) {
 				//alert(msg);
 				window.open('join_form/Join_form_overall_print.php?country_id=' + country_id + '&state_id=' + state_id + '&district_id=' + district_id + '&city_id=' + city_id + '&area_id=' + area_id + "&dash_country_id=" + dash_country_id + "&dash_state_id=" + dash_state_id + "&dash_district_id=" + dash_district_id + "&dash_city_id=" + dash_city_id + "&dash_area_id=" + dash_area_id, 'onmouseover', 'height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');
 			}
 		});

 	}
 </script>