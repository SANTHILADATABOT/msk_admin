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
</style>