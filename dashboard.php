<?php
include 'inc/dashboardcrud.php';

$country_id =   $_SESSION['country_id'];
$state_id =   $_SESSION['state_id'];
$district_id =   $_SESSION['district_id'];
$city_id =   $_SESSION['city_id'];
$area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];
$usercreation_id  =   $_SESSION['usercreation_id'];


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

?>

<!-- Content Header (Page header) -->
<section class="content-header" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/wp26208622.jpg);height: 150px;">
	<h1>
		<small></small>
		<?php echo ucfirst($foldername); ?>
	</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<div class="top-left">Dashboard<br><span class="welcom">Welcome <?php echo get_user_name($usercreation_id)." (".get_user_type($user_type).")"; ?></span></div>
		</li>
		<li class="breadcrumb-item active"><?php echo ucfirst($foldername); ?></li>
	</ol>
</section>
<form>
	<div class="row" style="padding: 27px 20px;">
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
				/*$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1' ");
				$state->execute();
				$state_list = $state->fetchall();
				foreach ($state_list as $value) { ?>
					<option value="<?php echo $value['state_id'] ?>"><?php echo $value['state_name'] ?></option>
				<?php }*/ ?>
			</select>
		</div>

		<div class="col-md-2">
			<h5 class="list-content">District</h5>
			<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
				<option value="">Select District</option>
				<?php
				/*$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1' ");
				$district->execute();
				$district_list = $district->fetchall();
				foreach ($district_list as $value) { ?>
					<option value="<?php echo $value['district_id'] ?>"><?php echo $value['district_name'] ?></option>
				<?php }*/ ?>
			</select>
		</div>

		<div class="col-md-2">
			<h5 class="list-content">City</h5>
			<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
				<option value="">Select City</option>
				<?php
				/*$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' ");
				$city->execute();
				$city_list = $city->fetchall();
				foreach ($city_list as $value) { ?>
					<option value="<?php echo $value['city_id'] ?>"><?php echo $value['city_name'] ?></option>
				<?php }*/ ?>
			</select>
		</div>
		<div class="col-md-2">
			<h5 class="list-content">Area</h5>
			<select name="area_id" id="area_id" required class="form-control select2 item_name">
				<option value="">Select Area</option>
				<?php
				/*$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' ");
				$area->execute();
				$area_list = $area->fetchall();
				foreach ($area_list as $value) { ?>
					<option value="<?php echo $value['area_id'] ?>"><?php echo $value['area_name'] ?></option>
				<?php }*/ ?>
			</select>
		</div>
		<div class="col-md-2">
			<div class="go-btn ">
				<a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
			</div>
		</div>
	</div>

	<div id="dashboard_filter">
		<section class="content main-admin">
			<div class="row ">
				<div class="col-xl-4 col-md-6 col-12">
					<div class="info-box bg-b-purple1">
						<a href="index.php?file=food_needed_report/list">
							<span class="info-box-icon push-bottom"><i class="fa fa-plus-square new-dash "></i></span>
							<div class="info-box-content">
								<?php
								$food_needed = $pdo_conn->prepare("SELECT * FROM food_needed WHERE food_needed_id!='' $query $user_type_query ORDER BY food_needed_id DESC");
								$food_needed->execute();
								$food_needed_count = $food_needed->fetchall();       	?>

								<span class="info-box-text">Food</span>
								<span class="info-box-number"><?php echo count($food_needed_count); ?></span>
								<div class="progress">
									<div class="progress-bar" style="width: 45%"></div>
								</div>
								<span class="progress-description">View More </span>
							</div>
						</a>
					</div>
				</div>

				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple3">-->
				<!--    <span class="info-box-icon push-bottom"><i class="fa fa-wheelchair new-dash "></i></span>-->
				<!--    <div class="info-box-content">-->
				<?php
				?>

				<!--      <span class="info-box-text">Goverment Schemes</span>-->
				<!--      <span class="info-box-number"><?php echo "0"; ?></span>-->
				<!--      <div class="progress">-->
				<!--        <div class="progress-bar" style="width: 45%"></div>-->
				<!--      </div>-->
				<!--      <span class="progress-description">View More </span>-->
				<!--    </div>-->
				<!--  </div>-->
				<!--</div>-->


				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple4">-->
				<!--    <span class="info-box-icon push-bottom"><i class="fa fa-file-text-o new-dash"></i></span>-->
				<!--    <div class="info-box-content">-->
				<?php
				?>
				<!--       	<span class="info-box-text">Education</span>-->
				<!--       	<span class="info-box-number"><?php echo "0"; ?>-->
				<!--       	</span>-->
				<!--       	<div class="progress">-->
				<!--         	<div class="progress-bar" style="width: 45%"></div>-->
				<!--       	</div>-->
				<!--       	<span class="progress-description">View More </span>-->
				<!--    </div>-->
				<!--  </div>-->
				<!--</div>-->

				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple5">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-university new-dash"></i></span>-->
				<!--    <div class="info-box-content">-->
				<?php
				?>
				<!--       	<span class="info-box-text">Counselling</span>-->
				<!--       	<span class="info-box-number">-->
				<!--       		<?php echo count($higher); ?>-->
				<!--       	</span>-->
				<!--       	<div class="progress">-->
				<!--         	<div class="progress-bar" style="width: 45%"></div>-->
				<!--       	</div>-->
				<!--       	<span class="progress-description">View More </span>-->
				<!--    </div>-->
				<!--  </div>-->
				<!--</div>-->


				<div class="col-xl-4 col-md-6 col-12">
					<div class="info-box bg-b-purple5"> <!--6-->
						<a href="index.php?file=medical_report/list">
							<span class="info-box-icon push-bottom">
								<i class="fa fa-id-card new-dash"></i></span>
							<div class="info-box-content">
								<?php
								$medical_help = $pdo_conn->prepare("SELECT * FROM medical_help WHERE medical_help_id!='' $query $user_type_query ORDER BY medical_help_id DESC");
								$medical_help->execute();
								$medical_help_count = $medical_help->fetchall();
								?>
								<span class="info-box-text">Health & Medical</span>
								<span class="info-box-number">
									<?php echo count($medical_help_count); ?>
								</span>
								<div class="progress">
									<div class="progress-bar" style="width: 45%"></div>
								</div>
								<span class="progress-description">View More </span>
							</div>
						</a>
					</div>
				</div>


				<div class="col-xl-4 col-md-6 col-12">
					<div class="info-box bg-b-purple6"> <!--7-->
						<a href="index.php?file=jobapplication_report/list">
							<span class="info-box-icon push-bottom">
								<i class="fa fa-close new-dash"></i></span>
							<div class="info-box-content">
								<?php
								$job_application = $pdo_conn->prepare("SELECT * FROM job_application WHERE job_id!='' $user_type_query ORDER BY job_id DESC");
								$job_application->execute();
								$job_application_count = $job_application->fetchAll();  ?>
								<span class="info-box-text">Job</span>
								<span class="info-box-number">
									<?php echo count($job_application_count); ?>
								</span>
								<div class="progress">
									<div class="progress-bar" style="width: 45%"></div>
								</div>
								<span class="progress-description">View More </span>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 col-12">
					<div class="info-box bg-b-purple9"> <!--8-->
						<a href="index.php?file=matrimonial_report/list">
							<span class="info-box-icon push-bottom">
								<i class="fa fa-thumbs-up new-dash"></i></span>
							<div class="info-box-content">
								<?php
								$matrimonial_information = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE matrimonial_id!='' $user_type_query ORDER BY matrimonial_id DESC");
								$matrimonial_information->execute();
								$matrimonial_count = $matrimonial_information->fetchAll();  ?>
								<span class="info-box-text">Matrimonial </span>
								<span class="info-box-number">
									<?php echo count($matrimonial_count); ?>
								</span>
								<div class="progress">
									<div class="progress-bar" style="width: 45%"></div>
								</div>
								<span class="progress-description">View More </span>
							</div>
						</a>
					</div>
				</div>

				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple9">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-users new-dash"></i></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--        	<span class="info-box-text">Real Estates</span>-->
				<!--        	<span class="info-box-number">-->
				<!--        		<?php echo count($family); ?>-->
				<!--        	</span>-->
				<!--        	<div class="progress">-->
				<!--          	<div class="progress-bar" style="width: 45%"></div>-->
				<!--        	</div>-->
				<!--        	<span class="progress-description">View More </span>-->
				<!-- </div>-->
				<!--  </div>-->
				<!--</div>-->

				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple10">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<img src="images/icons/11.png"></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--        	<span class="info-box-text">Business Connections </span>-->
				<!--        	<span class="info-box-number">-->
				<!--        		<?php echo count($guide_for_skill_develop_count); ?>-->
				<!--        	</span>-->
				<!--        	<div class="progress">-->
				<!--          	<div class="progress-bar" style="width: 45%"></div>-->
				<!--        	</div>-->
				<!--        	<span class="progress-description">View More </span>-->
				<!-- </div>-->
				<!--  </div>-->
				<!--</div>-->

				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple11">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-money new-dash"></i></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--        	<span class="info-box-text">Legal  Advice <span>-->
				<!--        	<span class="info-box-number">-->
				<!--        		<?php echo count($guide_for_skill_develop_count); ?>-->
				<!--        	</span>-->
				<!--        	<div class="progress">-->
				<!--          	<div class="progress-bar" style="width: 45%"></div>-->
				<!--        	</div>-->
				<!--        	<span class="progress-description">View More </span>-->
				<!-- </div>-->
				<!--  </div>-->
				<!--</div>-->

				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple12">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-thermometer-half new-dash"></i></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--       	<span class="info-box-text">Environmental  Guidance</span>-->
				<!--       	<span class="info-box-number">-->
				<!--       		<?php echo count($recovered_from_chronic_count); ?>-->
				<!--       	</span>-->
				<!--       	<div class="progress">-->
				<!--         	<div class="progress-bar" style="width: 45%"></div>-->
				<!--       	</div>-->
				<!--       	<span class="progress-description">View More </span>-->
				<!--	</div>-->
				<!--  </div>-->
				<!--</div>-->

				<!--<div class="col-xl-4 col-md-6 col-12 ">-->
				<!--  <div class="info-box bg-b-purple13">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-building new-dash"></i></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--       	<span class="info-box-text">Emergency Needs</span>-->
				<!--       	<span class="info-box-number">-->
				<!--       		<?php echo count($fin_support_for_edu_count); ?>-->
				<!--       	</span>-->
				<!--       	<div class="progress">-->
				<!--         	<div class="progress-bar" style="width: 45%"></div>-->
				<!--       	</div>-->
				<!--       	<span class="progress-description">View More </span>-->
				<!--	</div>-->
				<!--  </div>-->
				<!--</div>-->


				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple14">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-thumbs-up new-dash"></i></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--       	<span class="info-box-text">To Convey Secret Problems </span>-->
				<!--       	<span class="info-box-number">-->
				<!--       		<?php echo count($willing_to_help_in_mohalla_count); ?>-->
				<!--       	</span>-->
				<!--       	<div class="progress">-->
				<!--         	<div class="progress-bar" style="width: 45%"></div>-->
				<!--       	</div>-->
				<!--       	<span class="progress-description">View More </span>-->
				<!--	</div>-->
				<!--  </div>-->
				<!--</div>-->


				<!--<div class="col-xl-4 col-md-6 col-12">-->
				<!--  <div class="info-box bg-b-purple15">-->
				<!--    <span class="info-box-icon push-bottom">-->
				<!--    	<i class="fa fa-graduation-cap new-dash"></i></span>-->
				<!--     <div class="info-box-content">-->
				<?php
				?>
				<!--       	<span class="info-box-text">To Become Sponcers</span>-->
				<!--       	<span class="info-box-number">-->
				<!--       		<?php echo count($pre_matric_scholarship_count); ?>-->
				<!--       	</span>-->
				<!--       	<div class="progress">-->
				<!--         	<div class="progress-bar" style="width: 45%"></div>-->
				<!--       	</div>-->
				<!--       	<span class="progress-description">View More </span>-->
				<!--	</div>-->
				<!--  </div>-->
				<!--</div>-->

				<div class="col-xl-4 col-md-6 col-12">
					<div class="info-box bg-b-purple15"> <!--16-->
						<a href="index.php?file=join_form/list">
							<span class="info-box-icon push-bottom">
								<i class="fa fa-graduation-cap new-dash"></i></span>
							<div class="info-box-content">
								<?php
								$join_masjith = $pdo_conn->prepare("SELECT * FROM join_masjith WHERE join_id!='' $user_type_query ORDER BY join_id DESC");
								$join_masjith->execute();
								$join_masjith_count = $join_masjith->fetchAll(); ?>
								<span class="info-box-text">To Become MSK Activists</span>
								<span class="info-box-number">
									<?php echo count($join_masjith_count); ?>
								</span>
								<div class="progress">
									<div class="progress-bar" style="width: 45%"></div>
								</div>
								<span class="progress-description">View More </span>
							</div>
						</a>
					</div>
				</div>

				<div class="col-xl-4 col-md-6 col-12">
					<div class="info-box bg-b-purple16">
						<a href="index.php?file=admission_card_report/list">
							<span class="info-box-icon push-bottom">
								<i class="fa fa-graduation-cap new-dash"></i></span>
							<div class="info-box-content">
								<?php
								$admission_card = $pdo_conn->prepare("SELECT * FROM admission_card WHERE admission_card_id!='' $user_type_query ORDER BY admission_card_id DESC");
								$admission_card->execute();
								$admission_card_count = $admission_card->fetchAll(); ?>
								<span class="info-box-text">Admission Card</span>
								<span class="info-box-number">
									<?php echo count($admission_card_count); ?>
								</span>
								<div class="progress">
									<div class="progress-bar" style="width: 45%"></div>
								</div>
								<span class="progress-description">View More </span>
							</div>
						</a>
					</div>
				</div>



			</div>






		</section>
	</div>

</form>

<style type="text/css">
	.bg-b-purple1 {
		background: linear-gradient(45deg, #3dabcc, #9be9f1);
	}

	.bg-b-purple2 {
		background: linear-gradient(45deg, #270fef, #b6b4d8);
	}

	.bg-b-purple3 {
		background: linear-gradient(45deg, #13a519, #9bf1ae);
	}

	.bg-b-purple4 {
		background: linear-gradient(45deg, #5a94d2, #9eb1dc);
	}

	.bg-b-purple5 {
		background: linear-gradient(45deg, #d82d84, #e29bf1);
	}

	.bg-b-purple6 {
		background: linear-gradient(45deg, #ab8ce4, #dfc5e4);
	}

	.bg-b-purple7 {
		background: linear-gradient(45deg, #3394fb, #a9cdf3);
	}


	.bg-b-purple8 {
		background: linear-gradient(45deg, #03a9f3, #b5e7fd);
	}


	.bg-b-purple9 {
		background: linear-gradient(45deg, #9c9327, #bbd6e4);
	}


	.bg-b-purple10 {
		background: linear-gradient(45deg, #f921f2, #e29bf1);
	}

	.bg-b-purple11 {
		background: linear-gradient(45deg, #f50404, #ef8c8c);
	}

	.bg-b-purple12 {
		background: linear-gradient(45deg, #f3007b, #e29bf1);
	}

	.bg-b-purple13 {
		background: linear-gradient(45deg, #6850ef, #e29bf1);
	}

	.bg-b-purple14 {
		background: linear-gradient(45deg, #8bc34a, #99f5af);
	}

	.bg-b-purple15 {
		background: linear-gradient(45deg, #55daaf, #b0e6dc);
	}

	.bg-b-purple16 {
		background: linear-gradient(45deg, #f9b312, #bbbbaf)
	}

	.bg-b-purple17 {
		background: linear-gradient(45deg, #f35252, #efb7b7);
	}

	.bg-b-purple18 {
		background: linear-gradient(45deg, #0221fb, #9bbdf1);
	}
</style>
<script type="text/javascript">
	function get_state_list(country_id) {
		var state_query = '<?php echo $state_query; ?>';
		format = $("form").serialize() + "&action=state_list" + "&state_query=" + state_query;
		jQuery.ajax({
			type: "POST",
			url: "inc/commonfunction.php",
			data: format,
			success: function(msg) {
				//alert(msg)
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
				//alert(msg);
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
			url: "dashboard_filter.php",
			data: "country_id=" + country_id + "&state_id=" + state_id + "&district_id=" + district_id + "&city_id=" + city_id + "&area_id=" + area_id+"&user_type_query="+user_type_query,
			success: function(msg) {
				//alert(msg);
				$("#dashboard_filter").html(msg);
			}
		});
	}
</script>