<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
//echo "SELECT * FROM food_needed WHERE delete_status!='1' $query ORDER BY food_needed_id DESC";
//  $survey = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' $query ORDER BY food_needed_id DESC");
$survey = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' and food_needed_id='$_GET[food_needed_id]' ORDER BY food_needed_id DESC");
$survey->execute();
$record = $survey->fetch();
?>

<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<!--<td align="center" style="font-size:20px"><b>Food Needed Report View</b></td>-->
			<td align="center" style="font-size:20px"><b>Food Needed People Details</b></td>
		</tr>
</table>
<hr>	
<div class="form-row">
    <div class="col-5" style="width:50%; float:left">
<table>
<tr>
<td>
<td ><b>Organization Name :</b><?php echo $record['organization_name'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>City :</b> <?php echo $record['city'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Family No :</b> <?php echo $record['family_no'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Name :</b> <?php echo $record['name'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Age :</b> <?php echo $record['age'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Address :</b> <?php echo $record['address'] ?></td>
</td>
</tr>

<tr>
<td>
<td><b>Mobile Number :</b> <?php echo $record['mobile_no'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Annual Income :</b> <?php echo $record['annual_income'] ?></td>
</td>
</tr>

<tr>
<td>
<!--<td><b>Image :</b> <?php echo $record['image'] ?></td>-->
<td><b>Stage :</b> <?php echo $record['stage'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Disabled Person :</b> <?php echo $record['disabled_person'] ?></td>
</td>
</tr>

<tr>
<td>
<!--<td><b>Disabled Person :</b> <?php echo $record['disabled_person'] ?></td>-->
<td><b>Food dose not needed to be guided by labour :</b> <?php echo $record['food_does_not_needed'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Known Profession :</b> <?php echo $record['profession'] ?></td>
</td>
</tr>

<tr>
<td>
<!--<td><b>Known Profession :</b> <?php echo $record['profession'] ?></td>-->
<td><b>The Reason for choosing food :</b> <?php echo $record['reason_for_choosing_food'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Family Satus :</b> <?php echo $record['family_status'] ?></td>
</td>
</tr>

<tr>
<td>
<!--<td><b>Family Satus :</b> <?php echo $record['family_status'] ?></td>-->
<!--<td><b>The Reason for choosing food :</b> <?php echo $record['reason_for_choosing_food'] ?></td>-->
<td><b>Thanavanthar Name :</b> <?php echo $record['thanavanthar_name'] ?></td>
</td>
</tr>

<tr>
<td>
<!--<td><b>Thanavanthar Name :</b> <?php echo $record['thanavanthar_name'] ?></td>-->
<td><b>Mobile Number:</b> <?php echo $record['mobile_no'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>The Amount of giving :</b> <?php echo $record['amount_of_giving'] ?></td>
</td>
</tr>

<tr>
<td>
<!--<td><b>The Amount of giving :</b> <?php echo $record['amount_of_giving'] ?></td>-->
<td><b>Masjidh Imam Name:</b> <?php echo $record['school_name'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Masjidh Imam Signature :</b> <?php echo $record['school_imam_signature'] ?></td>
</td>
</tr>


<tr>
<td>
<!--<td><b>School Imam Signature :</b> <?php echo $record['school_imam_signature'] ?></td>-->
<td><b>President Signature:</b> <?php echo $record['muttavalli_signature'] ?></td>
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
<!--


<br>
<h4 id="inner">Image</h4>
<br>
<body class="container-fluid">
     <div class="row-md-5" id="inner">
              <div class="column">
                     <?php 
					 if($record['image']=="")
					 echo "No Image Available";
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/Food_Needed_Image/<?php echo $record['image']; ?>"width="100" height="auto" alt="job image"  />

                    <?php } ?>
                
            </div>
    </div>
 </body>-->  
<div class="col-7" style="width:50%; float:right;">
<h4>Image</h4>
<p>
    <div >
         <?php 
					 if($record['image']=="")
					 echo "No Image";
					 else
					 {
						 ?>
    <img src="/msk_mobb/img/Food_Needed_Image/<?php echo $record['image']; ?>"width="auto" height="400" alt="job image"   <?php } ?></div></p>
    </div>
 </div>  
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