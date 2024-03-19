<?php 
error_reporting(0); 
include ("../inc/commonfunction.php");
$survey = $pdo_conn->prepare("SELECT * FROM helpers_details WHERE helpers_details_id='$_GET[helpers_details_id]' ORDER BY helpers_details_id DESC");
$survey->execute();
$record = $survey->fetch();
?>

<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td width="10px"></td>
		<td rowspan='2' width="20px"><a href="../index.php"><img src="../images/logo.png" alt="image description" height="100px" class="style5"></a></td>
		<td align="center" style="font-size:20px"><b>Helpers Report</b></td>
		<td width="10px"></td>
	</tr>
</table>
<hr>
<table>
    <div class="form-row">
        <div class="col-5" style="width:70%; float:left">
                <tr>
                    <td width="10px"></td>
                    <td><b>Helpers Name :</b></td> 
                    <td><?php echo $record['helper_name'] ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>Mobile No :</b></td> 
                    <td><?php echo $record['mobile_no'] ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>Country Name :</b></td> 
                    <td><?php echo get_country_name($record['country_id']) ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>State Name :</b></td> 
                    <td><?php echo get_state_name($record['state_id']) ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>District Name :</b></td> 
                    <td><?php echo get_district_name($record['district_id']) ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>City Name :</b></td> 
                    <td><?php echo get_city_name($record['city_id']) ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>Area Name :</b></td> 
                    <td><?php echo get_area_name($record['area_id']) ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>Help Type :</b></td> 
                    <td><?php echo $record['help_type'] ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>Blood Group :</b></td> 
                    <td><?php echo get_blood_group($record['blood_id']) ?></td>
                    <td width="10px"></td>
                </tr>
                <tr>
                    <td width="10px"></td>
                    <td><b>Remarks :</b></td> 
                    <td><?php echo $record['remarks'] ?></td>
                    <td width="10px"></td>
                </tr>
        </div>
    </div>
</table>
<hr>
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
td{
    height: 30px;
}
body {
    border-style: solid;
}

</style>