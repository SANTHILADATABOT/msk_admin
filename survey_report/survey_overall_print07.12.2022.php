
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

$wanted_data=$_REQUEST['wanted_data'];
$status=$_REQUEST['status'];

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
	$query='  and ffs.maqtab_interest like "%Yes%" and ffs.age BETWEEN 4 and 15';
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
	$query='   and (higher_edu_guide RLIKE "([a-z]+)" or fin_support_for_edu RLIKE "([a-z]+)")';
}
else
{
	$query='   and guide_for_emp!=""';
}	


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


 $survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC");
 if($wanted_data=='maqtab_child' || $wanted_data=='maqtab_adult' || $wanted_data=='allin_hifz_course'){
 $survey = $pdo_conn->prepare("SELECT * FROM  fact_finding_subform AS ffs INNER JOIN fact_finding_form AS fff ON ffs.random_no = fff.unique_no WHERE ffs.id!='' $query GROUP BY ffs.random_no ORDER BY ffs.id DESC");
 }
 $survey->execute();
 $survey_list = $survey->fetchall();//echo "<pre>";print_r($survey_list);$name = "</pre>";
?>

	

<div id="daybook_report_prints">
	<table width="100%" cellspacing="0" cellpadding="0">
         <tr>
			<td rowspan='3' width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
		<?php 
		if($wanted_data=="Job")
		{?>
			<td align="center" height="37" align="center" class="style5">8. People who need employment</td><?php
		}
		else if($wanted_data=="Marriage")
		{?>
			<td align="center" height="37" align="center" class="style5">4. <?php echo $wanted_data;?> Help / Nikah Information</td><?php
		}
		else if($wanted_data=="Medical")
		{?>
			<td align="center" height="37" align="center" class="style5">2. <?php echo $wanted_data;?> (surgery)</td><?php
		}
		else if($wanted_data=="gov_help")
		{?>
			<td align="center" height="37" align="center" class="style5">10. People who need Government Help<br>Old Age Pension / Destitute Women / Widow / Disabled</td><?php
		}
		else if($wanted_data=="MSK")
		{?>
			<td align="center" height="37" align="center" class="style5">21. MSK Membership Join</td><?php
		}
		else if($wanted_data=="Own")
		{?>
			<td height="37" align="center" class="style5">18. <?php echo $wanted_data;?> House </td><?php
		}
		else if($wanted_data=="Rent")
		{?>
			<td align="center" height="37" align="center" class="style5">19. <?php echo $wanted_data.'ed';?> House </td><?php
		}
		else if($wanted_data=="Bathroom")
		{?>
			<td height="37" align="center" class="style5">13. People who need toilet facility</td><?php
		}
		else if($wanted_data=="Economic")
		{if($status=="A"){?>
			<td height="37" align="center" class="style5">Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="B"){?>
			<td height="37" align="center" class="style5">Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="C"){?>
			<td height="37" align="center" class="style5">Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="D"){?>
			<td height="37" align="center" class="style5">Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else if($status=="E"){?>
			<td height="37" align="center" class="style5">Families <?php echo $wanted_data;?> Status <?php echo $status;?> Category People</td><?php }
			else{?>
			<td height="37" align="center" class="style5">Families <?php echo $wanted_data;?> Status </td><?php }
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
		else if($wanted_data=="Food")
		{?>
			<!--<td align="center" height="37" align="center" class="style5"><?php echo $wanted_data;?> Needy</td>-->
			<td align="center" height="37" align="center" class="style5">1. People who needs food kit</td><?php
		}
		else if($wanted_data=="maqtab_child")
		{?>
			<td align="center" height="37" align="center" class="style5">5. Boys / Girls interested to join maqtab madrasa (4-15 Age)</td><?php
		}
		else if($wanted_data=="maqtab_adult")
		{?>
			<td align="center" height="37" align="center" class="style5">7. People interested to join maktab madarasa (Adults)</td><?php
		}
		else if($wanted_data=="allin_hifz_course")
		{?>
			<td align="center" height="37" align="center" class="style5">6. People who are interested to become Aalim / Aalima</td><?php
		}
		else if($wanted_data=="higher_edu_guide")
		{?>
			<td align="center" height="37" align="center" class="style5">9. Guidance for higher Education / Scholarship</td><?php
		}
		else 
		{?>
			<td height="37" align="center" class="style5">Survey Report Details</td><?php
		}	
		?>
		
		
        </tr>
        
            <?php include('quran.php'); ?>
       
        
        <tr>
            <td></td>
            <td><b>Country : </b><?php echo get_country_name($country_id);?></td>
            <td><b>State : </b><?php echo get_state_name($state_id);?></td>
            <td><b>District : </b><?php echo get_district_name($district_id);?></td>
        </tr>
        
        <tr>
            <td></td>
            <td><b>City : </b><?php echo get_city_name($city_id)?></td>
            <td><b>Area : </b><?php echo get_area_name($area_id);?></td>
        </tr>


	</table>
	<br>
    <table width="100%" cellspacing="0" cellpadding="0">
	
	  <tr>
            <td width="5%" height="27" align="center" class="style10 style4 right"><strong>S.No</strong></td>
            <td width="6%" align="center" class="style10 style4 right"><strong>&nbsp;F.No</strong></td>
			<td width="10%" align="center" class="style10 style4 right"><strong>&nbsp;Name</strong></td>
			<?php 
			if($wanted_data=="Job" || $wanted_data=="Marriage" || $wanted_data=="MSK" || $wanted_data=="gov_help" || $wanted_data=="maqtab_child" || $wanted_data=="maqtab_adult" || $wanted_data=="allin_hifz_course" || $wanted_data=="higher_edu_guide")
			{?>
             <td width="8%" align="center" class="style10 style4 right"><strong>&nbsp;Age</strong></td><?php
			}?>
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
	    $name=$record['interest_to_serve_msk_no'];
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
 $survey_sub = $pdo_conn->prepare("SELECT GROUP_CONCAT(concat(family_head_name, '/', gender, '/', age)) as names FROM fact_finding_subform WHERE random_no='$record[unique_no]' AND age BETWEEN 4 AND 15 AND maqtab_interest LIKE '%Yes%' ORDER BY id DESC");
	}
	else if($wanted_data=='maqtab_adult')
	{
 $survey_sub = $pdo_conn->prepare("SELECT GROUP_CONCAT(concat(family_head_name, '/', gender, '/', age)) as names FROM fact_finding_subform WHERE random_no='$record[unique_no]' AND age > 15 AND maqtab_interest LIKE '%Yes%' ORDER BY id DESC");
	}
	else if($wanted_data=='allin_hifz_course')
	{
 $survey_sub = $pdo_conn->prepare("SELECT GROUP_CONCAT(concat(family_head_name, '/', gender, '/', age, '/', edu_qualification)) as names FROM fact_finding_subform WHERE random_no='$record[unique_no]' AND allin_hifz_course LIKE '%Yes%' ORDER BY id DESC");
	}
        
 $survey_sub->execute();
 $survey_list_sub = $survey_sub->fetchall();//echo "<pre>";print_r($survey_list_sub);echo "</pre>";
 


 
 if(!empty($survey_list_sub))
 { 
         foreach ($survey_list_sub as $record1)
         {

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