<?php
include("dbConnect.php");
$current_acc_year='';
$sql ="SELECT * FROM accountyear WHERE active_status = 'active' AND delete_status !='1' ";
$status_accountyear=$pdo_conn->prepare($sql);
$status_accountyear->execute();
$statusaccountyear = $status_accountyear->fetchAll();
if(count($statusaccountyear) == '1'){
	$_SESSION['account_year'] = $statusaccountyear[0]['from_account_year'].'-'.$statusaccountyear[0]['to_account_year'];
	$current_acc_year =  $_SESSION['account_year'];
}
						
$roll_id=1;
 function get_fam_number($unique_no)
{
	global $pdo_conn;
	$sur_id= $pdo_conn->prepare("select family_no from fact_finding_form where unique_no='$unique_no'");
	$sur_id->execute();
	$fet_sur = $sur_id->fetch();
	$get_sur_id=$fet_sur['family_no']; 
	return $get_sur_id;
}
	
		
 function survye_id_from_unique_no($unique_no)
{
	global $pdo_conn;
	$sur_id= $pdo_conn->prepare("select survey_id from fact_finding_form where unique_no='$unique_no'");
	$sur_id->execute();
	$fet_sur = $sur_id->fetch();
	$get_sur_id=$fet_sur['survey_id']; 
	return $get_sur_id;
}
 
 function get_edu_qualificaqtion($qualification_id)
{
	global $pdo_conn;
	$qualification = $pdo_conn->prepare("select qualification_name from qualification where qualification_id='$qualification_id'");
	$qualification->execute();
	$fet_quali = $qualification->fetch();
	$get_qualification_name=$fet_quali['qualification_name']; 
	return $get_qualification_name;
}
 function get_relationship($relationship_id)
{
	global $pdo_conn;
	$relationship = $pdo_conn->prepare("select relationship_name from relationship where relationship_id='$relationship_id'");
	$relationship->execute();
	$fet_rel= $relationship->fetch();
	$get_rel=$fet_rel['relationship_name']; 
	return $get_rel;
}
 function get_blood_group($blood_id)
{
	global $pdo_conn;
	$blood_group= $pdo_conn->prepare("select blood_group_name from blood_group where blood_id='$blood_id'");
	$blood_group->execute();
	$fet_blood= $blood_group->fetch();
	$get_blood=$fet_blood['blood_group_name']; 
	return $get_blood;
}
 
$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1'");
$prepare->execute();
$country_list = $prepare->fetchall();
 
$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1'");
$state->execute();
$state_list = $state->fetchall();

$pdo_userroll = $pdo_conn->prepare("SELECT * FROM userroll ORDER BY userroll_id DESC");
$pdo_userroll->execute();
$pdouserroll = $pdo_userroll->fetchAll();

$pdo_usercreation = $pdo_conn->prepare("SELECT * FROM usercreation ORDER BY user_id DESC");
$pdo_usercreation->execute();
$pdousercreation = $pdo_usercreation->fetchAll();


$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1'");
$district->execute();
$district_list = $district->fetchall();

$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1'");
$city->execute();
$city_list = $city->fetchall();

$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1'");
$area->execute();
$area_list = $area->fetchall();

$relationship = $pdo_conn->prepare("SELECT * FROM relationship WHERE delete_status!='1'");
$relationship->execute();
$relationship_list = $relationship->fetchall();


$language = $pdo_conn->prepare("SELECT * FROM language WHERE delete_status!='1'");
$language->execute();
$language_list = $language->fetchall();


$disease = $pdo_conn->prepare("SELECT * FROM disease WHERE delete_status!='1'");
$disease->execute();
$disease_list = $disease->fetchall();

$qualification = $pdo_conn->prepare("SELECT * FROM qualification WHERE delete_status!='1'");
$qualification->execute();
$qualification_list = $qualification->fetchall();


$registration = $pdo_conn->prepare("SELECT * FROM registration WHERE delete_status!='1'");
$registration->execute();
$registration_list = $registration->fetchall();

function get_user_name($user_id)
{
	global $pdo_conn;
	$country = $pdo_conn->prepare("SELECT username FROM usercreation where user_id='".$user_id."'");
	$country->execute();
	$country_list = $country->fetch();
	return $country_list['username'];
}

function get_user_type($userroll_id)
{
	global $pdo_conn;
	$country = $pdo_conn->prepare("SELECT roll_name FROM userroll where userroll_id='".$userroll_id."'");
	$country->execute();
	$country_list = $country->fetch();
	return $country_list['roll_name'];
}

function get_country_name($country_id)
{
	global $pdo_conn;
	$country = $pdo_conn->prepare("SELECT country_name FROM country where country_id='".$country_id."'");
	$country->execute();
	$country_list = $country->fetch();
	return $country_list['country_name'];
}

function get_state_name($state_id)
{
	global $pdo_conn;
	$state = $pdo_conn->prepare("SELECT state_name FROM  state where 	state_id='".$state_id."'");
	$state->execute();
	$state_list = $state->fetch();
	return $state_list['state_name'];
}

function get_district_name($district_id)
{
	global $pdo_conn;
	$district = $pdo_conn->prepare("SELECT district_name FROM district where 	district_id='".$district_id."'");
	$district->execute();
	$district_list = $district->fetch();
	return $district_list['district_name'];
}

function get_city_name($city_id)
{
	global $pdo_conn;
	$city = $pdo_conn->prepare("SELECT city_name FROM  city where 	city_id='".$city_id."'");
	$city->execute();
	$city_list = $city->fetch();
	return $city_list['city_name'];
}

function get_area_name($area_id)
{
	global $pdo_conn;
	$area = $pdo_conn->prepare("SELECT area_name FROM  area where 	area_id='".$area_id."'");
	$area->execute();
	$area_list = $area->fetch();
	return $area_list['area_name'];
}


if($_POST['action'] == 'district_list'){
	echo "SELECT * FROM district WHERE state_id = $_POST[state_id]  and country_id=$_POST[country_id] and status='1' and delete_status='0' ORDER BY district_id ASC";
	$district_by_state = $pdo_conn->prepare("SELECT * FROM district WHERE state_id = $_POST[state_id]  and country_id=$_POST[country_id] and status='1' and delete_status='0' $_POST[district_query] ORDER BY district_id ASC");

	$district_by_state->execute();
	$districtbystate = $district_by_state->fetchAll();
	
	$state_val = '';
	
	//$state_val .='<select class="form-control select2 item_name" name="district_id" id="district_id" required>
	  $state_val .='<option value="">Select Your District</option>'; 
	foreach($districtbystate as $value){
		$state_val .= '<option value="'.$value['district_id'].'">'.$value['district_name'].'</option>'; 
	}
	//$state_val .='</select>';
	
	echo $state_val;	
}	

if($_POST['action'] == 'state_list'){
	echo "SELECT * FROM state WHERE country_id=$_POST[country_id] and status='1' and delete_status='0' $_POST[state_query] ORDER BY state_id ASC";
	
	$state = $pdo_conn->prepare("SELECT * FROM state WHERE country_id=$_POST[country_id] and status='1' and delete_status='0' $_POST[state_query] ORDER BY state_id ASC");
	$state->execute();
	$state_list = $state->fetchall();
	
	$state_val = '';
	
	//$state_val .='<select class="form-control select2 item_name" name="district_id" id="district_id" required>
	  $state_val .='<option value="">Select Your State</option>'; 
	foreach($state_list as $value){
		$state_val .= '<option value="'.$value['state_id'].'">'.$value['state_name'].'</option>'; 
	}
	//$state_val .='</select>';
	
	echo $state_val;	
}	


if($_POST['action'] == 'city_list'){
	 echo "SELECT * FROM city WHERE district_id=$_POST[district_id] and  state_id = $_POST[state_id] and country_id=$_POST[country_id]     and status='1' and delete_status='0' $_POST[city_query]";
	$city = $pdo_conn->prepare("SELECT * FROM city WHERE district_id=$_POST[district_id] and  state_id = $_POST[state_id] and country_id=$_POST[country_id]     and status='1' and delete_status='0' $_POST[city_query]");
	$city->execute();
	$city_list = $city->fetchall();
	
	$state_val = '';
	
	//$state_val .='<select class="form-control select2 item_name" name="district_id" id="district_id" required>
	  $state_val .='<option value="">Select Your City</option>'; 
	foreach($city_list as $value){
		$state_val .= '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>'; 
	}
	//$state_val .='</select>';
	
	echo $state_val;	
}	

if($_POST['action'] == 'area_list'){
	 
	$city = $pdo_conn->prepare("SELECT * FROM area WHERE district_id=$_POST[district_id] and  state_id = $_POST[state_id] and country_id=$_POST[country_id]    and city_id=$_POST[city_id]  and status='1' and delete_status='0' $_POST[area_query]");
	$city->execute();
	$city_list = $city->fetchall();
	
	$state_val = '';
	
	//$state_val .='<select class="form-control select2 item_name" name="district_id" id="district_id" required>
	  $state_val .='<option value="">Select Your City</option>'; 
	foreach($city_list as $value){
		$state_val .= '<option value="'.$value['area_id'].'">'.$value['area_name'].'</option>'; 
	}
	//$state_val .='</select>';
	
	echo $state_val;	
}	

include 'commonfunction1.php';
include 'commonfunction2.php';
include 'commonfunction3.php';

?>

