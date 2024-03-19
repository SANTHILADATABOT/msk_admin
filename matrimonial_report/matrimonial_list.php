
<?php 
error_reporting(0);
 
 include ("../inc/commonfunction.php");

$id_number=$_POST['id_number'];
$query='';

if($id_number!='')
{
	$query.='   and id_number="'.$id_number.'"';
}



?>
		


<div class="box-body">
			<div class="table-responsive">          
			     
				<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100 boreder">
					
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Name</th>
							<th>Education Qualification</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Monthly Income</th>
							<th>Mobile No</th>
							<th>Action</th>
							 
						</tr>
					</thead>
						<tbody id="areawise_count_list" >	
 
 <?php

						 $survey = $pdo_conn->prepare("SELECT * FROM matrimonial_information WHERE status='1' $query ORDER BY matrimonial_id DESC");
						$survey->execute();
						$survey_list = $survey->fetchall();

						foreach($survey_list as $value){?>
						
						   <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['id_number'];	?>	</td>
							<td><?php echo $value['name']; ?></td>
						    <td><?php echo $value['education_qualification']; ?></td>
							<td><?php echo  $value['age']; ?></td>
							<td><?php echo  $value['gender']; ?></td> 
							<td><?php echo $value['monthly_income'];?></td>
							<td><?php echo $value['mobile_no']; ?> </td>
							 <td>
						 <a href="#" title="View" id="quotation_view_modal" onclick="matrimonial_view('<?php echo $value['matrimonial_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  
							 
						</tr>
						
						<?php $roll_id+=1;}?>
 </tbody>
	
 </table>
 
</div>
</div>
<!--
 <div class="modal fade" id="quotation_view">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			             <!--   <div class="modal-header">
			                  <h3 class="modal-title">Matrimonial Information View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <!-- Modal body -->
			              <!--  <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>
			                <!-- Modal footer -->
			              <!--  <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> -->
			<!-- /.box -->
	
									
						
						
						
				 
			 