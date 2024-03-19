<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
//echo "SELECT * FROM join_masjith WHERE join_id='".$_POST['join_id']."'";
$survey = $pdo_conn->prepare("SELECT * FROM join_masjith WHERE join_id='".$_GET['join_id']."'");
$survey->execute();
$record = $survey->fetch();
$service = explode(',',$record['serve_department']);
?>
<div class="page_border">
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
<table width="95%" style="margin:10px 50px 0 20px; font-size:17px">
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
        <td style="font-size:15px; margin-left: 200px;" >மகிழ்ச்சியுடன் சம்மதிக்கிறேன்.</td>
    </tr>
</table>
<hr style="border-top: dotted 1px;" />
<p style="font-size:20px; background-color:black; color: white; width: fit-content; margin:0; border-radius: 10px; margin: 30px 0 20px 250px">சேவைக்குழு உறுப்பினர் படிவம்</p>
<table class="table_border" width="95%" align:"center" style="margin: 0 15px 10px 15px">
    <tr class="table_border">
        <td class="table_border">மாவட்டம் : <?php echo $record['district_name']; ?></td>
        <td class="table_border">தாலுக்கா : <?php echo $record['taluk']; ?></td>
        <td class="table_border">ஊர் :  <?php echo $record['city']; ?></td>
    </tr>
</table>
<table style="margin-left:20px" width="100%">
    <tr>
        <td colspan="2">பெயர் :  <?php echo $record['name']; ?></td>
        <td rowspan="5"><?php if($record['image']==""){
				 echo "No Image"; } else {?><img src="/msk_mobb/img/join_form/<?php echo $record['image']; ?>"width="400" height="200" alt="job image" style="width:30%; float:right; margin-right:20px"><?php } ?>  </td>
    </tr>
    <tr>
        <td colspan="2">தந்தை பெயர்  :  <?php echo $record['father_name']; ?></td>
    </tr>
    <tr>
        <td>வயது :  <?php echo $record['age']; ?></td>
        <td>தொழில் : <?php echo $record['profession']; ?> </td>
    </tr>
    <tr>
        <td colspan="2">முகவரி : <?php echo $record['address']; ?> </td>
    </tr>
    <tr>
        <td colspan="2">Blood Group :  <?php echo $record['taluk']; ?></td>
    </tr>
    <tr>
        <td colspan="2">தொலைபேசி (வாட்ஸ் அப்) :  <?php echo $record['mobile_no']; ?></td>
        <td rowspan="2">கையொப்பம்</td>
    </tr>
    <tr>
        <td colspan="2">E-Mail Id : <?php echo $record['email']; ?></td>
    </tr>
</table>
</div>
<div class="page_border">
<table width="100%">
    <tr>
		<td width="10px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="50px" class="style5"></a></td>
		<td style="font-size:20px">ஏதேனும் ஒரு சேவைக்கு பொறுப்பேற்க</td>
		<td style="font-size:20px"><b>நான் தயார்</b></td>
	</tr>
</table>
<table width="100%" style="margin-left:20px">
    <tr>
        <td width="80%">இரத்த தானம் செய்ய நான் தயார் (இரத்த வகை: )</td>
        <td width="20%"><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>என் வீட்டில் தினசரி அன்புச்சோறு சமைத்து குறைந்தது ஒரு வேளையாவது வறுமை, தனிமை, முதுமையில் வாடும் ஏழைக்கு உணவு வழங்க நான் தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>வேறுயாரவது அன்புச்சோறு சமைத்து வழங்கினால் தினசரி ஏழையின் வீடு தேடி எடுத்து சென்று வழங்க தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>உழைக்க இயலாத குடும்பங்களுக்கு மாதந்தோறும் உணவு வழங்க நான் தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>மக்தப் மதரஸாவிற்கு வராத மாணவர்களை அழைத்து வர நான் தயார்.</td>
        <td><?php if (in_array("magdab_department", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>அரசு மற்றும் தனியார் நிறுவனங்கள் வழங்கும் கல்வி உதவி தொகை பெற்று தர</td>
        <td><?php if (in_array("educational", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>நமது முஹல்லாவை சார்ந்த அனைத்து சமுதாயத்திற்கும் இலவசமாக டியூஷன் நடத்த</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>படிப்பை பாதியில் விட்டவர்களுக்கு தொழில் கல்வி கற்றுத்தர நான் தயார்.</td>
        <td><?php if (in_array("school_leavers", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>நமது முஹல்லாவில் மரங்களை வளர்க்க நான் தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>வட்டியில்லா வங்கி நடத்த நான் தயார்.</td>
        <td><?php if (in_array("non_interest", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>மது அடிமைகள் மறுவாழ்வு பெறுவதற்காக நான் தயார்.</td>
        <td><?php if (in_array("alcohol_addicts", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>நிஸ்வான் மதரசாவில் மாணவிகளை சேர்க்க நான் தயார்.</td>
        <td><?php if (in_array("niswan", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>நமது ஊரில் குடிசை தொழில் மூலம் உற்பத்தியாகும் பொருட்களின் விற்பனைக்கு உதவ</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>ஆதரவற்றோர் மற்றும் அனாதைகளுக்கு வழிகாட்ட நான் தயார்.</td>
        <td><?php if (in_array("orphans", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>மருத்துவ வழிகாட்ட நான் தயார்.</td>
        <td><?php if (in_array("medical", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>அரசாங்க உதவிகள் பெற்றுத்தர நான் தயார்.</td>
        <td><?php if (in_array("government", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>வேலை இல்லாதவர்களுக்கு வேலை ஏற்பாடு செய்து தர நான் தயார்.</td>
        <td><?php if (in_array("employment", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>மணமகன், மணமகள் தகவல் மையம் அமைக்க நான் தயார்.</td>
        <td><?php if (in_array("marriage", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>MSK தகவல் மற்றும் சமூக வலைதள பணிகளுக்கு பொறுப்பேற்க (Whatsapp, Youtube, Facebook, MSK APP) நான் தயார்.</td>
        <td><?php if (in_array("public_relations", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>குடும்பப் பிரச்சினைகள் தீர்வதற்கு வழிகாட்ட நான் தயார்.</td>
        <td><?php if (in_array("family", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>நமது ஊரில் உள்ள தனவந்தர்களை சந்திக்க நான் தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>ஆன்மிகவாதிகள், அரசியல் பிரமுகர்கள், வியாபாரிகள், தனவந்தர்கள், சமூக அமைப்புகள், கல்வியாளர்கள் இவர்கள் அனைவரையும் மாதம்தோறும் சந்திக்க வைக்க</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>விளையாட்டுப் பயிற்சி மற்றும் உடற்பயிற்சி வழங்க நான் தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td>MSK வின் அனைத்து பணிகளும் வெற்றி பெறுவதற்கு பிராத்தனை செய்ய நான் தயார்.</td>
        <td><?php if (in_array("", $service)) { echo "Yes"; } else { echo "No"; } ?></td>
    </tr>
    <tr>
        <td><b>இதில் குறிப்பிடாத வேறு சேவைகள் செய்ய விரும்பினால் கீழே எழுதவும்.</b></td>
        <td></td>
    </tr>
    <tr>
        <td><?php if (in_array("public", $service)) { echo "Public Sector "; }
        if (in_array("dua_jama", $service)) { echo "Department of Dua Jama "; }
        if (in_array("quran_pronunciation", $service)) { echo "Quran Pronunciation "; }
        if (in_array("school_maintenance", $service)) { echo "Masjidh maintainence "; }
        if (in_array("information", $service)) { echo "Information and Technology Department "; }
        if (in_array("sponsors", $service)) { echo "Department of Connecting Sponsors "; }
        if (in_array("business", $service)) { echo "Guiding department to start small business "; }
        ?></td>
    </tr>
</table>
</div>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 5px solid #555;
 
}
.page_border {
    border-style: solid;
}
.table_border{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>