<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM job_application WHERE job_id='".$_GET['job_id']."'");
$survey->execute();
$record = $survey->fetch();
?>
<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td align="center" style="font-size:20px"><b>Job Application Report View</b></td>
		</tr>
</table>
<hr>	
<table>
	<tr>
<td>
<td ><b>ID Number :</b></td><td> <?php echo $record['id_no'] ?></td>
<td><b>DOB: </b></td> <td><?php echo $record['dob'] ?></td>
<td><b>Contact No :</b></td><td> <?php echo $record['contact_no	'] ?></td>

</td>
</tr>
<tr>
	<td>
		<td></td>
<td> </td>
<td></td>
</td>
</tr>
<tr>
<td>
<td><b>Age :</b></td><td> <?php echo $record['age'] ?></td>
<td><b>Gender :</b></td><td> <?php echo $record['gender'] ?></td>


<td><b>Qualification</b></td><td> <?php echo $record['qualification'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> Experience :</b></td><td>  <?php echo $record['experience'] ?></td>


<td><b> Job Experience Description:</b></td><td>   <?php echo $record['exp_yes1'] ?></td> 

<td> <?php echo $record['exp_yes2'] ?>
</td>
</td>
</tr>
<tr>
<td>

<td><b>Language Known :</b>
</td> 
<td><?php echo $record['language'] ?>
</td>

<td><b>City :
</b></td> 
<td><?php echo $record['city'] ?>
</td>



<td><b>Pincode :</b></td><td> <?php echo $record['pincode'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b> Are you Passport Holder:</b></td><td> <?php echo $record['passport'] ?></td>
<td><b>Marital Status :</b></td><td> <?php echo $record['marital_status'] ?></td>
<td><b>Driving License Holder :</b> </td><td><?php echo $record['license'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Area of Interest</b><td> <?php echo $record['area_of_interest'] ?></td>


<td><b>Expect Salary :</b></td> <td> <?php echo "From:  ".$record['from_salary']."  "."To ".$record['to_salary']; ?></td> 
<td><b>Are you Physically Challenged :</b></td><td> <?php echo $record['physically'] ?></td>

</td>
</tr>
<tr>
	<td>
<td><b>If the Physically Challenged :</b></td><td> <?php echo $record['disability'] ?></td>
<td><b>Are you looking for a job:</b></td><td> <?php echo $record['job'] ?></td>


<td><b> proforred job location :</b></td><td> <?php echo $record['location'] ?></td>
</td>
</tr>
<tr>
	<td>

<td><b> Hobbies :</b></td><td> <?php echo $record['hobbies'] ?></td>
<td><b> Name :</b></td><td> <?php echo $record['name'] ?></td>
<td><b>Father Name : </b></td><td><?php echo $record['father_name'] ?></td>
</td>
</tr>

<tr>
	<td>
<td> <b>Mother Name :</b> </td><td><?php echo $record['mother_name'] ?></td>

<td> <b>Permanent Address :</b></td><td> <?php echo $record['per_address'] ?></td>
<td><b> Mobile Number :</b></td><td> <?php echo $record['mobile_no'] ?></td>
</td>
</tr>
<td>
	<tr>
		<td>

<td><b> Whatsapp Number :</b></td><td> <?php echo $record['whatsapp_no'] ?></td>
<td><b>Email Id :</b></td><td> <?php echo $record['email'] ?></td>
<!--
<div class="col-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="applicant_image" id="applicant_image">
                     <?php 
					 if($record['job_image']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mob/img/job_image/<?php echo $record['job_image']; ?>"width="100" height="auto" alt="staff image"/>
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>-->
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




<!--<?php echo $record['job_image']; ?>
<div class="col-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="applicant_image" id="applicant_image">
                     <?php 
					 if($record['job_image']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/job_image/<?php echo $record['job_image']; ?>"width="100" height="auto" alt="staff image"/>
				
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>-->
    
    
<h4 style="text-align:center;">Image</h4>
<p style="text-align:center;">
    <div >
         <?php 
					 if($record['job_image']=="")
					 echo "No Image Available";
					 else
					 {
						 ?>
    <img src="/msk_mobb/img/job_image/<?php echo $record['job_image']; ?>"width="auto" height="600" alt="staff image"   <?php } ?></div></p>
    
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



</style>    
    