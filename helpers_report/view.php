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
			<td rowspan='2' width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<!--<td align="center" style="font-size:20px"><b>Food Needed Report View</b></td>-->
			<td align="center" style="font-size:20px"><b>Food Needed People Details</b></td>
		</tr>
		<tr>
			<td align="center" style="font-size:20px"><b><?php echo $record['organization_name'] ?>,  <?php echo $record['city'] ?></b></td>
		</tr>
</table>
<hr>	

<table>
    <div class="form-row">
        <div class="col-5" style="width:70%; float:left">
            <!--<table style="border: 1px solid black;border-collapse: collapse;">-->
                <tr>
                    <th style="border: 1px solid black;border-collapse: collapse;">S.No</th>
                    <td style="border: 1px solid black;border-collapse: collapse;"><?php echo $record['food_needed_id'] ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black;border-collapse: collapse;">F.No</th>
                    <td style="border: 1px solid black;border-collapse: collapse;"><?php echo $record['family_no'] ?></td>
                </tr>
                &ensp;
            <!--</table>-->
            <!--<table>-->
                <tr></tr>
                <tr>
                    <td><b>Name :</b> <?php echo $record['name'] ?></td>
                </tr>
                <tr>
                    <td><b>Age :</b> <?php echo $record['age'] ?></td>
                </tr>
                <tr>
                    <td><b>Address :</b> <?php echo $record['address'] ?></td>
                </tr>
                <tr>
                    <td><b>Mobile Number :</b> <?php echo $record['mobile_no'] ?></td>
                </tr>
                <tr>
                    <td><b>Annual Income :</b> <?php echo $record['annual_income'] ?></td>
                </tr>
            <!--</table>-->
        </div>
        <div class="col-7">
            <?php 
				 if($record['image']=="")
				 echo "No Image";
				 else
				 {
			 ?>
			 <tr>
            <img src="/msk_mobb/img/Food_Needed_Image/<?php echo $record['image']; ?>"width="auto" height="150" alt="job image" style="width:30%; float:right;">   <?php } ?>
            </tr>
        </div>
    </div>
</table>
<hr>
<table>
    <tr>
        <td><b>Stage :</b> <?php echo $record['stage'] ?></td>
    </tr>
    <tr>
        <td><b>Disabled Person :</b> <?php echo $record['disabled_person'] ?></td>
    </tr>
    <tr>
        <td><b>Food dose not needed to be guided by labour :</b> <?php echo $record['food_does_not_needed'] ?></td>
    </tr>
    <tr>
        <td><b>Known Profession :</b> <?php echo $record['profession'] ?></td>
    </tr>
    <tr>
        <td><b>The Reason for choosing food :</b> <?php echo $record['reason_for_choosing_food'] ?></td>
    </tr>
    <tr>
        <td><b>Family Satus :</b> <?php echo $record['family_status'] ?></td>
    </tr>
</table>&ensp;
<table style="border: 1px solid black;">
    <tr>
        <td><b>Thanavanthar Name :</b> <?php echo $record['thanavanthar_name'] ?></td>
    </tr>
    <tr>
        <td><b>Mobile Number:</b> <?php echo $record['mobile_no'] ?></td>
    </tr>
    <tr>
        <td><b>The Amount of giving :</b> <?php echo $record['amount_of_giving'] ?></td>
    </tr>
</table>
<p>The status of this family is that they have no means of income. Therefore, we take God as our witness that we can provide them with monthly groceries.</p>
<table>
    <td style="padding-right: 30px;"><b>Masjidh Imam Name:</b> <?php echo $record['school_name'] ?></td>
    <td Style="padding-right: 60px;"><b>Masjidh Imam Signature :</b> <?php echo $record['school_imam_signature'] ?></td>
    <td style="padding-right: 30px;"><b>President Signature:</b> <?php echo $record['muttavalli_signature'] ?></td>
</table>
        
        
        <?php
        // exit;
        ?>





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