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
		<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5" style="float:left" ></a><p align="center" style="padding-top: 30px">MSK மருத்துவ உதவி படிவம்</p></td>
		<td align="center" width="30%">தேதி<br><?php echo $record['entry_date']; ?></td>
	</tr>
</table>
<table width="100%">
    <tr>
        <td width="30%">நோயாளியின் பெயர்</td>
        <td width="30%"><?php echo $record['patient_name'] ?></td>
        <td width="10%">வயது</td>
        <td width="30%"><?php echo $record['age'] ?></td>
    </tr>
    <tr>
        <td width="30%">நோய்</td>
        <td width="30%"><?php echo $record['disease_name'] ?></td>
        <td width="10%">செல்</td>
        <td width="30%"><?php echo $record['mobile_no'] ?></td>
    </tr>
    <tr>
        <td width="30%">முகவரி</td>
        <td width="30%" colspan="3"><?php echo $record['address'] ?></td>
    </tr>
    <tr>
        <td width="30%">மஸ்ஜித் சேவைக் குழுவின் பெயர்</td>
        <td width="30%"><?php echo $record['organization_name'] ?></td>
        <td width="10%">ஊர்</td>
        <td width="30%"><?php echo $record['city'] ?></td>
    </tr>
    <tr>
        <td width="30%" rowspan="2">ஒருங்கிணைப்பாளரின் பெயர்</td>
        <td width="30%" rowspan="2"><?php echo $record['coordinator_name'] ?></td>
        <td width="10%">செல்</td>
        <td width="30%"><?php //echo $record['city'] ?></td>
    </tr>
    <tr>
        <td width="10%">E-mail</td>
        <td width="30%" colspan="3"><?php echo $record['email'] ?></td>
    </tr>
    <tr>
        <td width="30%">இணைக்க வேண்டிய ஆவணங்கள்</td>
        <td width="30%" colspan="3"><?php// echo $record['address'] ?></td>
    </tr>
</table>
<table>
    <tr>
        <td width="100%" colspan="3" align="center"><b>கீழ்க்கண்ட வினாக்களுக்கு பதிலளிக்கவும்</b></td>
    </tr>
    <tr>
        <td width="5%">1</td>
        <td width="65%" colspan="2">மஸ்ஜித் சேவை குழு பரிந்துரை கடிதம் இருக்கிறதா?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">2</td>
        <td width="65%" colspan="2">மருத்துவ அறிக்கை இருக்கிறதா?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">3</td>
        <td width="65%" colspan="2">மருத்துவரின் ஆலோசனை என்ன?
அறுவை சிகிச்சையா (அ.சி) ? / மருந்து மாத்திரையா (ம.மா)?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">4</td>
        <td width="65%" colspan="2">அறுவை சிகிச்சைக்கு மருத்துவர் கூறிய தொகை எவ்வளவு ரூபாய்?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">5</td>
        <td width="65%" colspan="2">உங்களிடம் இருக்கும் தொகை எவ்வளவு ரூபாய்?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">6</td>
        <td width="65%" colspan="2">முதலமைச்சரின் விரிவான மருத்துவக் காப்பீட்டுத் திட்ட அட்டை இருக்கிறதா?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">7</td>
        <td width="65%" colspan="2">இல்லையென்றால் எடுத்துக்கொண்டு வர இயலுமா?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">8</td>
        <td width="65%" colspan="2">தமிழ்நாட்டில் உள்ள எந்த மருத்துவமனைக்கும் செல்ல தயாரா?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">9</td>
        <td width="65%" colspan="2">உங்களால் ஞாயிற்றுக்கிழமை தவிர எந்த தேதி. கிழமை & நேரத்தில் மருத்துவரை சந்திக்க இயலும்?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">10</td>
        <td width="65%" colspan="2">இயன்றவரை தனியார் மருத்துவமனையில் வைத்தியம் செய்யப்படும்</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">11</td>
        <td width="65%" colspan="2">இயலாவிடில் அரசு மருத்துவமனையில் வைத்தியம் செய்யப்படும். சம்மதமா?</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">12</td>
        <td width="65%" colspan="2">நோயாளியின் கையெழுத்து</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">13</td>
        <td width="65%" colspan="2">மஸ்ஜித் சேவைக்குழு ஒருங்கிணைப்பாளரின் கையெழுத்து</td>
        <td width="30%"></td>
    </tr>
</table>
<style>
table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
<?php
exit;
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
<style>
table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>