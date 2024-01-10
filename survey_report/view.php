
<style>
    .center {
  margin-left: auto;
  margin-right: auto;
}

</style>
<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE survey_id='".$_GET['survey_id']."' ");
$survey->execute();
$record = $survey->fetch();
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
$s_noo=0;
$sk=0;
?>
<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td align="center" style="font-size:20px"><b>Survey Report View</b></td>
		</tr>
</table>
<hr>	
<table>


<tr>
<td>
<td><b>Family No :</b></td><td> <?php echo $record['family_no'] ?></td>
<td><b>Mohalla No: </b></td> <td><?php echo $record['mohalla_no'] ?><?php if($record['mohalla_no']=='Yes / ஆம்'){ echo "-".$record['mohalla_no_inpt'] ;} ?></td>
</td>
</tr>
<tr>
<td>
<td></td>
<td></td>
<td></td>
</td>
</tr>

<tr>
<td>
<td><b>Door no :</b></td><td><?php echo $record['door_no'] ?></td>
<td><b>Street Name :</b></td><td> <?php echo $record['street_name'] ?></td>
<td><b>City :</b></td><td> <?php echo $record['nagar'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Date :</b></td><td> <?php echo $record['date'] ?></td>
<td><b>Contact No :</b></td><td> <?php echo $record['contact_no'] ?></td>
<td><b>Mother Tongue :</b></td><td> <?php echo $record['mother_tongue'] ?><?php if($record['mother_tongue']=="Other / பிற மொழிகள்")  { echo "-".$record['language_input']; } ?></la</td>
</td>
</tr>
<tr>
<td>
<td><b> Ration Card No :</b></td><td>  <?php echo $record['ration_card_no'] ?><?php if($record['ration_card_no']=='Yes / ஆம்'){ echo "-".$record['ration_no_inpt'] ;} ?></td> 
<td><b>House :</b></td>
<td> <?php echo $record['house'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Availability of Toilet?:</b></td> 
<td><?php echo $record['bathroom_availability'] ?></td>
</td>
</tr>
<td width="20px"></td>
<td ><b></b></td>
</tr>
<td width="20px"></td>
<td  style="font-size:20px;color: green;"><b><u>Family Members Details</u></b></td>
</tr>
<tr>
</tr>
<td width="20px"></td>
<td ><b></b></td>
</tr>
<?php 
$survey2_sub_det=$pdo_conn->prepare("SELECT * From fact_finding_subform  where random_no='".$record['unique_no']."'  ");
$survey2_sub_det->execute();
$fet_sub_det=$survey2_sub_det->fetchAll();

foreach($fet_sub_det as $sur2_val)
{

    $s_noo++;
   $sur2_val['family_head_name'];
?>

<tr>
<td>
<td><b><?php echo $s_noo.".";?>Family Member Name :</b></td><td> <?php echo $sur2_val['family_head_name'];?></td>
<td><b>Gender:</b> </td><td> <?php echo $sur2_val['gender'] ?></td>
<td><b>Age :</b></td><td> <?php echo $sur2_val['age'] ?></td>

</td>
</tr>

<tr>
<td>
<td><b>Relationship :</b></td><td> <?php echo get_relationship($sur2_val['relationship']); ?></td>

<td><b>Education Qualification :</b> </td><td>
    
    <?php if($sur2_val['edu_qualification']){ echo get_edu_qualificaqtion($sur2_val['edu_qualification']); }

 else{ echo $sur2_val['educ_qualification_inp']; } ?> </td>

<td><b>Marital Status </b></td><td> <?php echo $sur2_val['marital_status'] ?></td>

</td>
</tr>
<tr>
<td>
<td><b>Voter id :</b></td><td><?php echo $sur2_val['voter_id'] ?><?php if($sur2_val['voter_id']=='Yes / ஆம்'){ echo "-".$sur2_val['voter_id_in'] ;} ?></td>
<td><b>Aadhaar No  :</b></td><td> <?php echo $sur2_val['aadharr_id'] ?><?php if($sur2_val['aadharr_id']=='Yes / ஆம்'){ echo "-".$sur2_val['aadharr_id_in']; } ?></td>
<td><b> Occupational Details/Education :  :</b></td><td> <?php echo $sur2_val['bussiness_occupation'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Work Location :</b></td><td> <?php echo $sur2_val['work_location'] ?></td>
<td><b>Blood Group :</b></td><td> <?php echo get_blood_group($sur2_val['blood_group']); ?></td>
<td><b>  Children Interested in Makthab Madrasa (Age 4-15) :</b></td><td><?php echo $sur2_val['child_interest'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b> Interested in Makthab Madrasa (Adult):</b></td><td> <?php echo $sur2_val['maqtab_interest'] ?></td>
<td> <b>Interested in Aalim Hifz Course  :</b> </td><td><?php echo $sur2_val['allin_hifz_course'] ?></td>
<td> <b>Interested in Niswan :</b></td><td> <?php echo $sur2_val['interest_in_niswan'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b> Family Women interested in 1-year Muslim Course :</b></td><td> <?php echo $sur2_val['family_women_interest_in_1yr_muslim_course'] ?></td>
</td>
</tr>
<?php } ?>

<tr>
<td>

<td><b>Old Age Pension :</b></td><td> <?php echo $record['old_age_pension'] ;?></td>
<td><b>Deserted Women pension :</b></td><td> <?php echo $record['deserted_women_pension']; ?></td>

</td>
</tr>
<tr>
<td>
<td><b>Marriage help :</b> </td><td><?php echo $record['marriage_help'] ?></td>
<td><b>Disability Pension :</b></td><td> <?php echo $record['disability_pension'] ?></td>
<td><b>Widow / Aged unmarried welfare :</b></td><td> <?php echo $record['widow_aged_welfare'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Destitute / Orphan welfare :</b> </td><td><?php echo $record['destitute_orphan_welfare'] ?></td>
<td><b>Incapable of working :</b></td><td> <?php echo $record['incapable_of_working'] ?></td>
<td><b>Ulama welfare card Details:</b></td><td> <?php echo $record['ulama_welfare_card_details'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>ulama welfare card :</b></td><td> <?php echo $record['ulama_welfare_card'] ?></td>
<td><b>Others Details :</b></td><td> <?php echo $record['other_details_1_entry'] ?></td>
<td><b>Other Details:</b></td><td> <?php echo $record['other_details_1'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Incapable of working :</b></td><td> <?php echo $record['other_details_1'] ?></td>


<td><b>Higher Education Guidance :</b></td> <td><?php echo $record['higher_edu_guide'] ?></td>
<td><b>Financial Support for Education :</b></td><td> <?php echo $record['fin_support_for_edu'] ?></td>
</td>
</tr>
	<tr>
<td>
<td><b>School Dropouts Interested in Employment :</b></td><td> <?php echo $record['school_dropouts_interest_in_emp'] ?></td>

<td><b>Pre-Matric Scholarship  :</b></td><td> <?php echo $record['pre_matric_scholarship'] ?></td>
<td><b>Post_Matric Scholarship : </b></td><td><?php echo $record['post_matric_scholarship'] ?></td>
</td>
	</tr>
	<tr>
<td>
<td><b>Guidance for Employment :</b></td><td> <?php echo $record['guide_for_emp'] ?></td>
<td><b>Others Details Entry :</b></td><td> <?php echo $record['other_details_2'] ?></td>
<td><b>Others Details  :</b> </td><td><?php echo $record['other_details_entry2'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Family Counselling :</b></td><td> <?php echo $record['family_counselling'] ?></td>
<td><b>Nikkah Counselling :</b></td><td> <?php echo $record['nikkah_counselling'] ?></td>


<td>
<b>Entrepreneurship Counselling :</b></td>
<td>
 <?php echo $record['entrepreneur_counselling'] ?></td>

</td>
</tr>
	<tr>
		<td>
<td><b>
Business Counselling :</b></td>
<td>
 <?php echo $record['business_counselling'] ?></td>


	
		<td><b>
Skill Development Guidance & Training :</b></td>
<td>
 <?php echo $record['guide_for_skill_develop'] ?></td>

<td><b>
Rehabilitation Counselling for Addicts :</b> </td>
<td>
<?php echo $record['rehabilitation_counselling'] ?></td>
</td>
</tr>
	<tr>
<td>
<td>
	<b>
 Suffering due to Interest based loan :</b></td><td>

 <?php echo $record['suffer_from_interest_loan'] ?></td>



<td> <b>Details about the Guidance & Counselling :</b></td><td> <?php echo $record['suffer_from_interest_loan'] ?></td>
<td><b> Suffering due to Interest based loan :</b></td><td> <?php echo $record['guide_counselling_full_details'] ?></td>
</td>
</tr>
	<tr>
<td>
<td><b>Others :</b></td><td> <?php echo $record['other_details_3'] ?></td>

</td>
</tr>
<td width="20px"></td>
<td  style="font-size:20px;color: green;"><b><u>Disease Details</u></b></td>
</tr>
		
</tr>
<?php 
$togg_survey_sub_disease=$pdo_conn->prepare("SELECT * From fact_family_disease  where unique_no='".$record['unique_no']."'  ");
$togg_survey_sub_disease->execute();
$survey6_sub_disease=$togg_survey_sub_disease->fetchAll();

foreach($survey6_sub_disease as $val_disease)
{
$sk++;
    
$monthly_family_members_name=val_of_family_name($val_disease['mon_exp_on_medicine_no']);
$surgical_family_members_name=val_of_family_name($val_disease['surgery_details_no']);
?>
    
<tr>
<td>
<td><b><?php echo $sk.".";?>Disease Details :</b></td><td> <?php echo $val_disease['disease_details'] ?></td>
<td> <b>Monthly Exp on Medicine :</b></td><td> <?php echo $val_disease['mon_exp_on_medicine'] ?></td>
<td><b>Monthly Expenditure :</b></td><td> <?php echo $monthly_family_members_name; ?></td>
</td>
</tr>
<tr>    
<td>
<td><b>Surgery Details (Hospital Cost, Cash in Hand) :</b></td><td> <?php echo $val_disease['surgery_details'] ?></td>
<td><b> Surgery Details :</b></td><td><?php echo $surgical_family_members_name; ?></td>
</td>
</tr>
<?php } ?>
<tr><td>
 <td><b>Have you recoverd from any chronic diseases? If yes, Details of Doctor & Cost of treatment (This is for Guiding others) :</b></td>
 <td> <?php echo $record['recovered_from_chronic_details'] ?></td>
<td><b>Availability of Govt.Health Insurance Card :</b></td><td> <?php echo $record['govt_insurance_card_avail'] ?></td>
</td>
</tr>
	<tr>
<td>
<td> <b>Are you willing to financially help those who are suffering in your Mohalla? :</b></td><td>  <?php echo $record['willing_to_help_in_mohalla_no'] ?><?php if($record['willing_to_help_in_mohalla']!=''){ echo "-".$record['willing_to_help_in_mohalla'];}?></td>

<td><b>Are you Interested to serve in the Mohalla Sevai Kuzhu? : </b></td><td><?php if($record['interest_to_serve_msk_no']!='') { echo $record['interest_to_serve_msk_no'];}?>
<?php if($record['interest_to_serve_msk']!='') { echo "-".$record['interest_to_serve_msk'];}?>
<?php if($record['interested_to_serve']!='') { echo "-".$record['interested_to_serve'];}?></td>
</td>
</tr>
	<tr>
<td>
<td><b>Emergency :</b> </td><td><?php echo $record['emergency'] ?></td>
<td><b>Emergency Needed Person:</b> </td><td><?php echo $record['emergency_no'] ?></td>
<td><b>Family member who provided information :</b></td><td> <?php echo $record['information_provided_by'] ?><td>
</td>
</tr>

	<tr>
<td>
<td><b>Family's Economic Status:</b> </td><td><?php echo $record['economic_status'] ?></td>
</td>
</tr>

<tr>
	<td>
		<td><b>Country Name:</b></td><td><?php echo get_country_name($record['country_id']);?></td>
		<td><b>State Name:</b></td><td><?php echo get_state_name($record['state_id']);?></td>
		<td><b>District Name:</b></td><td><?php echo get_district_name($record['district_id']);?></td>
		
</td>
</tr>
<tr>
	<td>
	<td><b>City Name:</b></td><td><?php echo get_city_name($record['city_id']); ?>
	</td>
	</td>
</tr>

<tr>
<td>
	<td><b>Enumerator Name:</b></td><td><?php echo ($record['enumerator_name']); ?>
	</td>
	<td><b>Enumerator Mobile No:</b></td><td><?php echo ($record['enumerator_phone']); ?>
	</td>
</td>
</tr>
<!-- <tr>
	<td><b>Emergency No:</b></td><td><?php echo $record['emergency_no'] ?></td>
	<td>
	</td>
</tr> -->

</table>