<?php
$current_date=date('Y-m-d');

$user_country_id =   $_SESSION['country_id'];
$user_state_id =   $_SESSION['state_id'];
$user_district_id =   $_SESSION['district_id'];
$user_city_id =   $_SESSION['city_id'];
$user_area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];

if($user_type=='1')
{
	$country_query  =   '';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='2')
{
	$country_query  =   '  and country_id="'.$user_country_id.'"';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='3')
{
	$country_query  =   '  and country_id="'.$user_country_id.'"';
	$state_query    =   ' and country_id="'.$user_country_id.'"  and state_id="'.$user_state_id.'"';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='4')
{
	$country_query  =   '  and country_id="'.$user_country_id.'"';
	$state_query    =   ' and country_id="'.$user_country_id.'"  and state_id="'.$user_state_id.'"';
	$district_query =   ' and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'"';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='5')
{ 
    $country_query  =   '  and country_id="'.$user_country_id.'"';
	$state_query    =   ' and country_id="'.$user_country_id.'"  and state_id="'.$user_state_id.'"';
	$district_query =   ' and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'"';
	$city_query =   ' and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'"';
	$area_query =   '';
}
else if ($user_type=='6') {
	$country_query  =   '  and country_id="'.$user_country_id.'"';
	$state_query    =   ' and country_id="'.$user_country_id.'"  and state_id="'.$user_state_id.'"';
	$district_query =   ' and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'"';
	$city_query =   ' and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'"';
	$area_query =   ' and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'" and area_id="'.$user_area_id.'"';
}



$wanted=$_GET['wanted'];
$status=$_GET['status'];
$blood_group=$_GET['blood_group'];

$country_id=$_GET['country_id'];
$area_id=$_GET['area_id'];
$city_id=$_GET['city_id'];
$state_id=$_GET['state_id'];
$district_id=$_GET['district_id'];


$query='';
if($wanted=='maqtab_child' || $wanted=='maqtab_adult' || $wanted=='allin_hifz_course' || $wanted=='blood_group'){
    if($user_type=='1')
    {
    	$user_type_query='';	 
    }
    else if($user_type=='2')
    {
    	$user_type_query='  and ffs.country_id="'.$user_country_id.'"';	 
    }
    else if($user_type=='3')
    {
    	$user_type_query='  and ffs.country_id="'.$user_country_id.'"  and ffs.state_id="'.$user_state_id.'" ';
    }
    else if($user_type=='4')
    {
    	$user_type_query='  and ffs.country_id="'.$user_country_id.'" and ffs.state_id="'.$user_state_id.'" and ffs.district_id="'.$user_district_id.'"';
    }
    else if($user_type=='5')
    {
        $user_type_query='  and ffs.country_id="'.$user_country_id.'" and ffs.state_id="'.$user_state_id.'" and ffs.district_id="'.$user_district_id.'" and ffs.city_id="'.$user_city_id.'"';	  
    }
    else if ($user_type=='6') {
    	$user_type_query='  and ffs.country_id="'.$user_country_id.'" and ffs.state_id="'.$user_state_id.'" and ffs.district_id="'.$user_district_id.'" and ffs.city_id="'.$user_city_id.'" and ffs.area_id="'.$user_area_id.'"';
    }
}else{
    if($user_type=='1')
    {
    	$user_type_query='';	 
    }
    else if($user_type=='2')
    {
    	$user_type_query='  and country_id="'.$user_country_id.'"';	 
    }
    else if($user_type=='3')
    {
    	$user_type_query='  and country_id="'.$user_country_id.'"  and state_id="'.$user_state_id.'" ';
    }
    else if($user_type=='4')
    {
    	$user_type_query='  and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'"';
    }
    else if($user_type=='5')
    {
        $user_type_query='  and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'"';	  
    }
    else if ($user_type=='6') {
    	$user_type_query='  and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'" and area_id="'.$user_area_id.'"';
    }
}

if($wanted=='Own')
{
	$query='   and house like "%Own House%"';
}
else if($wanted=='Rent')
{
	$query='   and house like "%Rented%"';
}
else if($wanted=='Bathroom')
{
	$query='   and bathroom_availability like "%No%"';
}
else if($wanted=='Economic')
{
    if($status==''){
	    $query='   and economic_status!=""';
    }else if($status=='A'){
	    $query='   and economic_status="A"';
    }else if($status=='B'){
	    $query='   and economic_status="B"';
    }else if($status=='C'){
	    $query='   and economic_status="C"';
    }else if($status=='D'){
	    $query='   and economic_status="D"';
    }else if($status=='E'){
	    $query='   and economic_status="E"';
    }
}
// else if($wanted=='Disability')
// {
// 	$query='   and disability_pension!=""';
// }
// else if($wanted=='Widow')
// {
// 	$query='   and widow_aged_welfare!=""';
// }
// else if($wanted=='Orphan')
// {
// 	$query='   and destitute_orphan_welfare!=""';
// }
// old_age_pension
else if($wanted=='gov_help')
{
	$query='   and (disability_pension!="" or widow_aged_welfare!="" or destitute_orphan_welfare!="" or old_age_pension!="" )';
}
else if($wanted=='Food')
{
	$query='   and incapable_of_working!=""';
}
else if($wanted=='Job')
{ 
	$query='   and guide_for_emp!=""';
}

else if($wanted=='Medical' || $wanted=='medicine')
{
	$query='   and disease_details!=""';
}

else if($wanted=='Marriage')
{
	$query='   and marriage_help!=""';
}

else if($wanted=='MSK')
{
	$query='   and interest_to_serve_msk!=""';
}
else if($wanted=='maqtab_child')
{
	$query='   and ffs.child_interest like "%Yes%" and ffs.age BETWEEN 4 and 15';
}
else if($wanted=='maqtab_adult')
{
	$query='   and ffs.maqtab_interest like "%Yes%" and ffs.age > 15';
}
else if($wanted=='allin_hifz_course')
{
	$query='   and ffs.allin_hifz_course like "%Yes%"';
}
else if($wanted=='higher_edu_guide')
{
	$query='   and (higher_edu_guide RLIKE "([a-z]+)" or fin_support_for_edu RLIKE "([a-z]+)" or pre_matric_scholarship RLIKE "([a-z]+)" or post_matric_scholarship RLIKE "([a-z]+)" )';
}
else if($wanted=='small_scale')
{
	$query='   and (entrepreneur_counselling RLIKE "([a-z]+)" or business_counselling RLIKE "([a-z]+)" or guide_for_skill_develop RLIKE "([a-z]+)")';
}
else if($wanted=='rehabilitation_counselling')
{
	$query='   and rehabilitation_counselling != ""';
}else if($wanted=='suffer_from_interest_loan')
{
	$query='   and suffer_from_interest_loan != ""';
}
else if($wanted=='school_dropouts_interest_in_emp')
{
	$query='   and school_dropouts_interest_in_emp != ""';
}
else if($wanted=='family_counselling')
{
	$query='   and family_counselling RLIKE "([a-z]+)"';
}
else if($wanted=='blood_group')
{
    if($blood_group==''){
	    $query='   and ffs.blood_group!="" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='1'){
	    $query='   and ffs.blood_group="1" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='2'){
	    $query='   and ffs.blood_group="2" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='3'){
	    $query='   and ffs.blood_group="3" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='4'){
	    $query='   and ffs.blood_group="4" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='5'){
	    $query='   and ffs.blood_group="5" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='6'){
	    $query='   and ffs.blood_group="6" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='7'){
	    $query='   and ffs.blood_group="7" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='8'){
	    $query='   and ffs.blood_group="8" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }else if($blood_group=='9'){
	    $query='   and ffs.blood_group="9" and ffs.blood_group not like "%Local%" and ffs.blood_group not like "%undefined%"';
    }
}
else
{
	$query='   and guide_for_emp!=""';
}	
 
 
if($wanted=='maqtab_child' || $wanted=='maqtab_adult' || $wanted=='allin_hifz_course' || $wanted=='blood_group'){
    if($country_id!='')
    {
    	$query.='   and ffs.country_id="'.$country_id.'"';
    }
    
    if($state_id!='')
    {
    	$query.='   and ffs.state_id="'.$state_id.'"';
    }
    
    if($district_id!='')
    {
    	$query.='   and ffs.district_id="'.$district_id.'"';
    }
    
    if($city_id!='')
    {
    	$query.='   and ffs.city_id="'.$city_id.'"';
    }
    
    
    if($area_id!='')
    {
    	$query.='   and ffs.area_id="'.$area_id.'"';
    }
} else {
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
}
 
 
 function val_of_family_name($exp_val)
    {
        $i=1;
	global $pdo_conn;
        $get_val=explode(",",$exp_val);
        $get_count=count($get_val);
        foreach($get_val as  $val_get)
        {
             if($i==$get_count) {$val_con="";  } else {$val_con=","; }
            //echo "SELECT * From fact_finding_subform  where id='".$val_get."'";
             $findrelationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where id='".$val_get."'");
                    $findrelationship->execute();
                    
                    $fetrelationship_list = $findrelationship->fetch();
                    $get_val_name.=$fetrelationship_list['family_head_name'].$val_con;
$i++;
        }
      //return   'ss';
      return   $get_val_name;
         
}		
 ?>
<script language="javascript" type="text/javascript" src="survey_report/survey_report.js"></script>
    
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	  <h1>
        <div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Survey Report</span><br><span class="welcom inline-welcome">Report // Survey Report </span></div>
      </h1>	  
    </section>
 
    <!-- Main content -->
 <section class="content">
	<div class="row">

		<div class="col-12">
 
			<div class="box">
				<div class="row" style="padding: 0px 32px; margin-bottom: 32px;">
    

    	<div  class="col-lg-5">
    		<h5 class="list-content">Wanted</h5>
    		<select class="form_control select2" id="wanted" name="wanted" onchange="get_economic_status(wanted.value); get_blood_group(wanted.value);">
    		    <option value="Food" <?php if($wanted=='Food'){?> selected <?php } ?>>1. People who needs food kit</option>
    		    <option value="Medical" <?php if($wanted=='Medical'){?> selected <?php } ?>>2. Medical (surgery)</option>
    		    <option value="medicine" <?php if($wanted=='medicine'){?> selected <?php } ?>>3. Medicine Tablet (Monthly Expenses)</option>
    		    <option value="Marriage" <?php if($wanted=='Marriage'){?> selected <?php } ?>>4. Marriage Help / Nikah Information</option>
    		    <option value="maqtab_child" <?php if($wanted=='maqtab_child'){?> selected <?php } ?>>5. Boys / Girls interested to join maqtab madrasa (4-15 Age)</option>
    		    <option value="allin_hifz_course" <?php if($wanted=='allin_hifz_course'){?> selected <?php } ?>>6. People who are interested to become Aalim / Aalima</option>
    		    <option value="maqtab_adult" <?php if($wanted=='maqtab_adult'){?> selected <?php } ?>>7. People interested to join maktab madarasa (Adults)</option>
    		    <option value="Job" <?php if(($wanted=='Job')||($wanted=='')){?> selected <?php } ?>>8. People who need employment</option>
    		    <option value="higher_edu_guide" <?php if(($wanted=='higher_edu_guide')){?> selected <?php } ?>>9. Guidance for higher Education / Scholarship</option>
    		    <option value="gov_help" <?php if($wanted=='gov_help'){?> selected <?php } ?>>10. People who need Government Help</option>
    		    <option value="small_scale" <?php if($wanted=='small_scale'){?> selected <?php } ?>>12. Small Scale Industrial Training and Guidance</option>
    		    <option value="Bathroom" <?php if($wanted=='Bathroom'){?> selected <?php } ?>>13. People who need toilet facility</option>
    		    <option value="rehabilitation_counselling" <?php if($wanted=='rehabilitation_counselling'){?> selected <?php } ?>>14. Rehabilitation for alcohol addict</option>
    		    <option value="suffer_from_interest_loan" <?php if($wanted=='suffer_from_interest_loan'){?> selected <?php } ?>>15. People affected by Loan with Interest</option>
    		    <option value="school_dropouts_interest_in_emp" <?php if($wanted=='school_dropouts_interest_in_emp'){?> selected <?php } ?>>16. School Drop Out</option>
    		    <option value="family_counselling" <?php if($wanted=='family_counselling'){?> selected <?php } ?>>17. Other Information</option>
    		    <option value="Own" <?php if($wanted=='Own'){?> selected <?php } ?>>18. Own House</option>
    		    <option value="Rent" <?php if($wanted=='Rent'){?> selected <?php } ?>>19. Rented House</option>
    		    <option value="Economic" <?php if($wanted=='Economic'){?> selected <?php } ?>>20. Families Economic Status</option>
    		    <option value="MSK" <?php if($wanted=='MSK'){?> selected <?php } ?>>21. MSk Membership Join</option>
    		    <option value="blood_group" <?php if($wanted=='blood_group'){?> selected <?php } ?>>22. Blood Group</option>
    		    <!--<option value="Disability" <?php if($wanted=='Disability'){?> selected <?php } ?>>Disability Pension</option>-->
    		    <!--<option value="Widow" <?php if($wanted=='Widow'){?> selected <?php } ?>>Widow / Aged Unmarried Welfare</option>-->
    		    <!--<option value="Orphan" <?php if($wanted=='Orphan'){?> selected <?php } ?>>Destitute / Orphan Welfare</option>-->
    		    
    			
    			
    			
    			
    		</select>
    	</div>
    	<?php if($wanted=='Economic'){?>
    	<div class="col-lg-3" id="economic_status_div" >
    	    	<?php } 
    	    	else {
    	    	   
    	    	?>
    	    	<div class="col-lg-3" id="economic_status_div" style="Display:None">
    <?php } ?>
    	    <h5 class="list-content">Economic Status</h5>
    	    <select class="form_control select2" id="economic_status" name="economic_status">
    	        <option value="" <?php if($status==''){?> selected <?php } ?>>Select</option>
    	        <option value="A" <?php if($status=='A'){?> selected <?php } ?>>A</option>
    	        <option value="B" <?php if($status=='B'){?> selected <?php } ?>>B</option>
    	        <option value="C" <?php if($status=='C'){?> selected <?php } ?>>C</option>
    	        <option value="D" <?php if($status=='D'){?> selected <?php } ?>>D</option>
    	        <option value="E" <?php if($status=='E'){?> selected <?php } ?>>E</option>
    	    </select>
    	</div>
    
<?php if($wanted=='blood_group'){?>
    	<div class="col-lg-3" id="blood_group_div" >
    	    	<?php } 
    	    	else {
    	    	   
    	    	?>

<div class="col-lg-3" id="blood_group_div" style="Display:None">
<?php } ?>

    	    <h5 class="list-content">Blood Group</h5>
    	    <select class="form_control select2" id="blood_group" name="blood_group">
    	        <option value="" <?php if($blood_group==''){?> selected <?php } ?>>Select</option>
    	        <?php 
                    $blood_grp = $pdo_conn->prepare("SELECT * FROM blood_group");
                    $blood_grp->execute();
                    $blood_grp_list = $blood_grp->fetchall();
                    foreach($blood_grp_list as $blood){?>
                      <option value="<?php echo $blood['blood_id']?>" <?php if($blood['blood_id']==$blood_group) {echo "Selected";}?>><?php echo $blood['blood_group_name']?></option>
                    <?php } ?>
    	    </select>
    	</div>
</div>
<form>

				<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
     

    	<div  class="col-md-2">
    		<h5 class="list-content">Country</h5>
    		 
    	 
					<select name="country_id" id="country_id" required class="form-control select2 item_name" onchange="get_state_list(country_id.value);">
						<option value="">Select Country</option>
							<?php 
							$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1' $country_query");
							$prepare->execute();
							$country_list = $prepare->fetchall();
							foreach($country_list as $value) { ?>
								<option value="<?php echo $value['country_id']?>" <?php if($country_id==$value['country_id']){ ?>selected<?php } ?> ><?php echo $value['country_name']?></option>
							<?php } ?>
					</select>
		 
    	</div>
    	 
    	<div  class="col-md-2">
    		<h5 class="list-content">State</h5>
    		<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district_list(country_id.value,state_id.value)">
						<option value="">Select State</option>
							<?php 
							$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1' ");
							$state->execute();
							$state_list = $state->fetchall();
							foreach($state_list as $value) { 
							?>
								<option value="<?php echo $value['state_id']?>"<?php if($value['state_id']==$state_id){echo "selected";}?>><?php echo $value['state_name']?></option>
							<?php } ?>
					</select>
    	</div>

    	<div  class="col-md-2">
    		<h5 class="list-content">District</h5>
    		<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
						<option value="">Select District</option>
							<?php 
							$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1' ");
							$district->execute();
							$district_list = $district->fetchall();
							foreach($district_list as $value) { 
							?>
								<option value="<?php echo $value['district_id']?>" <?php if($value['district_id']==$district_id){echo "selected";}?>><?php echo $value['district_name']?></option>
							<?php } ?>
					</select>
    	</div>

    	<div  class="col-md-2">
    		<h5 class="list-content">City</h5>
    		<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
				<option value="">Select City</option>
					<?php 
					$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' ");
					$city->execute();
					$city_list = $city->fetchall();
					foreach($city_list as $value) { 
					?>
						<option value="<?php echo $value['city_id']?>" <?php if($value['city_id']==$city_id){echo "selected";}?>><?php echo $value['city_name']?></option>
					<?php } ?>
			</select>
    	</div><!--
<div class="modal fade" id="quotation_view">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			               <!-- <div class="modal-header">
			                  <h3 class="modal-title">Area Wise Survey View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <!-- Modal body -->
			               <!-- <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>
			                <!-- Modal footer -->
			               <!-- <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> -->
    	<div  class="col-md-2">
    		<h5 class="list-content">Area</h5>
    		<select name="area_id" id="area_id" required class="form-control select2 item_name"  >
				<option value="">Select Area</option>
					<?php 
					$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' ");
					$area->execute();
					$area_list = $area->fetchall();
					foreach($area_list as $value) { 
					?>
						<option value="<?php echo $value['area_id']?>" <?php if($value['area_id']==$area_id){echo "selected";}?>><?php echo $value['area_name']?></option>
					<?php } ?>
			</select>
    	</div>

    	<div  class="col-md-2">
		<div class="go-btn ">
    		 <a onclick="get_survey_filter_list(wanted.value,country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
    	</div>
    	
		</div>
     
</div>
 		</form>

<table border="0" cellspacing="0" width="90%">
	<tr>
		
		<td width="10%" align="center">
            <a onclick="javascript:survey_overall_print()" style="float:right"><img  align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
		</td>
	</tr>
</table>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">               
						<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100">
							<thead>
<?php if(($wanted!="Medical")&&($wanted!="medicine"))
{?>
								<tr>
									<th>#</th>
									<th>Family No</th>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>Country Name</th>
									<th>State Name</th>
									<th>District Name</th>
									<th>City Name</th>
 									<th>Area Name</th>
									<th>Action</th>	
									</tr>
<?php } else {?>
                                	<tr>
									<th>#</th>
									<th>Family No</th>
									<?php 
									if($wanted=="Medical"){
									?>
									<th>Name(Surgery)</th>
									<th>Surgery Details</th>
									
									<?php } 
									else if($wanted=="medicine"){
									?> 
									<th>Name(Mon Exp)</th>
									<th>Disease Details</th>
									<th>Mon Exp on Medicine</th>
									
									<?php } ?>
									<th>Country Name</th>
									<th>State Name</th>
									<th>District Name</th>
									<th>City Name</th>
 									<th>Area Name</th>
 									<th>Action</th>	

									</tr>
<?php } ?>
							
							</thead>
							<tbody id="survey_report_list">						
<?php


if(($wanted!="Medical")&&($wanted!="medicine"))
{

  
								$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query $user_type_query ORDER BY survey_id DESC");
								
							if($wanted=='maqtab_child' || $wanted=='maqtab_adult' || $wanted=='allin_hifz_course' || $wanted=='blood_group'){
							    
							    $survey = $pdo_conn->prepare("SELECT * FROM  fact_finding_subform AS ffs INNER JOIN fact_finding_form AS fff ON ffs.random_no = fff.unique_no WHERE ffs.id!='' $query $user_type_query ORDER BY ffs.id DESC");
							}	
					
								$survey->execute();
								$survey_list = $survey->fetchall();
								$count = $survey->rowCount();
	
								foreach($survey_list as $value)
							 	{ 
							 	    
									if($wanted=='MSK')
									{
										
										    if($value['interest_to_serve_msk_no']!="")	{	
											    $name=$value['interest_to_serve_msk_no'];
												
											}											
											else{
												$survey2_sub_det=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$value['unique_no']."'  ");
												$survey2_sub_det->execute();
												$fet_sub_det=$survey2_sub_det->fetch();
											    $name=$fet_sub_det['family_head_name'];
											}
											
												
										
									}
									else if(($wanted=='Own')||($wanted=='Rent')||($wanted=='Bathroom')||($wanted=='gov_help')||($wanted=='Economic'))
									{
											$survey2_sub_det=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$value['unique_no']."'  ");
											$survey2_sub_det->execute();
											$fet_sub_det=$survey2_sub_det->fetch();
											$name=$fet_sub_det['family_head_name'];
									}
									
									
									else if($wanted=='Job')
									{
										$name=$value['guide_for_emp'];
									}
									else if($wanted=='Medical'||$wanted=='medicine')
									{
										$name=$value['disease_no'];
										
									}
									else if($wanted=='Marriage')
									{
										$name=$value['marriage_help'];
									}
									//else if($wanted=='Own' || $wanted=='Rent')
									//{
									//	$name=$value['information_provided_by'];
									//}
									//else if($wanted=='Economic')
									//{
									//	$name=$value['information_provided_by'];
									//}
									else if($wanted=='Disability')
									{
										$name=$value['information_provided_by'];
									}
									else if($wanted=='Widow')
									{
										$name=$value['information_provided_by'];
									}
									else if($wanted=='Orphan')
									{
										$name=$value['information_provided_by'];
									}
									else if($wanted=='maqtab_child' || $wanted=='maqtab_adult' || $wanted=='allin_hifz_course')
									{
										$name=$value['family_head_name'];
									}
									else if($wanted=='higher_edu_guide')
									{
									    $name="";
										if(trim($value['higher_edu_guide'])!=''){
											$name=trim($value['higher_edu_guide']);
										}
										if(trim($value['fin_support_for_edu'])!=''){
											$name.=','.trim($value['fin_support_for_edu']);
										}
										if(trim($value['pre_matric_scholarship'])!=''){
											$name.=','.trim($value['pre_matric_scholarship']);
										}
										if(trim($value['post_matric_scholarship'])!=''){
											$name.=','.trim($value['post_matric_scholarship']);
										}
										$name =ltrim($name,",");
										
								   
								// $namee = explode(',',$names);
									}
									else if($wanted=='small_scale')
									{
										
										$namees="";
									    $names = trim($value['business_counselling']).', '.trim($value['entrepreneur_counselling']).', '.trim($value['guide_for_skill_develop']);
									    $nam = explode(', ', $names);
									    
									    foreach($nam as $na){
									        if($na!=''){
									       $namees .= $na. ', ';
									        }
									    }
									    $name = rtrim($namees,', ');
									}
                                    else if($wanted=='rehabilitation_counselling')
									{
										$name=$value['rehabilitation_counselling'];
									}
									else if($wanted=='suffer_from_interest_loan')
									{
										$name=$value['suffer_from_interest_loan'];
									}
									else if($wanted=='school_dropouts_interest_in_emp')
									{
										$name=$value['school_dropouts_interest_in_emp'];
									}
									else if($wanted=='family_counselling')
									{
										$name=$value['family_counselling'];
									}
									else if($wanted=='blood_group')
									{
										$name=$value['family_head_name'];
									}

									else{
									$name=$value['guide_for_emp'];
									}
								?>
							<?php
				// 			foreach($namee as $name){
							    ?>
							    <tr>
							        
									<td align="center"><?php echo $roll_id;?></td>
									<td align="center"><?php echo $value['family_no']?></td>
									<td align="center"><?php if($name=='Select'){echo '-';}else{echo $name; }?></td>
									<td align="center"><?php echo $value['contact_no']; ?></td>
									<td align="center"><?php echo get_country_name($value['country_id']);	?>	</td>
									<td align="center"><?php echo get_state_name($value['state_id']); ?></td>
									<td align="center"><?php echo get_district_name($value['district_id']); ?></td>
									<td align="center"><?php echo get_city_name($value['city_id']); ?></td> 
									<td align="center"><?php echo get_area_name($value['area_id']) ?></td>
									
								    <td> 
							  			<a href="#" title="View" id="quotation_view_modal" onclick="survey_view('<?php echo $value['survey_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  

							  			<!--  <a href="#" title="View" id="quotation_view_modal" onclick="survey_view('survey_report/view.php','<?php echo $value['survey_id'];?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
							  		</td>
								</tr>
								<?php
				// 			}
							?>
								
								<?php 
									$roll_id+=1;
								} 
							 }else { 
							     
							     if($user_type=='1')
{
	$user_type_area_query='';
}
else if($user_type=='2')
{
	$user_type_area_query='  and a.country_id="'.$user_country_id.'"';
}
else if($user_type=='3')
{
	$user_type_area_query='  and a.country_id="'.$user_country_id.'"  and a.state_id="'.$user_state_id.'" ';
}
else if($user_type=='4')
{
	$user_type_area_query='  and a.country_id="'.$user_country_id.'" and a.state_id="'.$user_state_id.'" and a.district_id="'.$user_district_id.'"';
}
else if($user_type=='5')
{
    $user_type_area_query='  and a.country_id="'.$user_country_id.'" and a.state_id="'.$user_state_id.'" and a.district_id="'.$user_district_id.'" and a.city_id="'.$user_city_id.'"';	  
}
else if ($user_type=='6') {
	$user_type_area_query='  and a.country_id="'.$user_country_id.'" and a.state_id="'.$user_state_id.'" and a.district_id="'.$user_district_id.'" and a.city_id="'.$user_city_id.'" and a.area_id="'.$user_area_id.'"';
}
    
                                if($country_id!='')
                                {
                                	$area_queryy.='   and a.country_id="'.$country_id.'"';
                                }
                                
                                if($state_id!='')
                                {
                                	$area_queryy.='   and a.state_id="'.$state_id.'"';
                                }
                                
                                if($district_id!='')
                                {
                                	$area_queryy.='   and a.district_id="'.$district_id.'"';
                                }
                                
                                if($city_id!='')
                                {
                                	$area_queryy.='   and a.city_id="'.$city_id.'"';
                                }
                                
                                
                                if($area_id!='')
                                {
                                	$area_queryy.='   and a.area_id="'.$area_id.'"';
                                }
                                
                                if($wanted=='Medical'){
							 	$res_medical = $pdo_conn->prepare("SELECT DISTINCT a.country_id,a.district_id,a.state_id,a.city_id,a.area_id,a.survey_id,a.unique_no,a.family_no,b.disease_details,b.surgery_details,b.surgery_details_no,b.mon_exp_on_medicine,b.mon_exp_on_medicine_no,a.contact_no FROM  fact_family_disease b left join fact_finding_form a ON a.unique_no=b.unique_no  WHERE  b.delete_status!='1' and a.user_id!='0' and a.delete_status!='1' and b.surgery_details_no !='' $area_queryy $user_type_area_query ORDER BY a.survey_id DESC");
                                }else if($wanted=='medicine'){
                                    $res_medical = $pdo_conn->prepare("SELECT DISTINCT a.country_id,a.district_id,a.state_id,a.city_id,a.area_id,a.survey_id,a.unique_no,a.family_no,b.disease_details,b.surgery_details,b.surgery_details_no,b.mon_exp_on_medicine,b.mon_exp_on_medicine_no,a.contact_no FROM  fact_family_disease b left join fact_finding_form a ON a.unique_no=b.unique_no WHERE  b.delete_status!='1' and a.user_id!='0' and a.delete_status!='1' AND b.disease_details!='' and b.mon_exp_on_medicine!='' $area_queryy $user_type_area_query ORDER BY a.survey_id DESC");
                                }
						
								$res_medical->execute();
								$fet_list_medical = $res_medical->fetchall();
		
								foreach($fet_list_medical as $get_value)
							 	{ 
								$get_survey_id=survye_id_from_unique_no($get_value[unique_no]);
								
				           	   
                                  

								?>
							
							    <tr>
									<td align="center"><?php echo $roll_id;?></td>
									 <td align="center" class="style2 right">&nbsp;<?php echo $get_value['family_no'];?></td>
									
									<?php 
									if($wanted=="Medical"){
									?>
									<td align="center"><?php echo val_of_family_name($get_value['surgery_details_no']); ?></td>
									<td align="center"><?php echo $get_value['surgery_details']; ?></td>
									
									<?php 
									}
									else if($wanted=="medicine"){
									?>
									<td align="center"><?php echo val_of_family_name($get_value['mon_exp_on_medicine_no']); ?></td>
									<td align="center"><?php echo $get_value['disease_details']?></td>
									<td align="center"><?php echo $get_value['mon_exp_on_medicine'];?>	</td>
									
									<?php } ?>
									<td align="center"><?php echo get_country_name($get_value['country_id']);	?>	</td>
									<td align="center"><?php echo get_state_name($get_value['state_id']); ?></td>
									<td align="center"><?php echo get_district_name($get_value['district_id']); ?></td>
									<td align="center"><?php echo get_city_name($get_value['city_id']); ?></td> 
									<td align="center"><?php echo get_area_name($get_value['area_id']) ?></td>
									
								    <td> 
							  			<a href="#" title="View" id="quotation_view_modal" onclick="survey_view('<?php echo $get_survey_id ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  

							  			<!--  <a href="#" title="View" id="quotation_view_modal" onclick="survey_view('survey_report/view.php','<?php echo $value['survey_id'];?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
							  		</td>
								</tr>
								
								<?php 
									$roll_id+=1;
							 
							 	}
							  } ?>

								
							</tbody>				  
			
						</table>


					<!--	<div class="modal fade" id="quotation_view" width="1000">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			               <!-- <div class="modal-header">
			                  <h3 class="modal-title">Survey View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>-->
			                <!-- Modal body -->
			               <!-- <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>-->
			                <!-- Modal footer -->
			          <!--      <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> 
					</div>              
				</div>-->
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
		<!-- /.content -->
<script type="text/javascript">
	

function get_survey_filter_list(wanted,country_id,state_id,district_id,city_id,area_id) 
{
  
    var status = $("#economic_status").val();
    if(wanted!='Economic'){
	    status='';
	}
	
	var blood_group = $("#blood_group").val();
	if(wanted!='blood_group'){
	    blood_group = '';
	}

	window.location.href="index.php?file=survey_report/list&wanted="+wanted+"&status="+status+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&blood_group="+blood_group;
	

	/*jQuery.ajax({
	type: "POST",
	url: "survey_report/survey_list.php",
	data: "wanted="+wanted,
	success: function(msg)
	{ 
		//alert(msg);
		
	  $("#survey_report_list").html(msg);
	}
	});*/
	
	
}
/*function survey_view(url, survey_id)
{
	window.open(url+'?survey_id='+survey_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
}*/
/*function customer_view_modal(url, customer_id)
{
	window.open(url+'?customer_id='+customer_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
}*/
function survey_view(survey_id)
{ 
	jQuery.ajax({
	type: "POST",
	url: "survey_report/view.php",
	data: "survey_id="+survey_id,
	success: function(msg)
	{ 
		//alert(msg);
		//window.open.href="index.php?file=survey_report/view";
window.open('survey_report/view.php?survey_id='+survey_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	 // $("#quotation_view_modal_body").html(msg);
	}
	});
}	
function survey_overall_print()
{
var wanted_data=$("#wanted option:selected").val();
var status = $("#economic_status").val();
var blood_group = $("#blood_group").val();

var country_id = $("#country_id").val();
var area_id = $("#area_id").val();
var city_id = $("#city_id").val();
var state_id = $("#state_id").val();
var district_id = $("#district_id").val();


jQuery.ajax({
	type: "POST",
	url: "survey_report/survey_overall_print.php",
	data: "wanted_data="+wanted_data+"&status="+status+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&blood_group="+blood_group,
	success: function(msg)
	{ 
	    if(wanted_data=="Medical"||wanted_data=='medicine')
	    {
		window.open('survey_report/survey_medical_print.php?wanted_data='+wanted_data+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	    }
	    else
	    {
	   	window.open('survey_report/survey_overall_print.php?wanted_data='+wanted_data+'&status='+status+"&country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id+"&blood_group="+blood_group,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
    
	    }

	}
	});

}

function get_economic_status(wanted){
    if(wanted=='Economic'){
        $('#economic_status_div').show();
    }else{
        $('#economic_status_div').hide();
    }
}

function get_blood_group(wanted){
    if(wanted=='blood_group'){
        $('#blood_group_div').show();
    }else{
        $('#blood_group_div').hide();
    }
}


function get_state_list(country_id)
{
    var state_query =   '<?php echo $state_query; ?>';
	format=$("form").serialize()+"&action=state_list"+"&state_query="+state_query;
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
    var district_query =   '<?php echo $district_query; ?>';
	format=$("form").serialize()+"&action=district_list"+"&district_query="+district_query;
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
    var city_query =   '<?php echo $city_query; ?>';
	format=$("form").serialize()+"&action=city_list"+"&city_query="+city_query;
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
    var area_query =   '<?php echo $area_query; ?>';
	format=$("form").serialize()+"&action=area_list"+"&area_query="+area_query;
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

</script>