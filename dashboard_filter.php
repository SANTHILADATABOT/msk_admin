<?php
error_reporting(0);
include 'inc/dashboardcrud.php';
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

	<div id="dashboard_filter">
<section class="content main-admin">
	  <div class="row ">
        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple1">-->
        <!--    <span class="info-box-icon push-bottom"><i class="fa fa-plus-square new-dash "></i></span>-->
        <!--    <div class="info-box-content">-->
            	<?php 
    //         		$surgical_list = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE surgery_details_no!='' $query  ORDER BY survey_id DESC");
				// 	$surgical_list->execute();
				// 	$surgical = $surgical_list->fetchall();       
					?>

        <!--      <span class="info-box-text">Surgical</span>-->
        <!--      <span class="info-box-number"><?php echo count($surgical); ?></span>-->
        <!--      <div class="progress">-->
        <!--        <div class="progress-bar" style="width: 45%"></div>-->
        <!--      </div>-->
        <!--      <span class="progress-description">View More </span>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>								 -->

        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple3">-->
        <!--    <span class="info-box-icon push-bottom"><i class="fa fa-wheelchair new-dash "></i></span>-->
        <!--    <div class="info-box-content">-->
            	<?php 
    //         		$disability = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE 	disability_pension!='' $query   ORDER BY survey_id DESC");
				// 	$disability->execute();
				// 	$disability_list = $disability->fetchall();   
					?>

        <!--      <span class="info-box-text">Disability</span>-->
        <!--      <span class="info-box-number"><?php echo count($disability_list); ?></span>-->
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
    //                 $deserted = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE deserted_women_pension!=''  $query ORDER BY survey_id DESC");
				// 	$deserted->execute();
				// 	$deserted_women = $deserted->fetchAll();  ?>
	             	<!--<span class="info-box-text">Deserted Form</span>-->
	              <!--	<span class="info-box-number">-->
	              	<?php //echo count($deserted_women);
	              	?>
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
    //                 $higher_edu_guide = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE higher_edu_guide!='' $query   ORDER BY survey_id DESC");
				// 	$higher_edu_guide->execute();
				// 	$higher = $higher_edu_guide->fetchAll();  
					?>
	       <!--       	<span class="info-box-text">Higher Educational Guidence</span>-->
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


        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple6">-->
        <!--    <span class="info-box-icon push-bottom">-->
        <!--    	<i class="fa fa-id-card new-dash"></i></span>-->
	       <!--     <div class="info-box-content">-->
	            	<?php 
	   //                 $ulama_welfare_card = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE ulama_welfare_card!=''  $query  ORDER BY survey_id DESC");
				// 		$ulama_welfare_card->execute();
				// 		$ulama_welfare = $ulama_welfare_card->fetchAll(); 
						?>
		      <!--        	<span class="info-box-text">Ulama Welfare Card</span>-->
		      <!--        	<span class="info-box-number">-->
		      <!--        		<?php echo count($higher); ?>-->
		      <!--        	</span>-->
		      <!--        	<div class="progress">-->
		      <!--          	<div class="progress-bar" style="width: 45%"></div>-->
		      <!--        	</div>-->
		      <!--        	<span class="progress-description">View More </span>-->
	       <!--     </div>-->
        <!--  </div>-->
        <!--</div>-->


        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple7">-->
        <!--    <span class="info-box-icon push-bottom">-->
        <!--    	<i class="fa fa-close new-dash"></i></span>-->
        <!--    	<div class="info-box-content">-->
	            	<?php 
	   //                 $destitute_orphan_welfare = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE destitute_orphan_welfare!='' $query ORDER BY survey_id DESC");
				// 		$destitute_orphan_welfare->execute();
				// 		$destitute_orphan = $destitute_orphan_welfare->fetchAll();  
						?>
		      <!--        	<span class="info-box-text">Destitute Orphan</span>-->
		      <!--        	<span class="info-box-number">-->
		      <!--        		<?php echo count($destitute_orphan); ?>-->
		      <!--        	</span>-->
		      <!--        	<div class="progress">-->
		      <!--          	<div class="progress-bar" style="width: 45%"></div>-->
		      <!--        	</div>-->
		      <!--        	<span class="progress-description">View More </span>-->
	       <!--     </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple8">-->
        <!--    <span class="info-box-icon push-bottom">-->
        <!--    	<i class="fa fa-thumbs-up new-dash"></i></span>-->
	       <!--     <div class="info-box-content">-->
	            	<?php 
	   //                 $interest_in_niswan = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE interest_in_niswan!='' $query ORDER BY survey_id DESC");
				// 		$interest_in_niswan->execute();
				// 		$interest = $interest_in_niswan->fetchAll();  
						?>
		      <!--        	<span class="info-box-text">Interest In Niswan </span>-->
		      <!--        	<span class="info-box-number">-->
		      <!--        		<?php echo count($interest); ?>-->
		      <!--        	</span>-->
		      <!--        	<div class="progress">-->
		      <!--          	<div class="progress-bar" style="width: 45%"></div>-->
		      <!--        	</div>-->
		      <!--        	<span class="progress-description">View More </span>-->
	       <!-- </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple9">-->
        <!--    <span class="info-box-icon push-bottom">-->
        <!--    	<i class="fa fa-users new-dash"></i></span>-->
	       <!--     <div class="info-box-content">-->
	            	<?php 
	   //                 $family_counselling = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE family_counselling!='' $query  ORDER BY survey_id DESC");
				// 		$family_counselling->execute();
				// 		$family = $family_counselling->fetchAll();
						?>
		      <!--        	<span class="info-box-text">Family Counselling</span>-->
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
	   //                 $guide_for_skill_develop = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE guide_for_skill_develop!=''$query ORDER BY survey_id DESC");
				// 		$guide_for_skill_develop->execute();
				// 		$guide_for_skill_develop_count = $guide_for_skill_develop->fetchAll(); 
						?>
		      <!--        	<span class="info-box-text">Guide For Skill Development </span>-->
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
	   //                 $fin_support_for_edu = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE fin_support_for_edu!='' $query ORDER BY survey_id DESC");
				// 		$fin_support_for_edu->execute();
				// 		$fin_support_for_edu_count = $fin_support_for_edu->fetchAll();  
						?>
		      <!--        	<span class="info-box-text">Financial Support <span>-->
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
    //                 $recovered_from_chronic_details = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE recovered_from_chronic_details!=''$query ORDER BY survey_id DESC");
				// 	$recovered_from_chronic_details->execute();
				// 	$recovered_from_chronic_count = $recovered_from_chronic_details->fetchAll(); 
					?>
	       <!--       	<span class="info-box-text">Recoverd From Any Chronic Diseases</span>-->
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
    //                 $govt_insurance_card_avail = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE govt_insurance_card_avail!='' $query ORDER BY survey_id DESC");
				// 	$govt_insurance_card_avail->execute();
				// 	$govt_insurance_card_avail_count = $govt_insurance_card_avail->fetchAll(); 
					?>
	       <!--       	<span class="info-box-text">Goverment Insurance</span>-->
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
    //                 $willing_to_help_in_mohalla = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE willing_to_help_in_mohalla!='' $query  ORDER BY survey_id DESC");
				// 	$willing_to_help_in_mohalla->execute();
				// 	$willing_to_help_in_mohalla_count = $willing_to_help_in_mohalla->fetchAll();  
					?>
	       <!--       	<span class="info-box-text">Willing to Help In Mohalla </span>-->
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
    //                 $pre_matric_scholarship = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE pre_matric_scholarship!='' $query ORDER BY survey_id DESC");
				// 	$pre_matric_scholarship->execute();
				// 	$pre_matric_scholarship_count = $pre_matric_scholarship->fetchAll(); 
					?>
	       <!--       	<span class="info-box-text">Pre Matric Scholarship</span>-->
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

        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple16">-->
        <!--    <span class="info-box-icon push-bottom">-->
        <!--    	<i class="fa fa-graduation-cap new-dash"></i></span>-->
	       <!--     <div class="info-box-content">-->
            	<?php 
    //                 $post_matric_scholarship = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE post_matric_scholarship!='' $query ORDER BY survey_id DESC");
				// 	$post_matric_scholarship->execute();
				// 	$post_matric_scholarship_count = $post_matric_scholarship->fetchAll();
					?>
	       <!--       	<span class="info-box-text">Post Matric Scholarship</span>-->
	       <!--       	<span class="info-box-number">-->
	       <!--       		<?php echo count($post_matric_scholarship_count); ?>-->
	       <!--       	</span>-->
	       <!--       	<div class="progress">-->
	       <!--         	<div class="progress-bar" style="width: 45%"></div>-->
	       <!--       	</div>-->
	       <!--       	<span class="progress-description">View More </span>-->
        <!--	</div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-xl-4 col-md-6 col-12">-->
        <!--  <div class="info-box bg-b-purple17">-->
        <!--    <span class="info-box-icon push-bottom">-->
        <!--    	<i class="fa fa-wikipedia-w new-dash"></i></span>-->
	       <!--     <div class="info-box-content">-->
            	<?php 
    //                 $widow_aged_welfare = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE widow_aged_welfare!=''$query ORDER BY survey_id DESC");
				// 	$widow_aged_welfare->execute();
				// 	$widow_aged_welfare_count = $widow_aged_welfare->fetchAll(); 
					?>
	       <!--       	<span class="info-box-text">Widow Aged Welfare</span>-->
	       <!--       	<span class="info-box-number">-->
	       <!--       		<?php echo count($widow_aged_welfare_count); ?>-->
	       <!--       	</span>-->
	       <!--       	<div class="progress">-->
	       <!--         	<div class="progress-bar" style="width: 45%"></div>-->
	       <!--       	</div>-->
	       <!--       	<span class="progress-description">View More </span>-->
        <!--	</div>-->
        <!--  </div>-->
        <!--</div>-->
		 <!--<div class="col-xl-4 col-md-6 col-12">-->
   <!--       <div class="info-box bg-b-purple18">-->
   <!--         <span class="info-box-icon push-bottom">-->
   <!--         	<i class="fa fa-tasks new-dash"></i></span>-->
	  <!--          <div class="info-box-content">-->
            	<?php 
    //                 $school_dropouts_interest_in_emp = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE school_dropouts_interest_in_emp!='' $query ORDER BY survey_id DESC");
				// 	$school_dropouts_interest_in_emp->execute();
				// 	$school_dropouts_interest_in_emp_count = $school_dropouts_interest_in_emp->fetchAll();  
					?>
	       <!--       	<span class="info-box-text">School Dropouts Interested in Employment</span>-->
	       <!--       	<span class="info-box-number">-->
	       <!--       		<?php echo count($widow_aged_welfare_count); ?>-->
	       <!--       	</span>-->
	       <!--       	<div class="progress">-->
	       <!--         	<div class="progress-bar" style="width: 45%"></div>-->
	       <!--       	</div>-->
	       <!--       	<span class="progress-description">View More </span>-->
        <!--	</div>-->
        <!--  </div>-->
        <!--</div>-->
        
        <div class="col-xl-4 col-md-6 col-12">
          <div class="info-box bg-b-purple1">
              <a  href="index.php?file=food_needed_report/list&dash_country_id=<?php echo $country_id; ?>&dash_state_id=<?php echo $state_id; ?>&dash_district_id=<?php echo $district_id; ?>&dash_city_id=<?php echo $city_id; ?>&dash_area_id=<?php echo $area_id; ?>">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-plus-square new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
            	$food_needed = $pdo_conn->prepare("SELECT * FROM food_needed WHERE food_needed_id!='' $query  ORDER BY food_needed_id DESC");
					$food_needed->execute();
					$food_needed_count = $food_needed->fetchall();
				  ?>
	              	<span class="info-box-text">Food</span>
	              	<span class="info-box-number">
	              		<?php echo count($food_needed_count); ?>
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
          <div class="info-box bg-b-purple5">
              <a  href="index.php?file=medical_report/list&dash_country_id=<?php echo $country_id; ?>&dash_state_id=<?php echo $state_id; ?>&dash_district_id=<?php echo $district_id; ?>&dash_city_id=<?php echo $city_id; ?>&dash_area_id=<?php echo $area_id; ?>">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-id-card new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
            	$medical_help = $pdo_conn->prepare("SELECT * FROM medical_help WHERE medical_help_id!='' $query  ORDER BY medical_help_id DESC");
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
          <div class="info-box bg-b-purple6">
              <a  href="index.php?file=jobapplication_report/list&dash_country_id=<?php echo $country_id; ?>&dash_state_id=<?php echo $state_id; ?>&dash_district_id=<?php echo $district_id; ?>&dash_city_id=<?php echo $city_id; ?>&dash_area_id=<?php echo $area_id; ?>">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-close new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
            	 $job_application= $pdo_conn->prepare("SELECT * FROM job_application WHERE job_id!='' $query ORDER BY job_id DESC");
						$job_application->execute();
						$job_application_count = $job_application->fetchAll(); 
				  ?>
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
          <div class="info-box bg-b-purple9">
              <a  href="index.php?file=matrimonial_report/list&dash_country_id=<?php echo $country_id; ?>&dash_state_id=<?php echo $state_id; ?>&dash_district_id=<?php echo $district_id; ?>&dash_city_id=<?php echo $city_id; ?>&dash_area_id=<?php echo $area_id; ?>">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-thumbs-up new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
            	$matrimonial_information = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE matrimonial_id!='' $query ORDER BY matrimonial_id DESC");
						$matrimonial_information->execute();
						$matrimonial_count = $matrimonial_information->fetchAll();
				  ?>
	              	<span class="info-box-text">Matrimonial</span>
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
        
        <div class="col-xl-4 col-md-6 col-12">
          <div class="info-box bg-b-purple15">
              <a  href="index.php?file=join_form/list&dash_country_id=<?php echo $country_id; ?>&dash_state_id=<?php echo $state_id; ?>&dash_district_id=<?php echo $district_id; ?>&dash_city_id=<?php echo $city_id; ?>&dash_area_id=<?php echo $area_id; ?>">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-graduation-cap new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
            	$join_masjith = $pdo_conn->prepare("SELECT * FROM join_masjith WHERE join_id!='' $query ORDER BY join_id DESC");
					$join_masjith->execute();
					$join_masjith_count = $join_masjith->fetchAll();
				  ?>
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
              <a  href="index.php?file=admission_card_report/list&dash_country_id=<?php echo $country_id; ?>&dash_state_id=<?php echo $state_id; ?>&dash_district_id=<?php echo $district_id; ?>&dash_city_id=<?php echo $city_id; ?>&dash_area_id=<?php echo $area_id; ?>">
            <span class="info-box-icon push-bottom">
            	<i class="fa fa-graduation-cap new-dash"></i></span>
	            <div class="info-box-content">
            	<?php 
            	$admission_card = $pdo_conn->prepare("SELECT * FROM admission_card WHERE admission_card_id!='' $query ORDER BY admission_card_id DESC");
					$admission_card->execute();
					$admission_card_count = $admission_card->fetchAll();
				  ?>
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