<?php 
include 'inc/dashboardcrud.php';

error_reporting(0);
 
 include ("../inc/commonfunction.php");

$country_id=$_POST['country_id'];
$area_id=$_POST['area_id'];
$city_id=$_POST['city_id'];
$state_id=$_POST['state_id'];
$district_id=$_POST['district_id'];

$query='';

if($country_id!='')
{
	$query.='   and country_id="'.$country_id.'"';
}

if($state_id!='')
{
	$query.='   and state_id="'.$state_id.'"';
}

if($district_id!='')
{
	$query.='   and district_id="'.$district_id.'"';
}

if($city_id!='')
{
	$query.='   and city_id="'.$city_id.'"';
}


if($area_id!='')
{
	$query.='   and area_id="'.$area_id.'"';
}

?>

?>
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/wp26208622.jpg);height: 150px;">
      <h1>
        <small></small>
		<?php echo ucfirst($foldername); ?>        
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><div class="top-left">Dashboard<br><span class="welcom">Welcome Administrator</span></div></li>
        <li class="breadcrumb-item active"><?php echo ucfirst($foldername); ?></li>
      </ol>
    </section>

    	<div  class="col-md-2">
    		<h5 class="list-content">Country</h5>
    		 
    	 
					<select name="country_id" id="country_id" required class="form-control select2 item_name" onchange="get_state_list(country_id.value)">
						<option value="">Select Country</option>
							<?php 
							$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1' $country_query");
							$prepare->execute();
							$country_list = $prepare->fetchall();
							foreach($country_list as $value) { ?>
								<option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
							<?php } ?>
					</select>
		 
    	</div>
    	 
    	<div  class="col-md-2">
    		<h5 class="list-content">State</h5>
    		<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district_list(country_id.value,state_id.value)">
						<option value="">Select State</option>
							<?php 
							$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1'   $state_query");
							$state->execute();
							$state_list = $state->fetchall();
							foreach($state_list as $value) { ?>
								<option value="<?php echo $value['state_id']?>"><?php echo $value['state_name']?></option>
							<?php } ?>
					</select>
    	</div>

    	<div  class="col-md-2">
    		<h5 class="list-content">District</h5>
    		<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
						<option value="">Select District</option>
							<?php 
							$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1'  $district_query");
							$district->execute();
							$district_list = $district->fetchall();
							foreach($district_list as $value) { ?>
								<option value="<?php echo $value['district_id']?>"><?php echo $value['district_name']?></option>
							<?php } ?>
					</select>
    	</div>

    	<div  class="col-md-2">
    		<h5 class="list-content">City</h5>
    		<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
				<option value="">Select City</option>
					<?php 
					$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' $city_query");
					$city->execute();
					$city_list = $city->fetchall();
					foreach($city_list as $value) { ?>
						<option value="<?php echo $value['city_id']?>"><?php echo $value['city_name']?></option>
					<?php } ?>
			</select>
    	</div>
    	<div  class="col-md-2">
    		<h5 class="list-content">Area</h5>
    		<select name="area_id" id="area_id" required class="form-control select2 item_name"  >
				<option value="">Select Area</option>
					<?php 
					$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' $area_query");
					$area->execute();
					$area_list = $area->fetchall();
					foreach($area_list as $value) { ?>
						<option value="<?php echo $value['area_id']?>"><?php echo $value['area_name']?></option>
					<?php } ?>
			</select>
    	</div>
    	div  class="col-md-2">
		<div class="go-btn ">
    		 <a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
    	</div>
		</div>
		<div class="areawise_count_list"> 
	<section class="content main-admin">
	  <div class="row ">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple1">
            <span class="info-box-icon push-bottom"><i class="fa fa-bar-chart new-dash "></i></span>
            <div class="info-box-content">
            	<?php 
            		$surgical_list = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE surgery_details_no!=''   ORDER BY survey_id DESC");
					$surgical_list->execute();
					$surgical = $surgical_list->fetchall();       	?>

              <span class="info-box-text">Surgical</span>
              <span class="info-box-number"><?php echo count($surgical); ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 45%"></div>
              </div>
              <span class="progress-description">View More </span>
            </div>
          </div>
        </div>								 
</div>
      <div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple3">
            <span class="info-box-icon push-bottom"><i class="fa fa-bar-chart new-dash "></i></span>
            <div class="info-box-content">
            	<?php 
            		$disability = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE 	disability_pension!='' $query   ORDER BY survey_id DESC");
					$disability->execute();
					$disability_list = $disability->fetchall();    	?>

              <span class="info-box-text">Disability</span>
              <span class="info-box-number"><?php echo count($disability_list); ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 45%"></div>
              </div>
              <span class="progress-description">View More </span>
            </div>
          </div>
        </div>
    </div>
    <div class="areawise_count_list"> 
						       
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple4">
            <span class="info-box-icon push-bottom"><i class="fa fa-bar-chart new-dash"></i></span>
            <div class="info-box-content">
            	<?php 
                    $deserted = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE deserted_women_pension!='' $query   ORDER BY survey_id DESC");
					$deserted->execute();
					$deserted_women = $deserted->fetchAll();  ?>
	              	<span class="info-box-text">Deserted Form</span>
	              	<span class="info-box-number"><?php echo count($deserted_women); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
            </div>
          </div>
        </div>
</div>
<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple5">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
            <div class="info-box-content">
            	<?php 
                    $higher_edu_guide = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE higher_edu_guide!='' $query  ORDER BY survey_id DESC");
					$higher_edu_guide->execute();
					$higher = $higher_edu_guide->fetchAll();  ?>
	              	<span class="info-box-text">Higher Educational Guidence</span>
	              	<span class="info-box-number">
	              		<?php echo count($higher); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
            </div>
          </div>
        </div>
</div>
<div class="areawise_count_list"> 

        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple6">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
	            	<?php 
	                    $ulama_welfare_card = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE ulama_welfare_card!='' $query   ORDER BY survey_id DESC");
						$ulama_welfare_card->execute();
						$ulama_welfare = $ulama_welfare_card->fetchAll();  ?>
		              	<span class="info-box-text">Ulama Welfare Card</span>
		              	<span class="info-box-number">
		              		<?php echo count($higher); ?>
		              	</span>
		              	<div class="progress">
		                	<div class="progress-bar" style="width: 45%"></div>
		              	</div>
		              	<span class="progress-description">View More </span>
	            </div>
          </div>
        </div>
</div>
<div class="areawise_count_list"> 

        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple7">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
            	<div class="info-box-content">
	            	<?php 
	                    $destitute_orphan_welfare = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE destitute_orphan_welfare!='' $query ORDER BY survey_id DESC");
						$destitute_orphan_welfare->execute();
						$destitute_orphan = $destitute_orphan_welfare->fetchAll();  ?>
		              	<span class="info-box-text">Destitute Orphan</span>
		              	<span class="info-box-number">
		              		<?php echo count($destitute_orphan); ?>
		              	</span>
		              	<div class="progress">
		                	<div class="progress-bar" style="width: 45%"></div>
		              	</div>
		              	<span class="progress-description">View More </span>
	            </div>
          </div>
        </div>
    </div>

<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple8">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
	            	<?php 
	                    $interest_in_niswan = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE interest_in_niswan!='' $query ORDER BY survey_id DESC");
						$interest_in_niswan->execute();
						$interest = $interest_in_niswan->fetchAll();  ?>
		              	<span class="info-box-text">Interest In Niswan </span>
		              	<span class="info-box-number">
		              		<?php echo count($interest); ?>
		              	</span>
		              	<div class="progress">
		                	<div class="progress-bar" style="width: 45%"></div>
		              	</div>
		              	<span class="progress-description">View More </span>
	        </div>
          </div>
        </div>
    </div>

        <div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple9">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
	            	<?php 
	                    $family_counselling = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE family_counselling!='' $query  ORDER BY survey_id DESC");
						$family_counselling->execute();
						$family = $family_counselling->fetchAll();  ?>
		              	<span class="info-box-text">Family Counselling</span>
		              	<span class="info-box-number">
		              		<?php echo count($family); ?>
		              	</span>
		              	<div class="progress">
		                	<div class="progress-bar" style="width: 45%"></div>
		              	</div>
		              	<span class="progress-description">View More </span>
	        </div>
          </div>
        </div>
        </div>
       <div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple10">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
	            	<?php 
	                    $guide_for_skill_develop = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE guide_for_skill_develop!='' $query ORDER BY survey_id DESC");
						$guide_for_skill_develop->execute();
						$guide_for_skill_develop_count = $guide_for_skill_develop->fetchAll();  ?>
		              	<span class="info-box-text">Guide For Skill Development </span>
		              	<span class="info-box-number">
		              		<?php echo count($guide_for_skill_develop_count); ?>
		              	</span>
		              	<div class="progress">
		                	<div class="progress-bar" style="width: 45%"></div>
		              	</div>
		              	<span class="progress-description">View More </span>
	        </div>
          </div>
        </div>
</div>

<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple11">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
	            	<?php 
	                    $fin_support_for_edu = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE fin_support_for_edu!='' $query  ORDER BY survey_id DESC");
						$fin_support_for_edu->execute();
						$fin_support_for_edu_count = $fin_support_for_edu->fetchAll();  ?>
		              	<span class="info-box-text">Financial Support <span>
		              	<span class="info-box-number">
		              		<?php echo count($guide_for_skill_develop_count); ?>
		              	</span>
		              	<div class="progress">
		                	<div class="progress-bar" style="width: 45%"></div>
		              	</div>
		              	<span class="progress-description">View More </span>
	        </div>
          </div>
        </div>
    </div>

<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple12">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $recovered_from_chronic_details = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE recovered_from_chronic_details!='' $query  ORDER BY survey_id DESC");
					$recovered_from_chronic_details->execute();
					$recovered_from_chronic_count = $recovered_from_chronic_details->fetchAll();  ?>
	              	<span class="info-box-text">Recoverd From Any Chronic Diseases</span>
	              	<span class="info-box-number">
	              		<?php echo count($recovered_from_chronic_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>
    </div>


          <div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12 ">
          <div class="info-box bg-b-purple13">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $govt_insurance_card_avail = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE govt_insurance_card_avail!='' $query  ORDER BY survey_id DESC");
					$govt_insurance_card_avail->execute();
					$govt_insurance_card_avail_count = $govt_insurance_card_avail->fetchAll();  ?>
	              	<span class="info-box-text">Goverment Insurance</span>
	              	<span class="info-box-number">
	              		<?php echo count($fin_support_for_edu_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>

</div>
<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple14">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $willing_to_help_in_mohalla = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE willing_to_help_in_mohalla!='' $query  ORDER BY survey_id DESC");
					$willing_to_help_in_mohalla->execute();
					$willing_to_help_in_mohalla_count = $willing_to_help_in_mohalla->fetchAll();  ?>
	              	<span class="info-box-text">Willing to Help In Mohalla </span>
	              	<span class="info-box-number">
	              		<?php echo count($willing_to_help_in_mohalla_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>
</div>
<div class="areawise_count_list"> 

        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple15">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $pre_matric_scholarship = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE pre_matric_scholarship!='' $query  ORDER BY survey_id DESC");
					$pre_matric_scholarship->execute();
					$pre_matric_scholarship_count = $pre_matric_scholarship->fetchAll();  ?>
	              	<span class="info-box-text">Pre Matric Scholarship</span>
	              	<span class="info-box-number">
	              		<?php echo count($pre_matric_scholarship_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>
</div>
<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple16">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $post_matric_scholarship = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE post_matric_scholarship!='' $query  ORDER BY survey_id DESC");
					$post_matric_scholarship->execute();
					$post_matric_scholarship_count = $post_matric_scholarship->fetchAll();  ?>
	              	<span class="info-box-text">Post Matric Scholarship</span>
	              	<span class="info-box-number">
	              		<?php echo count($post_matric_scholarship_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>
</div>
      <div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple17">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $widow_aged_welfare = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE widow_aged_welfare!='' $query  ORDER BY survey_id DESC");
					$widow_aged_welfare->execute();
					$widow_aged_welfare_count = $widow_aged_welfare->fetchAll();  ?>
	              	<span class="info-box-text">Widow Aged Welfare</span>
	              	<span class="info-box-number">
	              		<?php echo count($widow_aged_welfare_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>
</div>
<div class="areawise_count_list"> 
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box bg-b-purple18">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-bar-chart new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
                    $school_dropouts_interest_in_emp = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE school_dropouts_interest_in_emp!='' $query  ORDER BY survey_id DESC");
					$school_dropouts_interest_in_emp->execute();
					$school_dropouts_interest_in_emp_count = $school_dropouts_interest_in_emp->fetchAll();  ?>
	              	<span class="info-box-text">School Dropouts Interested in Employment</span>
	              	<span class="info-box-number">
	              		<?php echo count($widow_aged_welfare_count); ?>
	              	</span>
	              	<div class="progress">
	                	<div class="progress-bar" style="width: 45%"></div>
	              	</div>
	              	<span class="progress-description">View More </span>
        	</div>
          </div>
        </div>
			</div>
				
		
      </div>
	</section>
	
	

	<style type="text/css">
		
.bg-b-purple1
{
	background: linear-gradient(45deg, #3dabcc, #9be9f1);
}
.bg-b-purple2
{
	background: linear-gradient(45deg, #270fef, #b6b4d8);
}
.bg-b-purple3
{
	background: linear-gradient(45deg, #13a519, #9bf1ae);
}

.bg-b-purple4
{
	background: linear-gradient(45deg, #5a94d2, #9eb1dc);
}

.bg-b-purple5
{
	background: linear-gradient(45deg, #d82d84, #e29bf1);
}

.bg-b-purple6
{
	background: linear-gradient(45deg, #ab8ce4, #dfc5e4);
}

.bg-b-purple7
{
	background: linear-gradient(45deg, #3394fb, #a9cdf3);
}


.bg-b-purple8
{
	background: linear-gradient(45deg, #03a9f3, #b5e7fd);
}


.bg-b-purple9
{
	background: linear-gradient(45deg, #ecdc17, #f3f5f6);
}


.bg-b-purple10
{
	background: linear-gradient(45deg, #f921f2, #e29bf1);
}

.bg-b-purple11
{
	background: linear-gradient(45deg, #f50404, #ef8c8c);
}

.bg-b-purple12
{
	background: linear-gradient(45deg, #f3007b, #e29bf1);
}

.bg-b-purple13
{
	background: linear-gradient(45deg, #6850ef, #e29bf1);
}

.bg-b-purple14
{
	background: linear-gradient(45deg, #0aef31, #dcf1e1);
}

.bg-b-purple15
{
	background: linear-gradient(45deg, #55daaf, #b0e6dc);
}

.bg-b-purple16
{
	background: linear-gradient(45deg, #fdb209, #f7fb0e);
}
.bg-b-purple17
{
	background: linear-gradient(45deg, #f35252, #efb7b7);
}

.bg-b-purple18
{
	background: linear-gradient(45deg, #0221fb, #9bbdf1);
}
	</style>
	<script type="text/javascript">
		function get_state_list(country_id)
{
	format=$("form").serialize()+"&action=state_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#state_id").html(msg);		 
		}
	});
}

function get_district_list(country_id,state_id)
{
	format=$("form").serialize()+"&action=district_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#district_id").html(msg);		 
		}
	});
}

function get_city_list(country_id,state_id,district_id)
{
	format=$("form").serialize()+"&action=city_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#city_id").html(msg);		 
		}
	});
}

function get_area_list(country_id,state_id,district_id,city_id)
{
	format=$("form").serialize()+"&action=area_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#area_id").html(msg);		 
		}
	});
} 

function  get_filter_list(country_id,state_id,district_id,city_id,area_id)
{
	 
	jQuery.ajax({
	type: "POST",
	url: "masjidh/dashboard.php",
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id,
	success: function(msg)
	{ 
		// /alert(msg);
	 $("#areawise_count_list").html(msg);
	}
});
}

	</script>