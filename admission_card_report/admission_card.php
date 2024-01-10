<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM admission_card WHERE admission_card_id='".$_GET['admission_card_id']."'");
$survey->execute();
$record = $survey->fetch();
?>
<div class="page_border">
    <table width="100%" style="margin: 20px 10px 20px 10px">
        <tr>
			<td width="20px" rowspan="2" style="margin-left:50px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td align="center" style="font-size:40px"><b>MSK FREE CONSULTING</b></td>
		</tr>
        <tr>
			<td align="center" style="font-size:20px">582-A, Cauvery Road, Erode-638003</td>
		</tr>
    </table>
    <table width="100%" cellspacing="10%" cellpadding="10%">
        <tr>
            <td>TOKEN NO : </td>
            <td colspan="2"><?php echo $record['token_id']; ?></td>
            <td>ID NUMBER : </td>
            <td><?php echo $record['id_number']; ?></td>
        </tr>
        <tr>
            <td>NAME OF PATIENT : </td>
            <td colspan="4"><?php echo $record['patient_name']; ?></td>
        </tr>
        <tr>
            <td>ADDRESS : </td>
            <td colspan="4"><?php echo $record['address']; ?></td>
        </tr>
        <tr>
            <td>PHONE NO : </td>
            <td colspan="4"><?php echo $record['mobile_no']; ?></td>
        </tr>
        <tr>
            <td>HOSPITAL DETAILS : </td>
            <td>APPOINTMENT DATE : </td>
            <td><?php if($record['appointment']=="0000-00-00 00:00:00") echo '--'; else echo date('d-m-Y', strtotime($record['appointment'])); ?></td>
            <td>TIMING : </td>
            <td><?php if($record['appointment']=="0000-00-00 00:00:00") echo '--'; else echo date('h:ia', strtotime($record['appointment'])); ?></td>
        </tr>
        <tr>
            <td>HOSPITAL NAME : </td>
            <td colspan="4"><?php echo $record['hospital_name']; ?></td>
        </tr>
        <tr>
            <td>CONTACT PERSON : </td>
            <td colspan="4"><?php echo $record['contact_person']; ?></td>
        </tr>
        <tr>
            <td>PHONE NUMBER : </td>
            <td colspan="4"><?php echo $record['phone_number']; ?></td>
        </tr>
        <tr>
            <td>WAY TO HOSPITAL : </td>
            <td colspan="4"><?php echo $record['landmark']; ?></td>
        </tr>
    </table>
    <table align="center" width="80%">
        <tr>
            <td style="border:1px solid black;">OFFICE CONTACTS : 0424 - 406 1617, 8695725780, 8695025780, 9842725780 <br> WE DON'T HAVE MONEY TO PAY GENEROUSLY, BUT WE HAVE AN OPEN HEART TO GUIDE YOU. </td>
        </tr>
    </table>
</div>

<style>
    .page_border {
        border-style: solid;
        height: 1000px;
    }
</style>

<table>


<!--<tr>-->
<!--<td>-->
<!--	<td><b>Enumerator Name:</b></td><td><?php echo ($record['enumerator_name']); ?>-->
<!--	</td>-->
<!--	<td><b>Enumerator Mobile No:</b></td><td><?php echo ($record['enumerator_phone']); ?>-->
<!--	</td>-->
<!--</td>-->
<!--</tr>-->

</table>