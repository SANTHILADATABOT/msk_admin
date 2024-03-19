<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM job_application WHERE job_id='".$_GET['job_id']."'");
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
			<td align="center" style="font-size:20px" width="30%"><p style="font-size:100px; background-color:black; color: white;     margin-top: 20%; width: fit-content; margin:0">JOB</p>APPLICATION FORM</td>
		</tr>
</table>
<table width="100%" >
    <tr>
        <td width="30%">ID NUMBER</td>
        <td width="70%" colspan="3"><?php echo $record['id_no'] ?></td>
    </tr>
    <tr>
        <td width="30%">DOB</td>
        <td width="30%"><?php echo $record['dob'] ?></td>
        <td width="10%">Age</td>
        <td width="30%"> <?php echo $record['age'] ?></td>
    </tr>
    <tr>
        <td width="30%">Gender</td>
        <td width="70%" colspan="3"><?php echo $record['gender'] ?></td>
    </tr>
    <tr>
        <td width="30%">Educational Qaulification</td>
        <td width="70%" colspan="3"><?php echo $record['qualification'] ?></td>
    </tr>
    <tr>
        <td width="30%">Having Previous Experience</td>
        <td width="20%"><?php echo $record['experience'] ?></td>
        <td width="50%" colspan="2">If yes, write down the details</td>
    </tr>
    <tr>
        <td width="100%" colspan="4" height="20px"><?php echo $record['exp_yes1'] ?></td>
    </tr>
    <tr>
        <td width="100%" colspan="4" height="20px"><?php echo $record['exp_yes2'] ?></td>
    </tr>
    <tr>
        <td width="30%">Languages Known</td>
        <td width="70%" colspan="3"><?php echo $record['language'] ?></td>
    </tr>
    <tr>
        <td width="30%">City : <?php echo $record['city'] ?></td>
        <td width="70%" colspan="3">Pincode : <?php echo $record['pincode'] ?></td>
    </tr>
    <tr>
        <td width="30%">Are you a passport holder?</td>
        <td width="70%" colspan="3"><?php echo $record['passport'] ?></td>
    </tr>
    <tr>
        <td width="30%">Marital Status</td>
        <td width="70%" colspan="3"><?php echo $record['marital_status'] ?></td>
    </tr>
    <tr>
        <td width="30%">Driving License Holder?</td>
        <td width="70%" colspan="3"><?php echo $record['license'] ?></td>
    </tr>
    <tr>
        <td width="30%">Area of Interest</td>
        <td width="70%" colspan="3"><?php echo $record['area_of_interest'] ?></td>
    </tr>
    <tr>
        <td width="30%">Expected salary</td>
        <td width="70%" colspan="3"><?php echo "From:  ".$record['from_salary']."  "."To ".$record['to_salary']." Per Month"; ?></td>
    </tr>
    <tr>
        <td width="30%">Are you Physically Challenged?</td>
        <td width="70%" colspan="3"><?php echo $record['physically'] ?></td>
    </tr>
    <tr>
        <td width="30%">If Physically Challenged, mention the disability</td>
        <td width="70%" colspan="3"><?php echo $record['disability']; ?></td>
    </tr>
    <tr>
        <td width="30%">Are you Looking for a Job?</td>
        <td width="70%" colspan="3"><?php echo $record['job'] ?></td>
    </tr>
    <tr>
        <td width="30%">Your Preferred job location</td>
        <td width="70%" colspan="3"><?php echo $record['location'] ?></td>
    </tr>
    <tr>
        <td width="30%">Hobbies</td>
        <td width="70%" colspan="3"><?php echo $record['hobbies'] ?></td>
    </tr>
    <tr>
        <td width="100%" colspan="4">
            We bear God as witness that all the information given by them is true and that they are the best in religion and morals.
        </td>
    </tr>
    <tr>
        <td width="40%" colspan="">
            Masjidh Name : <?php echo $record['school_name'] ?>
        </td>
        <td width="30%" colspan="">
            Masjidh Imam <br>
            Name : <?php echo $record['school_imam_signature'] ?><br>
            Cell : <?php echo $record['signature_mobile'] ?>
        </td>
        <td width="40%" colspan="2">
            Masjidh President <br>
            Name : <?php echo $record['muththavalli_signature'] ?><br>
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
			<td align="center" style="font-size:20px" width="30%"><h1 style="font-size:100px; background-color:black; color: white;     margin-top: 20%; width: fit-content; margin:0">JOB</h1>APPLICATION FORM</td>
		</tr>
</table>
<table width="100%">
                <tr>
                    <td>ID NUMBER</td> 
                    <td colspan="2"><?php echo $record['id_no'] ?></td>
                    <td rowspan='5'><?php 
					 if($record['job_image']=="")
					 echo "No Image Available";
					 else
					 {
						 ?>
    <img src="/msk_mobb/img/job_image/<?php echo $record['job_image']; ?>"width="200" height="auto" alt="staff image"   <?php } ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td colspan="2"><?php echo $record['name'] ?></td>
                </tr>
                <tr>
                    <td>Father's Name</td>
                    <td colspan="2"><?php echo $record['father_name'] ?></td>
                </tr>
                <tr>
                    <td>Mother's Name</td> 
                    <td colspan="2"><?php echo $record['mother_name'] ?></td>
                </tr>
                <tr>
                    <td>Permanent Address</td>
                    <td colspan="2"><?php echo $record['per_address'] ?></td>
                </tr>
                <tr>
                    <td width="30%">Mobile Number</td>
                    <td width="20%"> <?php echo $record['mobile_no'] ?></td>
                    <td width="30%">Whatsapp Number</td>
                    <td width="20%"> <?php echo $record['whatsapp_no'] ?></td>
                </tr>
                <tr>
                    <td>Email Id</td>
                    <td colspan="3"> <?php echo $record['email'] ?></td>
                </tr>
 
            <?php 
				//  if($record['image']=="")
				//  echo "No Image";
				//  else
				//  {
			 ?>
			 <tr>
            <!--<img src="/msk_mobb/img/Food_Needed_Image/<?php echo $record['image']; ?>"width="auto" height="150" alt="job image" style="width:30%; float:right;">   <?php //} ?>-->
            </tr>
        
</table>

<div class="form-row">
    <div class="col-5" style="width:50%; float:left">
<table>

<br>

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



<!--<div class="col-7" style="width:50%; float:right;">    -->
<!--<h4 style="text-align:center;">Image</h4>-->
<!--<p style="text-align:center;">-->
<!--    <div >-->
         <?php 
				// 	 if($record['job_image']=="")
				// 	 echo "No Image Available";
				// 	 else
				// 	 {
						 ?>
    <!--<img src="/msk_mobb/img/job_image/<?php echo $record['job_image']; ?>"width="auto" height="400" alt="staff image"   <?php //} ?></div></p>-->
<!--</div>-->
<!--</div>-->
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

#inner {
  display: inline-block;
}

table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
td{
    height: 38px;
}
</style>    
    