
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

 //echo "SELECT * FROM join_masjith WHERE delete_status!='1' $query ORDER BY join_id DESC";
 $survey = $pdo_conn->prepare("SELECT * FROM join_masjith WHERE delete_status!='1' $query ORDER BY join_id DESC");
 $survey->execute();
 $survey_list = $survey->fetchall();//echo "<pre>";print_r($survey_list);$name = "</pre>";
?>

	

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td height="37" align="center" class="style5">MSK Activists Report</td>
		</tr>
	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	
	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
            <td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Father Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Profession</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;District Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Pay Amount</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mobile No</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Serve Department</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Apply</strong></td>  
			
	  </tr>
        <tr>
			
				<td height="0" colspan="9" align="center" class="style10 style3 right" ></td>
			
        </tr>
        <?php 
	
		
	
foreach ($survey_list as $record)
{
	$name = $record['name'];
	$father_name = $record['father_name'];
    $profession = $record['profession'];
	$district_name = $record['district_name'];
	$pay_amount=$record['pay_amount'];
	$mobile_no=$record['mobile_no'];
	$serve_department=$record['serve_department'];
?>
	
	<tr>
            	<td align="center" height="25" class="style2 right"><?php echo $i = $i+1; ?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $name;?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $father_name; ?></td>
              
			    <td align="center" class="style2 right">&nbsp;<?php echo $profession; ?></td>
		        <td align="center" class="style2 right">&nbsp;<?php echo $district_name; ?></td>
			    <td align="center" class="style2 right">&nbsp;<?php echo $pay_amount; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $mobile_no; ?></td>
				 <td align="center" class="style2 right" style="overflow: hidden;max-width: 400px;word-wrap: break-word">&nbsp;<?php echo $serve_department; ?></td>
				<td align="left" class="style2 right"><?php //echo "Apply";?></td>
				
	</tr>
		   <?php
         	 
}	
?>
	<td colspan="9" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td>
   
    </table>
</div>