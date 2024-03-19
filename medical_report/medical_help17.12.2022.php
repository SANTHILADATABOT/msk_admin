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
		<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5" style="float:left" ></a><p align="center" style="padding-top: 30px; font-size:25px"><b>MSK மருத்துவ உதவி படிவம்</b></p></td>
		<td align="center" width="30%">தேதி<br><?php echo date('d-m-Y',strtotime($record['entry_date'])); ?></td>
	</tr>
</table>
<table width="100%">
    <tr>
        <td width="35%">நோயாளியின் பெயர்</td>
        <td width="35%"><?php echo $record['patient_name'] ?></td>
        <td width="10%">வயது</td>
        <td width="20%"><?php echo $record['age'] ?></td>
    </tr>
    <tr>
        <td width="35%">நோய்</td>
        <td width="35%"><?php echo $record['disease_name'] ?></td>
        <td width="10%">செல்</td>
        <td width="20%"><?php echo $record['mobile_no'] ?></td>
    </tr>
    <tr>
        <td width="35%">முகவரி</td>
        <td width="30%" colspan="3"><?php echo $record['address'] ?></td>
    </tr>
    <tr>
        <td width="35%">மஸ்ஜித் சேவைக் குழுவின் பெயர்</td>
        <td width="35%"><?php echo $record['organization_name'] ?></td>
        <td width="10%">ஊர்</td>
        <td width="20%"><?php echo $record['city'] ?></td>
    </tr>
    <tr>
        <td width="35%" rowspan="2">ஒருங்கிணைப்பாளரின் பெயர்</td>
        <td width="35%" rowspan="2"><?php echo $record['coordinator_name'] ?></td>
        <td width="10%">செல்</td>
        <td width="20%"><?php echo $record['c_mobile_no'] ?></td>
    </tr>
    <tr>
        <td width="10%">E-mail</td>
        <td width="20%" colspan="3"><?php echo $record['email'] ?></td>
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
        <td width="65%">மஸ்ஜித் சேவை குழு பரிந்துரை கடிதம் இருக்கிறதா?</td>
        <td width="30%"><?php echo $record['recommendation_form'] ?></td>
    </tr>
    <tr>
        <td width="5%">2</td>
        <td width="65%">மருத்துவ அறிக்கை இருக்கிறதா?</td>
        <td width="30%"><?php echo $record['medical_report'] ?></td>
    </tr>
    <tr>
        <td width="5%">3</td>
        <td width="65%">மருத்துவரின் ஆலோசனை என்ன?
அறுவை சிகிச்சையா (அ.சி) ? / மருந்து மாத்திரையா (ம.மா)?</td>
        <td width="30%"><?php echo $record['doctor_advice'] ?></td>
    </tr>
    <tr>
        <td width="5%">4</td>
        <td width="65%">அறுவை சிகிச்சைக்கு மருத்துவர் கூறிய தொகை எவ்வளவு ரூபாய்?</td>
        <td width="30%"><?php echo $record['surgery_amount'] ?></td>
    </tr>
    <tr>
        <td width="5%">5</td>
        <td width="65%">உங்களிடம் இருக்கும் தொகை எவ்வளவு ரூபாய்?</td>
        <td width="30%"><?php echo $record['amount'] ?></td>
    </tr>
    <tr>
        <td width="5%">6</td>
        <td width="65%">முதலமைச்சரின் விரிவான மருத்துவக் காப்பீட்டுத் திட்ட அட்டை இருக்கிறதா?</td>
        <td width="30%"><?php echo $record['medical_insurance_plan_card'] ?></td>
    </tr>
    <tr>
        <td width="5%">7</td>
        <td width="65%">இல்லையென்றால் எடுத்துக்கொண்டு வர இயலுமா?</td>
        <td width="30%"><?php echo $record['bring_it'] ?></td>
    </tr>
    <tr>
        <td width="5%">8</td>
        <td width="65%">தமிழ்நாட்டில் உள்ள எந்த மருத்துவமனைக்கும் செல்ல தயாரா?</td>
        <td width="30%"><?php echo $record['any_hospital_in_tamilnadu'] ?></td>
    </tr>
    <tr>
        <td width="5%">9</td>
        <td width="65%">உங்களால் ஞாயிற்றுக்கிழமை தவிர எந்த தேதி. கிழமை & நேரத்தில் மருத்துவரை சந்திக்க இயலும்?</td>
        <td width="30%"><?php echo $record['will_you_form'] ?></td>
    </tr>
    <tr>
        <td width="5%">10</td>
        <td width="65%">இயன்றவரை தனியார் மருத்துவமனையில் வைத்தியம் செய்யப்படும்</td>
        <td width="30%"><?php echo $record['medical_treatment_private'] ?></td>
    </tr>
    <tr>
        <td width="5%">11</td>
        <td width="65%">இயலாவிடில் அரசு மருத்துவமனையில் வைத்தியம் செய்யப்படும். சம்மதமா?</td>
        <td width="30%"><?php echo $record['government_hospital'] ?></td>
    </tr>
    <tr>
        <td width="5%">12</td>
        <td width="65%">நோயாளியின் கையெழுத்து</td>
        <td width="30%"></td>
    </tr>
    <tr>
        <td width="5%">13</td>
        <td width="65%">மஸ்ஜித் சேவைக்குழு ஒருங்கிணைப்பாளரின் கையெழுத்து</td>
        <td width="30%"></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="70%" colspan="2" align="center"><b>விண்ணப்பம் அனுப்ப வேண்டிய எண்</b></td>
        <td width="30%" align="center"><b>குறைகள் / ஆலோசனைகள்</b></td>
    </tr>
    <tr>
        <td width="10%" align="center"><b>Whatsapp</b></td>
        <td width="50%" align="center">95974 66267</td>
        <td width="40%" align="center">86950 25780</td>
    </tr>
    <tr>
        <td width="10%" align="center"><b>Mobile</b></td>
        <td width="50%" align="center">86957 25780</td>
        <td width="40%" align="center">98427 25780</td>
    </tr>
    <tr>
        <td width="10%" align="center"><b>E-Mail</b></td>
        <td width="50%" align="center">msk5780@gmail.com</td>
        <td width="40%" align="center">syed5780@gmail.com</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td align="center"><b>நிபந்தனைகள்</b></td>
    </tr>
    <tr>
    <td>1. மஸ்ஜித் சேவைக்குழு அமைக்கப்பட்ட மஹல்லா மக்களுக்கு மட்டுமே வழிகாட்ட இயலும்.</td>
    </tr>
    <tr>
        <td>2. தரமான மற்றும் மிகவும் குறைவான தொகையில் சிகிச்சை மட்டும் வழங்கப்படும். நிதி வழங்க இயலாது.</td>
    </tr>
    <tr>
        <td>3. மருத்துவரால் கால அவகாசம் வழங்கப்பட்ட அறுவை சிகிச்சைக்கு மட்டுமே வழிகாட்ட இயலும். அவசர சிகிச்சை மற்றும் விபத்து போன்றவற்றுக்கு வழிகாட்ட இயலாது.</td>
    </tr>
    <tr>
        <td>4. உங்கள் மஸ்ஜித் சேவைக்குழு ஒருங்கிணைப்பாளர் தொலைபேசி எண் / மஸ்ஜித் சேவைக்குழு மின்னஞ்சல் வழியாக மட்டுமே எங்களை தொடர்பு கொள்ளவும்.</td>
    </tr>
    <tr>
        <td>5. உங்களின் முறையான விண்ணப்பம் எங்களை அடைந்தவுடன் உங்கள் ஒருங்கிணைப்பாளருக்கு மருத்துவரை சந்திக்க முன் அனுமதி டோக்கன் அனுப்பப்படும். குறித்த நேரத்தில் கட்டாயம் நோயாளி மருத்துவரை சந்திக்க வேண்டும். மருத்துவரை நோயாளி சந்திக்க தவறும் பட்சத்தில் மருத்துவர்கள் மத்தியில் உள்ள மஸ்ஜித் சேவைக்குழுவின் நற்பெயரை இழக்க நேரிடும்.</td>
    </tr>
    <tr>
        <td>6. மஸ்ஜித் சேவைக்குழு என்பது திக்கற்றவர்களின் திசை வழியறியாதவர்களுக்கு மட்டுமே வழிகாட்ட இயலும். உறவினர்கள் மூலமாக நண்பர்கள் மூலமாக வழியறிந்தவர்கள் எங்களை தயவு செய்து தவிர்க்கவும்.</td>
    </tr>
</table>
<table width="100%">
    <td width="40%">
        Masjidh Name : <?php echo $record['school_name'] ?>
    </td>
    <td width="30%">
        Masjidh Imam <br>
        Name : <?php echo $record['signature_name'] ?><br>
        Cell : <?php echo $record['signature_mobile'] ?>
    </td>
    <td width="40%">
        Masjidh President <br>
        Name : <?php echo $record['muththavalli_signature_name'] ?><br>
        Cell : <?php echo $record['muththavalli_signature_mobile'] ?>
    </td>
</table>
<br>
<table width="100%" cellspacing="5%" cellpadding="5%">
    <tr>
        <td colspan="5">Images</td>
    </tr>
    <tr>
        <td><?php 
				 if($record['image1']=="")
				 echo "No Image";
				 else
				 {
			 ?>
			 
            <img src="/msk_mobb/img/medical_help/<?php echo $record['image1']; ?>"width="175" height="auto" alt="medical image">   
           
            <?php } ?></td>
        <td><?php 
				 if($record['image2']=="")
				 echo "No Image";
				 else
				 {
			 ?>
            <img src="/msk_mobb/img/medical_help/<?php echo $record['image2']; ?>"width="175" height="auto" alt="medical image">   
            <?php } ?></td>
        <td><?php 
				 if($record['image3']=="")
				 echo "No Image";
				 else
				 {
			 ?>
            <img src="/msk_mobb/img/medical_help/<?php echo $record['image3']; ?>"width="175" height="auto" alt="medical image">   
            <?php } ?></td>
        <td><?php 
				 if($record['image4']=="")
				 echo "No Image";
				 else
				 {
			 ?>
            <img src="/msk_mobb/img/medical_help/<?php echo $record['image4']; ?>"width="175" height="auto" alt="medical image">   
            <?php } ?></td>

        <td><?php 
				 if($record['image5']=="")
				 echo "No Image";
				 else
				 {
			 ?>
            <img src="/msk_mobb/img/medical_help/<?php echo $record['image5']; ?>"width="175" height="auto" alt="medical image">   
            <?php } ?></td>
    </tr>
</table>



<style>
table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>