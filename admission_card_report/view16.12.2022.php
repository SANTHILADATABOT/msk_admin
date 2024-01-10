<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM admission_card WHERE admission_card_id='".$_GET['admission_card_id']."'");
$survey->execute();
$record = $survey->fetch();
?>
<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td align="center" style="font-size:20px"><b>Admission Card Report View</b></td>
		</tr>
</table>
<hr>	
<table>
<tr>

<td ><b>Token Number :</b><?php echo $record['token_id']; ?></td>


</tr>
<!--<tr>-->

<!--<td ><b>ID Number :</b><?php echo $record['id_number']; ?></td>-->


<!--</tr>-->
<tr>

<td><b>Patient Name : </b><?php echo $record['patient_name']; ?></td> 


</tr>
<tr>

<td><b>Address : </b><?php echo $record['address']; ?></td> 


</tr>
<tr>
<td><b>Mobile Number :</b> <?php echo $record['mobile_no']; ?></td>


</tr>
<tr></tr>
<tr>

<td><b><u>Hospital Details</u></b></td>


</tr>
<tr>
<tr>

<td><b>Hospital Name :</b><?php echo $record['hospital_name']; ?></td>


</tr>
<tr>

<td><b>Contact Person :</b><?php echo $record['contact_person']; ?></td>


</tr>
<tr>

<td><b>Phone Number :</b><?php echo $record['phone_number']; ?></td>


</tr>
<tr>

<td><b>Way to Hospital :</b><?php echo $record['landmark']; ?></td>


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