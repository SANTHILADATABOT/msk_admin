<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
//echo "SELECT * FROM medical_help WHERE delete_status!='1' $query ORDER BY medical_help_id DESC";

$survey = $pdo_conn->prepare("SELECT * FROM medical_help WHERE medical_help_id  = '$_GET[medical_help_id]'");
$survey->execute();
$record = $survey->fetch();
?>
<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td align="center" style="font-size:20px"><b>Medical Report View</b></td>
		</tr>
</table>
<hr>	
<table>
<tr>
<td>
<td ><b>Patient Name :</b><?php echo $record['patient_name'] ?></td>
<td><b>Age :</b> <?php echo $record['age'] ?></td>

</td>
</tr>

<tr>
<td>
<td><b>Disease Name :</b> <?php echo $record['disease_name'] ?></td>
<td><b>Address :</b> <?php echo $record['address'] ?></td>
</td>
</tr>


<tr>
<td>
<td><b>Mobile Number :</b> <?php echo $record['mobile_no'] ?></td>
<td><b>City :</b> <?php echo $record['city'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Coordiantor Name :</b> <?php echo $record['coordinator_name'] ?></td>
<td><b>Email Id :</b> <?php echo $record['email'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Is This Masjith Service Group Recommendation Form :</b> <?php echo $record['recommendation_form'] ?></td>
<td><b>Is There a Medical Report :</b> <?php echo $record['medical_report'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Doctor's Advice :</b> <?php echo $record['doctor_advice'] ?></td>
<td><b>How much is this doctor's claim for surgery :</b> <?php echo $record['surgery_amount'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>How much do you have? :</b> <?php echo $record['amount'] ?></td>
<td><b>Have the Chief Minister's Comprehensive Medical Insurance Plan Card :</b> <?php echo $record['medical_insurance_plan_card'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>If not,you can ring it :</b> <?php echo $record['bring_it'] ?></td>
<td><b>Ready to go to any hospital in Tamil Nadu:</b> <?php echo $record['any_hospital_in_tamilnadu'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Will you inform us n what day and date at what time to meet doctor except on sundays :</b> <?php echo $record['will_you_form'] ?></td>
<td><b>As fas as possible medical treatment is done in private :</b> <?php echo $record['medical_treatment_private'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>If cant, treatement will be given in Government Hospital Ok :</b> <?php echo $record['government_hospital'] ?></td>

</td>
</tr>

<!--<tr>-->
<!--<td>-->
<!--	<td><b>Enumerator Name:</b></td><td><?php echo ($record['enumerator_name']); ?>-->
<!--	</td>-->
<!--	<td><b>Enumerator Mobile No:</b></td><td><?php echo ($record['enumerator_phone']); ?>-->
<!--	</td>-->
<!--</td>-->
<!--</tr>-->

</table>