<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE matrimonial_id='".$_GET['matrimonial_id']."'");
$survey->execute();
$record = $survey->fetch();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
		<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
		<td width="60%" align="center">MASJIDH SEVAI KUZHU<br>
		மஸ்ஜித் சேவைக்குழு<br>
		தேசிய தலைமையகம்: 582-A, காவேரி ரோடு,<br>
		ஈரோடு-638003.<br>
		PH-0424-2212244 <i class="bi bi-whatsapp"></i> 86950-25780,98427-25780<br>
		<i class="bi bi-facebook"></i> MSK-MASJIDH SEVAI KUZHU <i class="bi bi-youtube"></i> MASJIDH SEVAI KUZHU</td>
		<td align="center" width="30%">மணமகன் / மணமகள் <br>தகவல்<br>MATRIMONIAL INFORMATION</td>
	</tr>
</table>
<table width="100%">
    <tr>
        <td width="30%">ID Number</td>
        <td width="70%" colspan="3"><?php echo $record['id_number'] ?></td>
    </tr>
    <tr>
        <td width="30%">DOB</td>
        <td width="20%"><?php echo $record['dob'] ?></td>
        <td width="30%">Age</td>
        <td width="20%"><?php echo $record['age'] ?></td>
    </tr>
    <tr>
        <td width="30%">Gender</td>
        <td width="70%" colspan="2"><?php echo $record['gender'] ?></td>
        <td rowspan='6'><?php 
					 if($record['image1']=="")
					 echo "No Image Available";
					 else
					 {
						 ?>
    <img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image1']; ?>"width="200" height="auto" alt="matrimony image"   <?php } ?></td>
    </tr>
    <tr>
        <td width="30%">Height</td>
        <td width="70%" colspan="2"><?php echo $record['height'] ?></td>
    </tr>
    <tr>
        <td width="30%">Weight</td>
        <td width="70%" colspan="2"><?php echo $record['weight'] ?></td>
    </tr>
    <tr>
        <td width="30%">Colour</td>
        <td width="70%" colspan="2"><?php echo $record['color'] ?></td>
    </tr>
    <tr>
        <td width="30%">Mother Tongue</td>
        <td width="70%" colspan="2"><?php echo $record['mother_tongue'] ?></td>
    </tr>
    <tr>
        <td width="30%">Deeniyath Knowledge & Practice</td>
        <td width="70%" colspan="2"><?php echo $record['tiniyat_scholarship'] ?></td>
    </tr>
    <tr>
        <td width="30%">Education Qualification</td>
        <td width="70%" colspan="3"><?php echo $record['education_qualification'] ?></td>
    </tr>
    <tr>
        <td width="30%">Brother</td>
        <td width="20%"><?php echo $record['brother'] ?></td>
        <td width="30%">Unmarried Brother</td>
        <td width="20%"><?php echo $record['unmarried_brother'] ?></td>
    </tr>
    <tr>
        <td width="30%">Sister</td>
        <td width="20%"><?php echo $record['sister'] ?></td>
        <td width="30%">Unmarried Sister</td>
        <td width="20%"><?php echo $record['unmarried_sister'] ?></td>
    </tr>
    <tr>
        <td width="30%">Are you a Worker?</td>
        <td width="70%" colspan="3"><?php echo $record['worker'] ?></td>
    </tr>
    <tr>
        <td width="30%">If yes</td>
        <td width="70%" colspan="3"><?php echo $record['if_worker'] ?></td>
    </tr>
    <tr>
        <td width="30%">Monthly Income</td>
        <td width="70%" colspan="3"><?php echo $record['monthly_income'] ?></td>
    </tr>
    <tr>
        <td width="30%">Marital Status</td>
        <td width="70%" colspan="3"><?php echo $record['marital_status'] ?></td>
    </tr>
    <tr>
        <td width="30%">Passed Away</td>
        <td width="70%" colspan="3"><?php echo $record['passed_away'] ?></td>
    </tr>
    <tr>
        <td width="30%">Father's Profession</td>
        <td width="70%" colspan="3"><?php echo $record['father_profession'] ?></td>
    </tr>
    <tr>
        <td width="30%">Are you Handicapped?</td>
        <td width="70%" colspan="3"><?php echo $record['handicapped'] ?></td>
    </tr>
    <tr>
        <td width="30%">If yes, describe</td>
        <td width="70%" colspan="3"><?php echo $record['if_handicapped'] ?></td>
    </tr>
    <tr>
        <td width="30%">Expectation</td>
        <td width="70%" colspan="3"><?php echo $record['expectation'] ?></td>
    </tr>
    <tr>
        <td width="30%">Hint</td>
        <td width="70%" colspan="3"><?php echo $record['hint'] ?></td>
    </tr>
    <tr>
        <td width="30%">Date</td>
        <td width="70%" colspan="3"><?php echo $record['date'] ?></td>
    </tr>
    <tr>
        <td width="30%">Signature</td>
        <td width="70%" colspan="3"><?php //echo $record['date'] ?></td>
    </tr>
    <tr>
        <td width = "100%" colspan="4">We bear witness to God that all the information given by them is true and that the bridegroom/bride is religious and moral.</td>
    </tr>
    <tr>
        <td width="40%" colspan="">
            Masjidh Name : <?php echo $record['school_name'] ?>
        </td>
        <td width="30%" colspan="">
            Masjidh Imam Signature<br>
            Name : <?php echo $record['signature_name'] ?><br>
            Cell : <?php echo $record['signature_mobile'] ?>
        </td>
        <td width="40%" colspan="2">
            President Signature<br>
            Name : <?php echo $record['muththavalli_signature_name'] ?><br>
            Cell : <?php echo $record['muththavalli_signature_mobile'] ?>
        </td>
    </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
		<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
		<td width="60%" align="center">MASJIDH SEVAI KUZHU<br>
		மஸ்ஜித் சேவைக்குழு<br>
		தேசிய தலைமையகம்: 582-A, காவேரி ரோடு,<br>
		ஈரோடு-638003.<br>
		PH-0424-2212244 <i class="bi bi-whatsapp"></i> 86950-25780,98427-25780<br>
		<i class="bi bi-facebook"></i> MSK-MASJIDH SEVAI KUZHU <i class="bi bi-youtube"></i> MASJIDH SEVAI KUZHU</td>
		<td align="center" width="30%">மணமகன் / மணமகள் <br>தகவல்<br>MATRIMONIAL INFORMATION</td>
	</tr>
</table>
<table width="100%">
    <tr>
        <td width="30%">ID Number</td>
        <td width="70%" colspan="3"><?php echo $record['id_number'] ?></td>
    </tr>
    <tr>
        <td width="30%">Name</td>
        <td width="70%" colspan="3"><?php echo $record['name'] ?></td>
    </tr>
    <tr>
        <td width="30%">Father's Name</td>
        <td width="70%" colspan="3"><?php echo $record['father_name'] ?></td>
    </tr>
    <tr>
        <td width="30%">Mother's Name</td>
        <td width="70%" colspan="3"><?php echo $record['mother_name'] ?></td>
    </tr>
    <tr>
        <td width="30%">Full Address</td>
        <td width="70%" colspan="3"><?php echo $record['address'] ?></td>
    </tr>
    <tr>
        <td width="30%">Mobile Number</td>
        <td width="20%"> <?php echo $record['mobile_no'] ?></td>
        <td width="30%">Whatsapp Number</td>
        <td width="20%"> <?php echo $record['whatsapp_no'] ?></td>
    </tr>
    <tr>
        <td width="30%">Email</td>
        <td width="70%" colspan="3"><?php echo $record['email'] ?></td>
    </tr>
    <tr>
        <td width="30%">Mohalla's Name</td>
        <td width="70%" colspan="3"><?php echo $record['mohalla_name'] ?></td>
    </tr>
</table>
<br>
<?php 
					 if($record['image2']==""){
					 echo "No Image Available";
					 }
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image2']; ?>"width="400" height="auto" alt="staff image"/>
                    <?php } ?>
	
<!--<div class="form-row">-->
<!--    <div class="col-5" style="width:50%; float:left">-->
<!--<table>-->


<!--<tr>-->
<!--	<td>-->
<!--<td> <b>Place :</b> </td><td><?php echo $record['place'] ?></td>-->
<!--</td>-->
<!--</tr>-->


<!--<td>-->




<!--<tr>-->
<!--<td>-->
<!--	<td><b>Enumerator Name:</b></td><td><?php //echo ($record['enumerator_name']); ?>-->
<!--	</td>-->
<!--	<td><b>Enumerator Mobile No:</b></td><td><?php //echo ($record['enumerator_phone']); ?>-->
<!--	</td>-->
<!--</td>-->
<!--</tr>-->

<!--</table>-->
<!--</div>-->


<!-- </div>-->
    
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 500px) {
  .column {
    width: 100%;
  }
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 5px solid #555;
 
}
table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
td{
    height: 30px;
}

</style>