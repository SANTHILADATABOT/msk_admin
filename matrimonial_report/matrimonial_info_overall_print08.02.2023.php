
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
 	 
?>
 
 <?php 
//echo "SELECT * FROM matrimonial_information WHERE status='1' $query ORDER BY matrimonial_id DESC";
 $survey = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE status='1' $query ORDER BY matrimonial_id DESC");
 $survey->execute();
 $survey_list = $survey->fetchall();//echo "<pre>";print_r($survey_list);$name = "</pre>";
?>

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td height="37" align="center" class="style5">Matrimonial Information Report</td>
		</tr>
	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	
	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
            <td width="12%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Education Qualification</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Age</strong></td>
			
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Gender</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Monthly Income</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mobile Number</strong></td>
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
    $education_qualification = $record['education_qualification'];
	$gender = $record['gender'];
	$mobile_no=$record['mobile_no'];
	$monthly_income=$record['monthly_income'];
	$need_amt=$record['amount'];
	//$guide_for_emp_str = explode (",", $record['guide_for_emp']); //print_r($guide_for_emp_str);
	
        
 
?>
	
	<tr>
            	<td align="center" height="25" class="style2 right"><?php echo $i = $i+1; ?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $name;?></td>
                <td align="center" class="style2 right">&nbsp;<?php echo $education_qualification; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $age; ?></td>
		        <td align="center" class="style2 right">&nbsp;<?php echo $gender; ?></td>
			    <td align="center" class="style2 right">&nbsp;<?php echo $monthly_income; ?></td>
				<td align="center" class="style2 right">&nbsp;<?php echo $mobile_no; ?></td>
				<td align="left" class="style2 right"><?php //echo "Apply";?></td>
				
	</tr>
		   <?php
         	 
}	
?>
			
				<td colspan="9" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td>
			
            
	
     
    </table>
</div>