<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");

$survey = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE matrimonial_id='".$_GET['matrimonial_id']."'");
$survey->execute();
$record = $survey->fetch();
?>
<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
			<td width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
			<td align="center" style="font-size:20px"><b>Matrimonial Report View</b></td>
		</tr>
		
</table>
<hr>	
<div class="form-row">
    <div class="col-5" style="width:50%; float:left">
<table>
	<tr>
<td>
<td ><b>ID Number :</b></td><td> <?php echo $record['id_number'] ?></td>

</td>
</tr>
<tr>
<td>
<td><b>DOB: </b></td> <td><?php echo $record['dob'] ?></td>

</td>
</tr>
<tr>
<td>
<td><b>Age :</b></td><td> <?php echo $record['age'] ?></td>

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
<td><b>Gender :</b></td><td> <?php echo $record['gender'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Height :</b></td><td> <?php echo $record['height'] ?></td>
</td>
</tr>
<tr>
<td><td><b>Weight :</b></td><td> <?php echo $record['weight'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Colour :</b></td><td>  <?php echo $record['color'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> Tiniyat Scholarship :</b></td><td>   <?php echo $record['tiniyat_scholarship'] ?></td> 
</td>
</tr>
<tr>
	<td>
<td><b>Education Qualification :</b>
</td>
<td> <?php echo $record['education_qualification'] ?>
</td>
</td>
</tr>
<tr>
<td>

<td><b>Brother:</b>
</td> 
<td><?php echo $record['brother'] ?>
</td>
</td>
</tr>
<tr>
    <td>
<td><b>Sister :
</b></td> 
<td><?php echo $record['sister'] ?>
</td></td>
</td>
</tr>
<tr>
<td>
<td><b>Unmarried Brother :</b></td><td> <?php echo $record['unmarried_brother'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Unmarried Sister :</b></td><td> <?php echo $record['unmarried_sister'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Are you Worker :</b></td><td> <?php echo $record['worker'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>if yes :</b> </td><td><?php echo $record['if_worker'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Monthly Income</b><td> <?php echo $record['monthly_income'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Marital Status :</b></td><td> <?php echo $record['marital_status'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Passed Away :</b></td><td> <?php echo $record['passed_away'] ?></td>

</td>
</tr>
<tr>
	<td>
<td><b>Father Profession :</b></td><td> <?php echo $record['father_profession'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b>Are you Handicapped? :</b></td><td> <?php echo $record['handicapped'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> If yes Describe :</b></td><td> <?php echo $record['if_handicapped'] ?></td>
</td>
</tr>
<tr>
	<td>

<td><b> Expectation :</b></td><td> <?php echo $record['expectation'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> Hint :</b></td><td> <?php echo $record['hint'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> Date : </b></td><td><?php echo $record['date'] ?></td>
</td>
</tr>

<tr>
	<td>
<td> <b>Place :</b> </td><td><?php echo $record['place'] ?></td>
</td>
</tr>
<tr>
	<td>
<td> <b>Name :</b></td><td> <?php echo $record['name'] ?></td>
</td>
</tr>
<tr>
	<td>
<td><b> Father Name :</b></td><td> <?php echo $record['father_name'] ?></td>
</td>
</tr>
<td>
	<tr>
		<td>

<td><b> Mother Name :</b></td><td> <?php echo $record['mother_name'] ?></td>
</td>
</tr>
<tr>
		<td>
<td><b>Address:</b></td><td> <?php echo $record['address'] ?></td>
</td>
</tr>
<tr>
		<td>
<td><b>Mobile Number :</b></td><td> <?php echo $record['mobile_no'] ?></td>

</td>
</tr>
<tr>
<td>
<td><b>Whatsapp Number :</b></td><td> <?php echo $record['whatsapp_no'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Email :</b> </td><td><?php echo $record['email'] ?></td>
</td>
</tr>
<tr>
<td>
<td><b>Mohalla Name :</b> </td><td><?php echo $record['mohalla_name'] ?></td>
</td>
</tr>
<!--<div class="col-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="image1" id="image1">
                     <?php 
					 if($record['image1']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image1']; ?>"width="100" height="auto" alt="job image"/>
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="image2" id="image2">
                     <?php 
					 if($record['image1']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image2']; ?>"width="100" height="auto" alt="staff image"/>
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>-->

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

<!--<div class="row-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="image1" id="image1">
                     <?php 
					 if($record['image1']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image1']; ?>"width="100" height="auto" alt="job image"/>
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>

    <div class="row-md-3 ">
        <div class="form-group">
            <h5 class="view_mode">Image</h5>
            <div class="controls">
                <label name="image2" id="image2">
                     <?php 
					 if($record['image1']=="")
					 echo "No Image";
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image2']; ?>"width="100" height="auto" alt="staff image"/>
                    <?php } ?>
                </label>
            </div>
        </div>
    </div>-->
    
    
    
    
<div class="col-7" style="width:50%; float:right;">   
<!--<body class="container-fluid">-->
     <!--<div class="row-md-5">-->
              <!--<div class="column">-->
               <div class="centered">Image-1</div>
                     <?php 
					 if($record['image1']==""){
					 echo "No Image Available";
					 }
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image1']; ?>"width="300" height="auto" alt="job image"/>
                    <?php } ?>
                
            <!--</div>-->
            
            
          <!--<div class="column">-->
              <div class="centered">Image-2</div>
                     <?php 
					 if($record['image2']==""){
					 echo "No Image Available";
					 }
					 else
					 {
						 ?>
					<img src="/msk_mobb/img/matrimonial_information/<?php echo $record['image2']; ?>"width="300" height="auto" alt="staff image"/>
                    <?php } ?>
             
            <!--</div>-->
    <!--</div>-->
 <!--</body>   -->
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


</style>