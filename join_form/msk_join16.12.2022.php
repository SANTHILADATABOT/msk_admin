<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
//echo "SELECT * FROM join_masjith WHERE join_id='".$_POST['join_id']."'";
$survey = $pdo_conn->prepare("SELECT * FROM join_masjith WHERE join_id='".$_GET['join_id']."'");
$survey->execute();
$record = $survey->fetch();
?>
<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
		<td width="20px" rowspan="3"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5" style="margin:10px 0 0 70px" ></a></td>
		<td align="center" style="font-size:10px">பிஸ்மில்லா ஹிர்ரஹ்மா னிர்ரஹீம்</td>
	</tr>
	<tr>
		<td align="center" style="font-size:40px">MASJIDH SEVAI KUZHU</td>
	</tr>
	<tr>
		<td align="center" style="font-size:20px">மஸ்ஜித்சேவைக்குழு</td>
	</tr>
</table>
<table width="80%" align="center" style="border:1px solid black; margin-top:10px">
    <tr>
        <td style="font-size:20px" align="center">தயவு செய்து உறுப்பினராக இணையுங்கள்</td>
    </tr>
    <tr>
        <td style="font-size:20px" align="center"><b>“நீங்கள் தான் இந்த உம்மத்துக்கு தேவை”</b></td>
    </tr>
</table>
<table width="100%" style="margin:10px 20px 0 20px; font-size:20px">
    <tr>
        <td><li style="list-style-type: square;">அல்லாஹ்வின் மீது மட்டும் நம்பிக்கை வைத்து நற்காரியங்கள் செய்கிறவர்கள்.</li></td>
    </tr>
    <tr>
        <td><li style="list-style-type: square;">சமூகப்பணியாற்றுவதன் மூலமாக புகழ் அனைத்தும் அல்லாஹ்வுக்கும், அல்லாஹ்வுடைய மஸ்ஜிதுக்கும் சேர வேண்டும் என்று எண்ணுகிறவர்கள்.</li></td>
    </tr>
    <tr>
        <td><li style="list-style-type: square;">கோபத்தை வென்ற பொறுமையாளர்கள் மற்றும் சகிப்பு தன்மை உடையவர்கள்.</li></td>
    </tr>
    <tr>
        <td><li style="list-style-type: square;">முஸ்லிம் சமூகம் நபி வழியில் மஸ்ஜிதை மையமாக வைத்து ஒன்றுபட வேண்டும் என்பதில் நிலைத்து இருப்பவர்கள்.</li></td>
    </tr>
    <tr>
        <td><li style="list-style-type: square;">வாக்குறுதியை நிறைவேற்றுவதில் உறுதியுடன் இருப்பவர்கள்.</li></td>
    </tr>
    <tr>
        <td><li style="list-style-type: square;">தங்களால் இயன்ற தான-தர்மங்களை செய்பவர்களும், தான-தர்மங்கள் செய்ய இயலவில்லையென்றாலும், மக்களை தான-தர்மங்கள் செய்ய தூண்டுபவர்களும் இந்த மஸ்ஜித் சேவைக் குழுவில் உறுப்பினராக இணையுங்கள்.</li></td>
    </tr>
    <tr>
        <td><li style="list-style-type: square;">குறைகளை ஆலோசனைக் கூட்டத்தில் கூறுங்கள். நிறைகளை அனைவரிடமும் கூறுங்கள்.</li></td>
    </tr>
    <tr>
        <td align="center" style="font-size:15px">அல்லாஹ் போதுமானவன்!</td>
    </tr>
    <tr>
        <td align="right" style="font-size:15px;" >மகிழ்ச்சியுடன் சம்மதிக்கிறேன்.</td>
    </tr>
</table>
<hr style="border-top: dotted 1px;" />
<p style="font-size:20px; background-color:black; color: white; width: fit-content; margin:0; border-radius: 10px; margin: 30px 0 20px 250px">சேவைக்குழு உறுப்பினர் படிவம்</p>
<table class="table_border" width="95%" align:"center" style="margin: 0 15px 10px 15px">
    <tr class="table_border">
        <td class="table_border">மாவட்டம் : </td>
        <td class="table_border">தாலுக்கா : </td>
        <td class="table_border">ஊர் : </td>
    </tr>
</table>
<table style="margin-left:20px">
    <tr>
        <td>பெயர் : </td>
        <td colspan="3"></td>
        <td rowspan="5"></td>
    </tr>
    <tr>
        <td>தந்தை பெயர்  : </td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>வயது : </td>
        <td></td>
        <td>தொழில் : </td>
        <td></td>
    </tr>
    <tr>
        <td>முகவரி : </td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>Blood Group : </td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>தொலைபேசி (வாட்ஸ் அப்) : </td>
        <td colspan="3" rowspan="2"></td>
    </tr>
    <tr>
        <td>E-Mail Id : </td>
    </tr>
</table>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 5px solid #555;
 
}
body {
    border-style: solid;
}
.table_border{
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
			<td align="center" style="font-size:20px"><b>Join Form Report View</b></td>
		</tr>
</table>
<hr>
<div class="form-row">
    <div class="col-5" style="width:50%; float:left">
<table>
<tr>
<td>
<td ><b>Join ID Number :</b><?php echo $record['join_id'] ?></td></td>
</tr>
<tr>
<td><td><b>Age :</b> <?php echo $record['age'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Name :</b> <?php echo $record['name'] ?></td></td>
</tr>
<tr>
<td>
<td><b>Father Name :</b> <?php echo $record['father_name'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>District Name :</b> <?php echo $record['district_name'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Taluk :</b> <?php echo $record['taluk'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> City :</b> <?php echo $record['city'] ?></td>
</td>

</td>
</tr>
<tr>
	<td>
<td><b>Profession :</b><?php echo $record['profession'] ?>
</td>

</td>
</tr>
<tr>
<td>
<td><b>Do you want to pay the amount?(month/year):</b><?php echo $record['pay_amount'] ?>
</td> 
</td>
</tr>
<tr>
<td>
<td><b>Address :
</b><?php echo $record['address'] ?></td> 
</td>
</tr>
<tr>
<td>
<td><b>Mobile Number :</b><?php echo $record['mobile_no'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Email Id:</b><?php echo $record['email'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>The Department you want to serve :</b> <?php echo $record['serve_department'] ?></td>
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
</div>
<div class="col-7" style="width:50%; float:right;">    
<h4 style="text-align:center;">Image</h4>
<p style="text-align:center;">
    <div >
         <?php 
					 if($record['image']=="")
					 echo "No Image Available";
					 else
					 {
						 ?>
    <img src="/msk_mobb/img/join_form/<?php echo $record['image']; ?>"width="auto" height="400" alt="image"   <?php } ?></div></p>
    </div>
    </div>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 5px solid #555;
 
}
body {
    border-style: solid;
}
.table_border{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>