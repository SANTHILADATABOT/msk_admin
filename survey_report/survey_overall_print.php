
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
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$cur_date=date('Y-m-d');

$user_country_id =   $_SESSION['country_id'];
$user_state_id =   $_SESSION['state_id'];
$user_district_id =   $_SESSION['district_id'];
$user_city_id =   $_SESSION['city_id'];
$user_area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];

$wanted_data=$_REQUEST['wanted_data'];
$status=$_REQUEST['status'];
$blood_group=$_REQUEST['blood_group'];

$country_id=$_GET['country_id'];
$area_id=$_GET['area_id'];
$city_id=$_GET['city_id'];
$state_id=$_GET['state_id'];
$district_id=$_GET['district_id'];



$query='';

if($wanted_data=='Job')
{ 
	$query='   and guide_for_emp!=""';
}
else if($wanted_data=='Marriage')
{
	$query='   and marriage_help!=""';
}
else if($wanted_data=='MSK')
{
	$query='   and interest_to_serve_msk!=""';
}
else if($wanted_data=='Own')
{
	$query='   and house like "%Own House%"';
}
else if($wanted_data=='Rent')
{
	$query='  and house like "%Rented%"';
}
else if($wanted_data=='Bathroom')
{
	$query='    and bathroom_availability like "%No%"';
}
else if($wanted_data=='Economic')
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
// else if($wanted_data=='Disability')
// {
// 	$query='  and disability_pension!=""';
// }
// else if($wanted_data=='Widow')
// {
// 	$query='  and widow_aged_welfare!=""';
// }
// else if($wanted_data=='Orphan')
// {
// 	$query=' and destitute_orphan_welfare!=""';
// }
else if($wanted_data=='gov_help')
{
	$query='   and (disability_pension!="" or widow_aged_welfare!="" or destitute_orphan_welfare!="" or old_age_pension!="" )';
}
else if($wanted_data=='Food')
{
	$query=' and incapable_of_working!=""';
}
else if($wanted_data=='Medical')
{
	$query='  and disease_details!=""';
}
else if($wanted_data=='maqtab_child')
{
	$query='  and ffs.child_interest like "%Yes%" and ffs.age BETWEEN 4 and 15';
}
else if($wanted_data=='maqtab_adult')
{
	$query='  and ffs.maqtab_interest like "%Yes%" and ffs.age > 15';
}
else if($wanted_data=='allin_hifz_course')
{
	$query='  and ffs.allin_hifz_course like "%Yes%"';
}
else if($wanted_data=='higher_edu_guide')
{
	$query='   and (higher_edu_guide RLIKE "([a-z]+)" or fin_support_for_edu RLIKE "([a-z]+)" or pre_matric_scholarship RLIKE "([a-z]+)" or post_matric_scholarship RLIKE "([a-z]+)")';
}
else if($wanted_data=='small_scale')
{
	$query='   and (entrepreneur_counselling RLIKE "([a-z]+)" or business_counselling RLIKE "([a-z]+)" or guide_for_skill_develop RLIKE "([a-z]+)")';
}
else if($wanted_data=='rehabilitation_counselling')
{
	$query='   and rehabilitation_counselling != ""';
}
else if($wanted_data=='suffer_from_interest_loan')
{
	$query='   and suffer_from_interest_loan != ""';
}
else if($wanted_data=='school_dropouts_interest_in_emp')
{
	$query='   and school_dropouts_interest_in_emp != ""';
}
else if($wanted_data=='family_counselling')
{
	$query='   and family_counselling RLIKE "([a-z]+)"';
}
else if($wanted_data=='blood_group')
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

if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course' || $wanted_data=='blood_group'){
    if($user_type=='1')
    {
    	$user_type_area_query='';	 
    }
    else if($user_type=='2')
    {
    	$user_type_area_query='  and ffs.country_id="'.$user_country_id.'"';	 
    }
    else if($user_type=='3')
    {
    	$user_type_area_query='  and ffs.country_id="'.$user_country_id.'"  and ffs.state_id="'.$user_state_id.'" ';
    }
    else if($user_type=='4')
    {
    	$user_type_area_query='  and ffs.country_id="'.$user_country_id.'" and ffs.state_id="'.$user_state_id.'" and ffs.district_id="'.$user_district_id.'"';
    }
    else if($user_type=='5')
    {
        $user_type_area_query='  and ffs.country_id="'.$user_country_id.'" and ffs.state_id="'.$user_state_id.'" and ffs.district_id="'.$user_district_id.'" and ffs.city_id="'.$user_city_id.'"';	  
    }
    else if ($user_type=='6') {
    	$user_type_area_query='  and ffs.country_id="'.$user_country_id.'" and ffs.state_id="'.$user_state_id.'" and ffs.district_id="'.$user_district_id.'" and ffs.city_id="'.$user_city_id.'" and ffs.area_id="'.$user_area_id.'"';
    }
}else{
    if($user_type=='1')
    {
    	$user_type_area_query='';	 
    }
    else if($user_type=='2')
    {
    	$user_type_area_query='  and country_id="'.$user_country_id.'"';	 
    }
    else if($user_type=='3')
    {
    	$user_type_area_query='  and country_id="'.$user_country_id.'"  and state_id="'.$user_state_id.'" ';
    }
    else if($user_type=='4')
    {
    	$user_type_area_query='  and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'"';
    }
    else if($user_type=='5')
    {
        $user_type_area_query='  and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'"';	  
    }
    else if ($user_type=='6') {
    	$user_type_area_query='  and country_id="'.$user_country_id.'" and state_id="'.$user_state_id.'" and district_id="'.$user_district_id.'" and city_id="'.$user_city_id.'" and area_id="'.$user_area_id.'"';
    }
}
if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course' || $wanted_data=='blood_group'){
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

if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course' || $wanted_data=='blood_group'){
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
//echo "<br>query-->".$query;
 function val_of_family_name($exp_val)
    {
        $i=1;
	global $pdo_conn;
        $get_val=explode(",",$exp_val);
        $get_count=count($get_val);
        foreach($get_val as  $val_get)
        {
             if($i==$get_count) {$val_con="";  } else {$val_con=","; }
            
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
 
 <?php 


 $survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query $user_type_query ORDER BY survey_id DESC");
 if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course'){
 $survey = $pdo_conn->prepare("SELECT * FROM  fact_finding_subform AS ffs INNER JOIN fact_finding_form AS fff ON ffs.random_no = fff.unique_no WHERE ffs.id!='' $query $user_type_query GROUP BY ffs.random_no ORDER BY ffs.id DESC");
 }
 if($wanted_data=='blood_group'){
 $survey = $pdo_conn->prepare("SELECT * FROM  fact_finding_subform AS ffs INNER JOIN fact_finding_form AS fff ON ffs.random_no = fff.unique_no WHERE ffs.id!='' $query $user_type_query ORDER BY ffs.id DESC");
 }
 $survey->execute();
 $survey_list = $survey->fetchall();//echo "<pre>";print_r($survey_list);$name = "</pre>";
?>

	

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td rowspan='3' width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
		<?php 
		
		if($wanted_data=="Food")
		{?>
			<!--<td align="center" height="37" align="center" class="style5"><?php echo $wanted_data;?> Needy</td>-->
			<td align="center" height="37" align="center" class="style5">1. People who needs food kit</td><?php
		}
		else if($wanted_data=="Medical")
		{?>
			<td align="center" height="37" align="center" class="style5">2. <?php echo $wanted_data;?> (surgery)</td><?php
		}
			else if($wanted_data=="Marriage")
		{?>
			<td align="center" height="37" align="center" class="style5">4. <?php echo $wanted_data;?> Help / Nikah Information</td><?php
		}
		else if($wanted_data=="maqtab_child")
		{?>
			<td align="center" height="37" align="center" class="style5">5. Boys / Girls interested to join maqtab madrasa (4-15 Age)</td><?php
		}
		else if($wanted_data=="allin_hifz_course")
		{?>
			<td align="center" height="37" align="center" class="style5">6. People who are interested to become Aalim / Aalima</td><?php
		}
		else if($wanted_data=="maqtab_adult")
		{?>
			<td align="center" height="37" align="center" class="style5">7. People interested to join maktab madarasa (Adults)</td><?php
		}
		else if($wanted_data=="Job")
		{?>
			<td align="center" height="37" align="center" class="style5">8. People who need employment</td><?php
		}
		else if($wanted_data=="higher_edu_guide")
		{?>
			<td align="center" height="37" align="center" class="style5">9. Guidance for higher Education / Scholarship</td><?php
		}
		else if($wanted_data=="gov_help")
		{?>
			<td align="center" height="37" align="center" class="style5">10. People who need Government Help<br>Old Age Pension / Destitute Women / Widow / Disabled</td><?php
		}
		else if($wanted_data=="small_scale")
		{?>
			<td align="center" height="37" align="center" class="style5">12. Small Scale Industrial Training and Guidance</td><?php
		}
		else if($wanted_data=="Bathroom")
		{?>
			<td height="37" align="center" class="style5">13. People who need toilet facility</td><?php
		}
		else if($wanted_data=="rehabilitation_counselling")
		{?>
			<td height="37" align="center" class="style5">14. Rehabilitation for alcohol addict</td><?php
		}
		else if($wanted_data=="suffer_from_interest_loan")
		{?>
			<td height="37" align="center" class="style5">15. People affected by Loan with Interest</td><?php
		}
		else if($wanted_data=="school_dropouts_interest_in_emp")
		{?>
			<td height="37" align="center" class="style5">16. School Drop Out</td><?php
		}
		else if($wanted_data=="family_counselling")
		{?>
			<td height="37" align="center" class="style5">17. Other Information</td><?php
		}
		else if($wanted_data=="Own")
		{?>
			<td height="37" align="center" class="style5">18. <?php echo $wanted_data;?> House </td><?php
		}
		else if($wanted_data=="Rent")
		{?>
			<td align="center" height="37" align="center" class="style5">19. <?php echo $wanted_data.'ed';?> House </td><?php
		}
		else if($wanted_data=="Economic")
		{if($status=="A"){?>
			<td height="37" align="center" class="style5">20. Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="B"){?>
			<td height="37" align="center" class="style5">20. Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="C"){?>
			<td height="37" align="center" class="style5">20. Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="D"){?>
			<td height="37" align="center" class="style5">20. Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="E"){?>
			<td height="37" align="center" class="style5">20. Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else{?>
			<td height="37" align="center" class="style5">20. Families <?php echo $wanted_data;?> Status </td><?php }
		}
		else if($wanted_data=="MSK")
		{?>
			<td align="center" height="37" align="center" class="style5">21. MSK Membership Join</td><?php
		}
	    else if($wanted_data=="blood_group")
		{?>
			<td align="center" height="37" align="center" class="style5">22. Blood Group</td><?php
		}
		
		
		
		else if($wanted_data=="Disability")
		{?>
			<td height="37" align="center" class="style5"><?php echo $wanted_data;?> Pension Needy</td><?php
		}
		else if($wanted_data=="Widow")
		{?>
			<td height="37" align="center" class="style5"><?php echo $wanted_data;?> / Aged Welfare Needy</td><?php
		}
		else if($wanted_data=="Orphan")
		{?>
			<td height="37" align="center" class="style5">Destitute / <?php echo $wanted_data;?> Welfare Needy</td><?php
		}
		
		
		else 
		{?>
			<td height="37" align="center" class="style5">Survey Report Details</td><?php
		}	
		?>
		
		
        </tr>
        
            <?php include('quran.php'); ?>
       
        </table>
		<table>
        <tr>
            
            <td width="300px"><b>Country : </b><?php echo get_country_name($country_id);?></td>
            <td width="300px"><b>State : </b><?php echo get_state_name($state_id);?></td>
            <td width="300px"><b>District : </b><?php echo get_district_name($district_id);?></td>
        </tr>
        
        <tr>
            
            <td><b>City : </b><?php echo get_city_name($city_id)?></td>
            <td><b>Area : </b><?php echo get_area_name($area_id);?></td>
			<td></td>
        </tr>


	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	
	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
            <td width="6%" align="center" class="style10 style4 right"><strong>&nbsp;F.No</strong></td>
			<td width="10%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<?php 
			if($wanted_data=="Job" || $wanted_data=="Marriage" || $wanted_data=="MSK" || $wanted_data=="gov_help" || $wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult" || $wanted_data=="allin_hifz_course" || $wanted_data=="higher_edu_guide" || $wanted_data=="small_scale" || $wanted_data=="rehabilitation_counselling" || $wanted_data=="suffer_from_interest_loan" || $wanted_data=="school_dropouts_interest_in_emp" || $wanted_data=="family_counselling" || $wanted_data=="blood_group")
			{?>
             <td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Age</strong></td><?php
			}?>
			<?php
			if($wanted_data=='blood_group'){
			    ?>
			    <td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Blood Group</strong></td>
			    <?php
			}
			?>
			<?php
			if($wanted_data=="rehabilitation_counselling" || $wanted_data=="suffer_from_interest_loan" || $wanted_data=='school_dropouts_interest_in_emp' || $wanted_data=='family_counselling'){
			?>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Details</strong></td>
			<?php
			}
			?>
			<?php
			if($wanted_data=="small_scale"){
			?>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Education</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Details</strong></td>
			<?php
			}
			?>
			<?php
			if($wanted_data=="higher_edu_guide"){
			?>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Education</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Qualification</strong></td>
			<?php
			}
			?>
			<?php
			if($wanted_data=="allin_hifz_course"){
			?>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Education</strong></td>
			<td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Aalim / Aalima</strong></td>
			<?php
			}
			?>
			<?php 
			if($wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult")
			{?>
             <td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Male / Female</strong></td><?php
			}?>
			<?php 
			if($wanted_data=="gov_help")
			{?>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Old Age Pension / Destitute women / Widow / Disabled</strong></td><?php
			}?>
			<?php 
			if($wanted_data=="Job" || $wanted_data=="MSK")
			{?>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Education</strong></td><?php
			}?>
			<?php 
			if($wanted_data=="Marriage")
			{?>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Government & Private</strong></td><?php
			}?>
			<?php 
			if($wanted_data=="Medical")
			{?>
			 <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Disease Details</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Surgery Disease Details</strong></td>
             <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Surgery Disease Details No</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Mon Exp On Medicine</strong></td>
			<td width="14%" align="center" class="style10 style4 right bottom"><strong>&nbsp;Mon Exp On Medicine No</strong></td>
			<?php
			}?>
			<?php 
			if($wanted_data=="MSK")
			{?>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Job or Business</strong></td><?php
			}?>
			<?php 
			if(($wanted_data=="Own")||($wanted_data=="Rent"))
			{?>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Members</strong></td><?php
			}?>
			
            <td width="14%" align="center" class="style10 style4 right "><strong>&nbsp;Phone No</strong></td>
            <?php 
			if($wanted_data=="Food")
			{?>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Age</strong></td>
			<td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Address</strong></td>
            <td width="14%" align="center" class="style10 style4 right"><strong>&nbsp;Family Status</strong></td><?php
			}?>
			<td width="8%" align="center" class="style10 style4 right bottom"><strong>&nbsp;Apply</strong></td>  
			
	  </tr>
        <tr>
			<?php
			if($wanted_data=='MSK')
			{?>
				<td height="0" colspan="8" align="center" class="style10 style3 right" ></td><?php
			}
			else
			{?>
				<td height="0" colspan="7" align="center" class="style10 style3 right" ></td><?php
			}?>
        </tr>
        <?php 
	
		
	
foreach ($survey_list as $record)
{
	$fno = $record['family_no'];
	$family_name = $record['family_head_name'];
    $govt = $record['marriage_help_radio'];
	$contact_no = $record['contact_no'];
	$guide_for_emp_str = explode (",", $record['guide_for_emp']); 
	if($wanted_data=='MSK')
	{
	    if($record['interest_to_serve_msk_no']!="")	{	
			$name=$record['interest_to_serve_msk_no'];
												
		}											
		else{
			$survey2_sub_det=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$record['unique_no']."'  ");
			$survey2_sub_det->execute();
			$fet_sub_det=$survey2_sub_det->fetch();
			$name=$fet_sub_det['family_head_name'];
		}
	    $names = explode(',',$name);
	    $count = count($names);
	    $age='';
	    foreach($names as $na){
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$na%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
	        
	    }
	    
 $survey_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$record[interest_to_serve_msk_no]%' ORDER BY id DESC");
	}
	else if($wanted_data=='Job')
	{
	    $name=$record['guide_for_emp'];
	    $names = explode(',',$name);
	    $count = count($names);
	    $age='';
	    foreach($names as $na){
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$na%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
	        
	    }
	    
 $survey_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$record[guide_for_emp]%' ORDER BY id DESC");
	}
	else if($wanted_data=='Medical')
	{
	$survey_sub = $pdo_conn->prepare("SELECT DISTINCT a.id,b.*,a.* FROM  fact_finding_subform a left join fact_family_disease b ON a.random_no=b.unique_no WHERE  b.delete_status!='1' ORDER BY a.id DESC");
							}
	else if($wanted_data=='Marriage')
	{
	    $name=$record['marriage_help'];		
	    $names = explode(',',$name);
	    $count = count($names);
	    $age='';
	    foreach($names as $na){
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$na%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
	        
	    }
	   
 $survey_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$record[marriage_help]%' ORDER BY id DESC");
	}
// 	else if(($wanted_data=='Own')||($wanted_data=='Rent')||($wanted_data=='Bathroom')||($wanted_data=='Disability')||($wanted_data=='Widow')||($wanted_data=='Orphan')||($wanted_data=='Economic'))
else if(($wanted_data=='Own')||($wanted_data=='Rent')||($wanted_data=='Bathroom')||($wanted_data=='gov_help')||($wanted_data=='Economic'))
	{
	   
 $survey_sub = $pdo_conn->prepare("SELECT count(id) as id, family_head_name, age FROM fact_finding_subform WHERE random_no='$record[unique_no]'  ORDER BY id DESC");
	}
	else if($wanted_data=='Food')
	{
	   
 $survey_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]'  ORDER BY id DESC");
	}
	else if($wanted_data=='maqtab_child')
	{
 $survey_sub = $pdo_conn->prepare("SELECT GROUP_CONCAT(concat(family_head_name, '/', gender, '/', age)) as names FROM fact_finding_subform WHERE random_no='$record[unique_no]' AND age BETWEEN 4 AND 15 AND child_interest LIKE '%Yes%' ORDER BY id DESC");
	}
	else if($wanted_data=='maqtab_adult')
	{
 $survey_sub = $pdo_conn->prepare("SELECT GROUP_CONCAT(concat(family_head_name, '/', gender, '/', age)) as names FROM fact_finding_subform WHERE random_no='$record[unique_no]' AND age > 15 AND maqtab_interest LIKE '%Yes%' ORDER BY id DESC");
	}
	else if($wanted_data=='allin_hifz_course')
	{
 $survey_sub = $pdo_conn->prepare("SELECT GROUP_CONCAT(concat(family_head_name, '/', gender, '/', age, '/', edu_qualification)) as names FROM fact_finding_subform WHERE random_no='$record[unique_no]' AND allin_hifz_course LIKE '%Yes%' ORDER BY id DESC");
	}
	else if($wanted_data=='higher_edu_guide' || $wanted_data=='small_scale' || $wanted_data=='rehabilitation_counselling' || $wanted_data=='suffer_from_interest_loan' || $wanted_data=='school_dropouts_interest_in_emp' || $wanted_data=='family_counselling')
	{
 $survey_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' ORDER BY id desc");
	}else if($wanted_data=='blood_group')
	{
	     $survey_sub = $pdo_conn->prepare("SELECT * FROM  fact_finding_subform AS ffs INNER JOIN fact_finding_form AS fff ON ffs.random_no = fff.unique_no WHERE ffs.id!='' $query ORDER BY ffs.id DESC");
	}
	
        
 $survey_sub->execute();
 $survey_list_sub = $survey_sub->fetchall();//echo "<pre>";print_r($survey_list_sub);echo "</pre>";


 
 if(!empty($survey_list_sub))
 { 
         foreach ($survey_list_sub as $record1)
         {
             $namees = '';

	   //     $age = $record1['age'];

                
                if($record1['edu_qualification']){
                    $education = get_edu_qualificaqtion($record1['edu_qualification']);
                }else{
                    $education = $record1['educ_qualification_inp'];
                }
                $disease = $record['surgery_details'];
                $cost = $record['mon_exp_on_medicine'];
                $bussiness_occupation=$record1['bussiness_occupation'];
                $members = $record1['id'];
                // if(($wanted_data=='Own')||($wanted_data=='Rent')||($wanted_data=='Bathroom')||($wanted_data=='Disability')||($wanted_data=='Widow')||($wanted_data=='Orphan')||($wanted_data=='Economic'))
                if(($wanted_data=='Own')||($wanted_data=='Rent')||($wanted_data=='Bathroom')||($wanted_data=='gov_help')||($wanted_data=='Economic'))
	            {
                $name = $record1['family_head_name'];
                $age = $record1['age'];
	            }
	           // $query='  and disability_pension!=""';
// }
// else if($wanted_data=='Widow')
// {
// 	$query='  and widow_aged_welfare!=""';
// }
// else if($wanted_data=='Orphan')
// {
// 	$query=' and destitute_orphan_welfare!=""';
$gov_helpp = '';
	            if($wanted_data=='gov_help'){
	                
	                if($record['old_age_pension']!=''){
	                    $gov_help = 'Old Age Pension';
	                    $gov_helpp = $gov_help.', ';
	                }
	                if($record['destitute_orphan_welfare']!=''){
	                    $gov_help = 'Destitute Women';
	                    $gov_helpp .= $gov_help.', ';
	                }
	                if($record['widow_aged_welfare']!=''){
	                    $gov_help = 'Widow';
	                    $gov_helpp .= $gov_help.', ';
	                }
	                if($record['disability_pension']!=''){
	                    $gov_help = 'Disabled';
	                    $gov_helpp .= $gov_help.', ';
	                }
	                
	            }
	            
	            if($wanted_data=='Food'){
	                $name = $record1['family_head_name'];
	                $family_status = $record['economic_status'];
	                $age = $record1['age'];
	                $address = $record['door_no'].', '.$record['street_name'].', '.$record['nagar'];
	            }
	            if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course'){
	                $group = explode(',', $record1['names']);
	                
	            }
	            if($wanted_data=='higher_edu_guide'){
	               // $name = $record1['family_head_name'];
	               
								$name="";
										if(trim($record['higher_edu_guide'])!=''){
											$name=trim($record['higher_edu_guide']);
										}
										if(trim($record['fin_support_for_edu'])!=''){
											$name.=','.trim($record['fin_support_for_edu']);
										}
										if(trim($record['pre_matric_scholarship'])!=''){
											$name.=','.trim($record['pre_matric_scholarship']);
										}
										if(trim($record['post_matric_scholarship'])!=''){
											$name.=','.trim($record['post_matric_scholarship']);
										}
										$name =ltrim($name,",");
								

	               // $age = $record1['age'];
	               $names = explode(',',$name);
	    $age='';
	    foreach($names as $na){
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$na%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
	        
	    }
	                $education = get_edu_qualificaqtion($record1['edu_qualification']);
	                
	                 if((trim($record['higher_edu_guide'])!='') && (trim($record['fin_support_for_edu'])=='')){
								    $edu = 'Higher Education';
								}else if((trim($record['higher_edu_guide'])=='') && $record['fin_support_for_edu']!=''){
								    $edu = 'Scholarship';
								}else{
								    $edu = 'Higher Education'.', '.'Scholarship';
								}
	            }
	            if($wanted_data=='small_scale'){
	               // $name = $record1['family_head_name'];
	               $names = trim($record['business_counselling']).','.trim($record['entrepreneur_counselling']).','.trim($record['guide_for_skill_develop']);
									    $nam = explode(',', $names);
									    
									    foreach($nam as $na){
									        if($na!=''){
									       $namees .= $na. ',';
									        }
									    }
									    $name = rtrim($namees,',');
									    $names = explode(',',$name);
	    $age='';
	    foreach($names as $na){
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$na%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
	    }
	               // $age = $record1['age'];
	                $education = get_edu_qualificaqtion($record1['edu_qualification']);
	                $details = $record['guide_counselling_full_details'];
	            }
	            if($wanted_data=='rehabilitation_counselling'){
	                $name = $record['rehabilitation_counselling'];
	               // $age = $record1['age'];
	                $names = explode(',',$name);
	    $age='';
	    foreach($names as $na){
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$na%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
	    }
	                $details = $record['guide_counselling_full_details'];
	            }
	            if($wanted_data=='suffer_from_interest_loan'){
	                $name = $record1['family_head_name'];
	                $age = $record1['age'];
	                $details = $record['guide_counselling_full_details'];
	            }
	            if($wanted_data=='school_dropouts_interest_in_emp'){
	                $name = $record1['family_head_name'];
	                $age = $record1['age'];
	                $details = '';
	            }
	            if($wanted_data=='family_counselling'){
	                $name = $record['family_counselling'];
	               // $age = $record1['age'];
	                $names = explode(',',$name);
	    $age='';
	    foreach($names as $na){
	        $n = trim($na);
	        $sur_sub = $pdo_conn->prepare("SELECT * FROM fact_finding_subform WHERE random_no='$record[unique_no]' and family_head_name like '%$n%' ORDER BY id DESC");
	        $sur_sub->execute();
            $sur_list_sub = $sur_sub->fetchall();
            
             foreach($sur_list_sub as $res){
                 $age .= $res['age'].',';
             }
             
	    }
	                $details = $record['guide_counselling_full_details'];
	            }
	            
	    if($wanted_data=='blood_group'){
	                $name = $record['family_head_name'];
	                $age = $record['age'];
	                $blood_grp = get_blood_group($record['blood_group']);
	            }
        }
       
 }
 else
 {
                //$age = '-';
                //$education = '-';
                //$disease = '-';
                //$cost = '-';
                //$bussiness_occupation='-';
                //$members='-';
 }

?>
  <?php
	    if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course'){
	        foreach($group as $grp){
	            $gp = explode('/', $grp);
	            ?>	
	<tr>
	  
            	<td align="center" height="25" class="style2 right bottom"><?php echo $i = $i+1; ?></td>
                <td align="center" class="style2 right bottom">&nbsp;<?php echo $fno;?></td>
                <td align="center" class="style2 right bottom">&nbsp;<?php if($name=='Select'){echo '-';}else if($wanted_data=='maqtab_child'||$wanted_data=="maqtab_adult" || $wanted_data=='allin_hifz_course'){ echo $gp[0];}else{echo $name; }?></td>
                <?php 
				if($wanted_data=="Job" || $wanted_data=="Marriage" || $wanted_data=="MSK" || $wanted_data=="gov_help" || $wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult" || $wanted_data=="allin_hifz_course")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php if($wanted_data=='maqtab_child' || $wanted_data=="maqtab_adult" || $wanted_data=='allin_hifz_course'){ echo $gp[3];}else{ echo rtrim($age,','); } ?></td><?php
				}?>
				<?php
				if($wanted_data=='allin_hifz_course'){
				    ?>
				    <td align="center" class="style2 right bottom">&nbsp;<?php  echo get_edu_qualificaqtion($gp[4]); ?></td>
				    <td align="center" class="style2 right bottom">&nbsp;<?php  if($gp[1]=='F '){ echo 'Aalima';}else if($gp[1]=='M '){ echo 'Aalim';} ?></td>
				    
				    <?php
				}
				?>
				<?php 
				if($wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php  if($gp[1]=='F '){ echo 'Female';}else if($gp[1]=='M '){ echo 'Male';} ?></td><?php
				}?>
				<?php 
				if($wanted_data=="gov_help")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo rtrim($gov_helpp,', '); ?></td><?php
				}?>
				<?php 
				if($wanted_data=="Job" || $wanted_data=="MSK")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php if($education!=''){echo $education;}else{echo '-';} ?></td><?php
				}?>
				<?php 
				if($wanted_data=="Marriage")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $govt; ?></td><?php
				}?>
				
				<?php 
				if($wanted_data=="Medical")
				{
				//echo "hehhehhe";
				?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1['disease_details']; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[surgery_details]; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo val_of_family_name($record1[surgery_details_no]); ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[mon_exp_on_medicine]; ?></td>
							<td align="center" class="style2 right bottom ">&nbsp;<?php echo val_of_family_name($record1[mon_exp_on_medicine_no]); ?></td>
					
					
					<?php
				}?>
				<?php 
				if($wanted_data=="MSK")
				{?>
					<td align="center" class="style2 right bottom"><?php if($bussiness_occupation!=''){echo $bussiness_occupation;}else{echo '-';} ?></td><?php
				}?>
				<?php 
				if(($wanted_data=="Own")||($wanted_data=="Rent"))
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $members; ?></td><?php
				}?>
                <td align="center" class="style2 right bottom"><?php echo $contact_no; ?></td>
                <?php 
				if($wanted_data=="Food")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $age; ?></td>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $address; ?></td>
					<td align="left" class="style2 right bottom"></td><?php
				}?>
                <td align="left" class="style2 right bottom"><?php //echo "Apply";?></td>
                
				
	</tr>
	<?php
	        }
	    }else{
	        ?>
	        	<tr>
	  
            	<td align="center" height="25" class="style2 right bottom"><?php echo $i = $i+1; ?></td>
                <td align="center" class="style2 right bottom">&nbsp;<?php echo $fno;?></td>
                <td align="center" class="style2 right bottom">&nbsp;<?php if($name=='Select'){echo '-';}else{echo $name; }?></td>
                <?php 
				if($wanted_data=="Job" || $wanted_data=="Marriage" || $wanted_data=="MSK" || $wanted_data=="gov_help" || $wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult" || $wanted_data=="allin_hifz_course" || $wanted_data=="higher_edu_guide" || $wanted_data=="small_scale" || $wanted_data=="rehabilitation_counselling" || $wanted_data=="suffer_from_interest_loan" || $wanted_data=='school_dropouts_interest_in_emp' || $wanted_data=="family_counselling" || $wanted_data=='blood_group')
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo rtrim($age,',');  ?></td><?php
				}?>
				<?php
				if($wanted_data=='blood_group'){
				    ?>
				    <td align="center" class="style2 right bottom">&nbsp;<?php echo rtrim($blood_grp,',');  ?></td>
				    <?php
				}
				?>
				<?php
				if($wanted_data=='rehabilitation_counselling' || $wanted_data=='suffer_from_interest_loan' || $wanted_data=='school_dropouts_interest_in_emp' || $wanted_data=='family_counselling'){
				    ?>
				    <td align="center" class="style2 right bottom">&nbsp;<?php   if($details=='') echo '-'; else echo ($details); ?></td>
				    </td>
				    
				    <?php
				}
				?>
				<?php
				if($wanted_data=='small_scale'){
				    ?>
				    <td align="center" class="style2 right bottom">&nbsp;<?php if($education=='') echo '-'; else echo ($education); ?></td>
				    <td align="center" class="style2 right bottom">&nbsp;<?php   if($details=='') echo '-'; else echo ($details); ?></td>
				    </td>
				    
				    <?php
				}
				?>
					<?php
				if($wanted_data=='higher_edu_guide'){
				    ?>
				    <td align="center" class="style2 right bottom">&nbsp;<?php  echo ($edu); ?></td>
				    <td align="center" class="style2 right bottom">&nbsp;<?php  echo ($education); ?></td>
				    </td>
				    
				    <?php
				}
				?>
				<?php
				if($wanted_data=='allin_hifz_course'){
				    ?>
				    <td align="center" class="style2 right bottom">&nbsp;<?php  echo get_edu_qualificaqtion($gp[4]); ?></td>
				    <td align="center" class="style2 right bottom">&nbsp;<?php  if($gp[1]=='F '){ echo 'Aalima';}else if($gp[1]=='M '){ echo 'Aalim';} ?></td>
				    
				    <?php
				}
				?>
				<?php 
				if($wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php  if($gp[1]=='F '){ echo 'Female';}else if($gp[1]=='M '){ echo 'Male';} ?></td><?php
				}?>
				<?php 
				if($wanted_data=="gov_help")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo rtrim($gov_helpp,', '); ?></td><?php
				}?>
				<?php 
				if($wanted_data=="Job" || $wanted_data=="MSK")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php if($education!=''){echo $education;}else{echo '-';} ?></td><?php
				}?>
				<?php 
				if($wanted_data=="Marriage")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $govt; ?></td><?php
				}?>
				
				<?php 
				if($wanted_data=="Medical")
				{
				//echo "hehhehhe";
				?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1['disease_details']; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[surgery_details]; ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo val_of_family_name($record1[surgery_details_no]); ?></td>
						<td align="center" class="style2 right bottom">&nbsp;<?php echo $record1[mon_exp_on_medicine]; ?></td>
							<td align="center" class="style2 right bottom ">&nbsp;<?php echo val_of_family_name($record1[mon_exp_on_medicine_no]); ?></td>
					
					
					<?php
				}?>
				<?php 
				if($wanted_data=="MSK")
				{?>
					<td align="center" class="style2 right bottom"><?php if($bussiness_occupation!=''){echo $bussiness_occupation;}else{echo '-';} ?></td><?php
				}?>
				<?php 
				if(($wanted_data=="Own")||($wanted_data=="Rent"))
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $members; ?></td><?php
				}?>
                <td align="center" class="style2 right bottom"><?php echo $contact_no; ?></td>
                <?php 
				if($wanted_data=="Food")
				{?>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $age; ?></td>
					<td align="center" class="style2 right bottom">&nbsp;<?php echo $address; ?></td>
					<td align="left" class="style2 right bottom"></td><?php
				}?>
                <td align="left" class="style2 right bottom"><?php //echo "Apply";?></td>
                
				
	</tr>
	<?php
	    }
	    ?>
		   <?php
         	 
}	
?>
			<?php
			if($wanted_data=='MSK')
			{?>
				<td colspan="8" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td><?php
			}
			
			else
			{?>
				<td colspan="7" align="right" class="style10 style1" >Printed Date :<?php echo $curdate=date('d-m-Y');?></td><?php
			}?>
            
	
     
    </table>
</div>