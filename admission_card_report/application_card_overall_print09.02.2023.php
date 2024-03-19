
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
 
$query='';

if($id_number!='')
{
	$query.='   and id_number="'.$id_number.'"';
}

//echo "<br>query-->".$query;

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

?>
 
 <?php 

if($_GET['id_number']=="")
{
  $select_customer_creation = $pdo_conn->prepare("SELECT * FROM admission_card WHERE delete_status!='1' $user_type_query ORDER BY admission_card_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();
}
else if($_GET['id_number']!="" )
{
	$query = "AND id_number='".$_GET['id_number']."' ";
	$select_customer_creation = $pdo_conn->prepare("SELECT * FROM admission_card WHERE delete_status!='1' $query $user_type_query ORDER BY admission_card_id DESC");
	$select_customer_creation->execute();
	$survey_list = $select_customer_creation->fetchAll();
}
?>

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td height="37" align="center" class="style5">Application Card Report</td>
		</tr>
	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	 <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
			<td width="5%" height="27" align="center" class="style10 style4 right"><strong>ID</strong></td>
            <td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Patient Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mobile Number</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Hosptial Name</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Contact Person Name</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Apply</strong></td>  
			
	  </tr>
        <tr>
			
				<td height="0" colspan="7" align="center" class="style10 style3 right" ></td>
			
        </tr>
        <?php 
	
		
	
foreach ($survey_list as $record)
{
	$id = $record['id_number'];
	$patient_name = $record['patient_name'];
	$contact_person = $record['contact_person'];
    $hospital_name = $record['hospital_name'];
	
	$mobile_no=$record['mobile_no'];
	
	//$guide_for_emp_str = explode (",", $record['guide_for_emp']); //print_r($guide_for_emp_str);
	
        
 
?>
	
	<tr>
            	<td align="center" height="25" class="style2 right"><?php echo $i = $i+1; ?></td>
				 <td align="center" class="style2 right">&nbsp;<?php echo $id;?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $patient_name;?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $mobile_no; ?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $hospital_name; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $contact_person; ?></td>
		        
				
				<td align="left" class="style2 right"><?php //echo "Apply";?></td>
				
	</tr>
		   <?php
         	 
}	
?>
<td colspan="7" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td>
</table>
</div>