
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

$id_number=$_REQUEST['id_number'];
$qualification=$_REQUEST['qualification'];
$query='';
$prepare = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1'");
$prepare->execute();
$country_list = $prepare->fetchall();

$country_id =   $_SESSION['country_id'];
$state_id =   $_SESSION['state_id'];
$district_id =   $_SESSION['district_id'];
$city_id =   $_SESSION['city_id'];
$area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];


if($user_type=='1')
{
	$user_type_query='';	 
}
else if($user_type=='2')
{
	$user_type_query='  and country_id="'.$country_id.'"';	 
}
else if($user_type=='3')
{
	$user_type_query='  and country_id="'.$country_id.'"  and state_id="'.$state_id.'" ';
}
else if($user_type=='4')
{
	$user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
}
else if($user_type=='5')
{
    $user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';	  
}
else if ($user_type=='6') {
	$user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'" and area_id="'.$area_id.'"';
}

$dash_country_id =   $_GET['dash_country_id'];
$dash_state_id =   $_GET['dash_state_id'];
$dash_district_id =   $_GET['dash_district_id'];
$dash_city_id =   $_GET['dash_city_id'];
$dash_area_id =   $_GET['dash_area_id'];

$dash_query='';

if($dash_country_id!='')
{
	$dash_query.='   and country_id="'.$dash_country_id.'"';
}

if($dash_state_id!='')
{
	$dash_query.='   and state_id="'.$dash_state_id.'"';
}

if($dash_district_id!='')
{
	$dash_query.='   and district_id="'.$dash_district_id.'"';
}

if($dash_city_id!='')
{
	$dash_query.='   and city_id="'.$dash_city_id.'"';
}

if($dash_area_id!='')
{
	$dash_query.='   and area_id="'.$dash_area_id.'"';
}

if($_GET['id_number']=="" && $_GET['qualification']=="")
{
  $select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $user_type_query $dash_query ORDER BY job_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();
}
else if($_GET['id_number']!="" && $_GET['qualification']=="" )
{
	$query = "AND id_no='".$_GET['id_number']."' ";
	$select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $query $user_type_query $dash_query ORDER BY job_id DESC");
	$select_customer_creation->execute();
	$survey_list = $select_customer_creation->fetchAll();
}
else if($_GET['id_number']=="" && $_GET['qualification']!="" )
{
		$query = "AND qualification='".$_GET['qualification']."' ";
		$select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $query $user_type_query $dash_query ORDER BY job_id DESC");
		$select_customer_creation->execute();
		$survey_list = $select_customer_creation->fetchAll();
}
else 
{
  $query = "AND id_no='".$_GET['id_number']."' AND qualification='".$_GET['qualification']."' ";
  $select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $query $user_type_query $dash_query ORDER BY job_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();
}

//echo "<br>query-->".$query;
 	 
?>
 
 <?php 
//echo "SELECT * FROM matrimonial_information WHERE status='1' $query ORDER BY matrimonial_id DESC";
 /*$survey = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE status='1' $query ORDER BY matrimonial_id DESC");
 $survey->execute();
 $survey_list = $survey->fetchall();//echo "<pre>";print_r($survey_list);$name = "</pre>";*/
?>

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td height="37" align="center" class="style5">Job Appication Report</td>
		</tr>
	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">

	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
			<td width="5%" height="27" align="center" class="style10 style4 right"><strong>ID</strong></td>
            <td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Age</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Gender</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Education Qualification</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Marital Status</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mobile Number</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Apply</strong></td>  
			
	  </tr>
        <tr>
			
				<td height="0" colspan="9" align="center" class="style10 style3 right" ></td>
			
        </tr>
        <?php 
	
		
	
foreach ($survey_list as $record)
{
	$id = $record['id_no'];
	$name = $record['name'];
	$age = $record['age'];
    $education_qualification = $record['qualification'];
	$gender = $record['gender'];
	$mobile_no=$record['mobile_no'];
	$marital_status=$record['marital_status'];
	$need_amt=$record['amount'];
	//$guide_for_emp_str = explode (",", $record['guide_for_emp']); //print_r($guide_for_emp_str);
	
        
 
?>
	
	<tr>
            	<td align="center" height="25" class="style2 right"><?php echo $i = $i+1; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $id;?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $name;?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $age; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $gender; ?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $education_qualification; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $marital_status; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $mobile_no; ?></td>
			   
				
				<td align="left" class="style2 right"><?php //echo "Apply";?></td>
				
	</tr>
		   <?php
         	 
}	
?>
			
				<td colspan="9" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td>
			
            
	
     
    </table>
</div>