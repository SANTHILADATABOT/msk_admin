
<style type="text/css">
.style1 {font-weight:normal;font-family:calibri;font-size: 14px;}
.style2 {font-weight:normal;font-family:calibri;font-size: 16px;}
.style3 {font-weight:bold; text-align:right;font-family:calibri;font-size: 12px;}
.style4 {font-weight:bold; font-family:calibri;font-size: 16px;}
.style5 {font-family:calibri;font-weight: bold;font-size: 18px;}
.style6 {font-family:calibri;font-weight: bold;font-size: 16px;}
.style10{ border-top: solid 1px; border-top-color:#BFBFBF;}
.bottom{ border-bottom: solid 1px; border-bottom-color:#BFBFBF;}
.right{ border-right: solid 1px; border-bottom-color:#BFBFBF;}
</style>
<?php 
error_reporting(0);
session_start();
include ("../inc/commonfunction.php");

$cur_date=date('Y-m-d');

$user_country_id =   $_SESSION['country_id'];
$user_state_id =   $_SESSION['state_id'];
$user_district_id =   $_SESSION['district_id'];
$user_city_id =   $_SESSION['city_id'];
$user_area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];


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

$country_id=$_REQUEST['country_id'];
 $area_id=$_REQUEST['area_id'];
 $city_id=$_REQUEST['city_id'];
 $state_id=$_REQUEST['state_id'];
 $district_id=$_REQUEST['district_id'];
 $district_id=$_REQUEST['district_id'];
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
//echo "<br>query-->".$query;
 	 
?>
 
 <?php 

 //echo "SELECT * FROM food_needed WHERE delete_status!='1' $query ORDER BY food_needed_id DESC";
						 $survey = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' $query $user_type_query ORDER BY food_needed_id DESC");
 $survey->execute();
 $survey_list = $survey->fetchall();//echo "<pre>";print_r($survey_list);$name = "</pre>";
?>

	

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td height="37" align="center" class="style5">Food Needed Report</td>
		</tr>
	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	
	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
            <td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mobile No</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Address</strong></td>
			
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Profession</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Reason for Choosing Food</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Apply</strong></td>  
			
	  </tr>
        <tr>
			
				<td height="0" colspan="9" align="center" class="style10 style3 right" ></td>
			
        </tr>
        <?php 
	
		
	
foreach ($survey_list as $record)
{
	$name = $record['name'];
	$age = $record['age'];
    $profession = $record['profession'];
	$address = $record['address'];
	$mobile_no=$record['mobile_no'];
	$reason_for_choosing_food=$record['reason_for_choosing_food'];
	$need_amt=$record['amount'];
	//$guide_for_emp_str = explode (",", $record['guide_for_emp']); //print_r($guide_for_emp_str);
	
        
 
?>
	
	<tr>
            	<td align="center" height="25" class="style2 right"><?php echo $i = $i+1; ?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $name;?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $mobile_no; ?></td>
              
			    <td align="center" class="style2 right">&nbsp;<?php echo $address; ?></td>
		        <td align="center" class="style2 right">&nbsp;<?php echo $profession; ?></td>
			    <td align="center" class="style2 right">&nbsp;<?php echo $reason_for_choosing_food; ?></td>
				
				<td align="left" class="style2 right"><?php //echo "Apply";?></td>
				
	</tr>
		   <?php
         	 
}	
?>
			
				<td colspan="9" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td>
			
            
	
     
    </table>
</div>