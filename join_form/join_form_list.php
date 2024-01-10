 

<?php 
error_reporting(0);
 
 include ("../inc/commonfunction.php");

$country_id=$_POST['country_id'];
$area_id=$_POST['area_id'];
$city_id=$_POST['city_id'];
$state_id=$_POST['state_id'];
$district_id=$_POST['district_id'];

$query='';

if($country_id!='')
{
	$query.='   and country_id="'.$country_id.'"';
}

if($state_id!='')
{
	$query.='   and state_id="'.$state_id.'"';
}

if($district_id!='')
{
	$query.='   and district_id="'.$district_id.'"';
}

if($city_id!='')
{
	$query.='   and city_id="'.$city_id.'"';
}


if($area_id!='')
{
	$query.='   and area_id="'.$area_id.'"';
}

?>
 
 <?php
//echo "SELECT * FROM join_masjith WHERE delete_status!='1' $query ORDER BY join_id DESC";
						$survey = $pdo_conn->prepare("SELECT * FROM join_masjith WHERE delete_status!='1' $query ORDER BY join_id DESC");
						$survey->execute();
						$survey_list = $survey->fetchall();

						 foreach($survey_list as $value){?>
						
						    <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['name'];	?>	</td>
							<td><?php echo $value['father_name'];	?></td>
							<td><?php echo $value['profession'];	?></td>
							<td><?php echo $value['district_name'];	?></td>
							<td><?php echo $value['pay_amount'];	?></td>
							<td><?php echo $value['mobile_no'];	?></td>
							<td><?php echo $value['serve_department'];	?></td>
							 
							 <td>
					 	 <a href="#" title="View" id="quotation_view_modal" onclick="join_form_view('<?php echo $value['join_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> 
						</td>
						</tr>
						
						<?php $roll_id+=1;}?>
 
	
									
						
						
						
				 
			 