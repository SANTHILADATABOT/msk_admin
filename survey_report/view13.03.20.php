sadsad<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE survey_id='".$_POST['survey_id']."'");
$survey->execute();
$record = $survey->fetch();





?>
<label>Family No : <?php echo $record['family_no'] ?></label><br>
<label>Mohalla No : <?php echo $record['mohalla_no'] ?></label><br>
<label>Aadhar No : <?php echo $record['aadhar_no'] ?></label><br>
<label>Door No : <?php echo $record['door_no'] ?></label><br>
<label>Nagar : <?php echo $record['street_name'] ?></label><br>
<label>Date : <?php echo $record['date'] ?></label><br>
<label>Contact No : <?php echo $record['contact_no'] ?></label><br>
<label>Mother Tongue : <?php echo $record['mother_tongue'] ?></label><br>
<label>Ration Card No : <?php echo $record['ration_card_no'] ?></label><br>
<label>House : <?php echo $record['house'] ?></label><br>
<label>Bathroom Availability : <?php echo $record['bathroom_availability'] ?></label><br>
<label>Economic Status : <?php echo $record['economic_status'] ?></label><br>
<label>Gender : <?php echo $record['gender'] ?></label><br>
<label>Age : <?php echo $record['age'] ?></label><br>
<label>Relationship : <?php echo $record['relationship'] ?></label><br>
<label>Education Qualification : <?php echo $record['edu_qualification'] ?></label><br>
<label>Marital Status : <?php echo $record['marital_status'] ?></label><br>
<label>Voter id : <?php echo $record['voter_id'] ?></label><br>
<label>Bussiness Occupation : <?php echo $record['bussiness_occupation'] ?></label><br>

<label>Work Location : <?php echo $record['work_location'] ?></label><br>
<label>Blood Group : <?php echo $record['blood_group'] ?></label><br>
<label> Children (Age 4 to 15) / Adults (Age Above 15) for Maktab : <?php echo $record['for_maktab'] ?></label><br>
<label> Children/ Adults : <?php echo $record['child_adult_for_maktab'] ?></label><br>
<label> Age : <?php echo $record['child_adult_for_maktab_age'] ?></label><br>
<label> Why does he/she miss Maktab? : <?php echo $record['miss_maktab'] ?></label><br>
<label> Interested in Allin Hifz Course : <?php echo $record['allin_hifz_course'] ?></label><br>
<label> Interested in Niswan : <?php echo $record['interest_in_niswan'] ?></label><br>
<label> Family Women interested in 1-year Muslim Course : <?php echo $record['family_women_interest_in_1yr_muslim_course'] ?></label><br>
<label> Interested in Niswan : <?php echo $record['interest_in_niswan'] ?></label><br>
<label>2.Family Member Name: <?php echo $record['family_member_name_2'] ?></label><br>
<label>3.Family Member Name : <?php echo $record['family_member_name_3'] ?></label><br>
<label>4.Family Member Name : <?php echo $record['family_member_name_4'] ?></label><br>
<label>5.Family Member Name : <?php echo $record['family_member_name_5'] ?></label><br>
<label>6.Family Member Name : <?php echo $record['family_member_name_6'] ?></label><br>
<label>7.Family Member Name : <?php echo $record['family_member_name_7'] ?></label><br>
<label>8.Family Member Name : <?php echo $record['family_member_name_8'] ?></label><br>
<label>9.Family Member Name : <?php echo $record['family_member_name_9'] ?></label><br>
<label>Old Age Pension : <?php echo $record['Old Age Pension'] ?></label><br>
<label>Deserted Women pension : <?php echo $record['deserted_women_pension'] ?></label><br>
<label>Marriage help : <?php echo $record['marriage_help_msk'] ?></label><br>
<label>Marriage help : <?php echo $record['marriage_help_radio'] ?></label><br>
<label>Disability Pension : <?php echo $record['disability_pension'] ?></label><br>
<label>Widow / Aged unmarried welfare : <?php echo $record['widow_aged_welfare'] ?></label><br>
<label>Destitute / Orphan welfare : <?php echo $record['destitute_orphan_welfare'] ?></label><br>
<label>Incapable of working : <?php echo $record['incapable_of_working'] ?></label><br>
<label>Ulama welfare card Details: <?php echo $record['ulama_welfare_card_details'] ?></label><br>
<label>ulama welfare card : <?php echo $record['ulama_welfare_card'] ?></label><br>
<label>Others Details : <?php echo $record['other_details_1_entry'] ?></label><br>
<label>Other Details: <?php echo $record['other_details_1'] ?></label><br>
<label>Incapable of working : <?php echo $record['other_details_1'] ?></label><br>
<label>Higher Education Guidance : <?php echo $record['higher_edu_guide'] ?></label><br>
<label>Financial Support for Education : <?php echo $record['fin_support_for_edu'] ?></label><br>
<label>School Dropouts Interested in Employment : <?php echo $record['school_dropouts_interest_in_emp'] ?></label><br>
<label>Pre-Matric Scholarship  : <?php echo $record['pre_matric_scholarship'] ?></label><br>
<label>Post_Matric Scholarship : <?php echo $record['post_matric_scholarship'] ?></label><br>
<label>Guidance for Employment : <?php echo $record['guide_for_emp'] ?></label><br>
<label>Others Details Entry : <?php echo $record['other_details_2'] ?></label><br>
<label>Others Details  : <?php echo $record['other_details_entry2'] ?></label><br>
<label>Family Counselling : <?php echo $record['family_counselling'] ?></label><br>
<label>Nikkah Counselling : <?php echo $record['nikkah_counselling'] ?></label><br>
<label>Entrepreneurship Counselling : <?php echo $record['entrepreneur_counselling'] ?></label><br>
<label>Business Counselling : <?php echo $record['business_counselling'] ?></label><br>
<label>Skill Development Guidance & Training : <?php echo $record['guide_for_skill_develop'] ?></label><br>
<label>Rehabilitation Counselling for Addicts : <?php echo $record['rehabilitation_counselling'] ?></label><br>
<label> Suffering due to Interest based loan : <?php echo $record['suffer_from_interest_loan'] ?></label><br>
<label> Details about the Guidance & Counselling : <?php echo $record['suffer_from_interest_loan'] ?></label><br>
<label> Suffering due to Interest based loan : <?php echo $record['guide_counselling_full_details'] ?></label><br>
<label> Others : <?php echo $record['other_details_3'] ?></label><br>
<label> Disease Details : <?php echo $record['disease_details'] ?></label><br>
<label> Disease Details : <?php echo $record['disease_no'] ?></label><br>
<label> Surgery Details (Hospital Cost, Cash in Hand) : <?php echo $record['surgery_details'] ?></label>
<label>  Surgery Details : <?php echo $record['surgery_details_no'] ?></label><br>
<label> Have you recoverd from any chronic diseases? If yes, Details of Doctor & Cost of treatment (This is for Guiding others) : <?php echo $record['recovered_from_chronic_details'] ?></label><br>
<label> Monthly Expenditure on Medicine : <?php echo $record['mon_exp_on_medicine'] ?></label><br>
<label>Monthly Expenditure : <?php echo $record['mon_exp_on_medicine_no'] ?></label><br>
<label>Availability of Govt.Health Insurance Card : <?php echo $record['govt_insurance_card_avail'] ?></label><br>
<label> Are you willing to financially help those who are suffering in your Mohalla? : <?php echo $record['willing_to_help_in_mohalla'] ?></label><br>
<label> Are you willing to financially help those who are suffering in your Mohalla? : <?php echo $record['willing_to_help_in_mohalla'] ?></label><br>
<label>Are you Interested to serve in the Mohalla Sevai Kuzhu? : <?php echo $record['interest_to_serve_msk_no'] ?></label><br>
<label>Emergency : <?php echo $record['emergency_no'] ?></label><br>
<label>Family member who provided information : <?php echo $record['information_provided_by'] ?></label>
<label></label>