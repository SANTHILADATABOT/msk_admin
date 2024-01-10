
<style>
.dt-buttons{
	display:none;
}
.dataTables_paginate{
	display:none;
}
.dataTables_info{
	display:none;
}
</style>

<script language="javascript" type="text/javascript" src="area/area.js"></script>

    <section class="content">
		
		<div class="col">
            <div class="box">
       
       
			<!-- /.box-header -->
			<div class="box-body">
        
       
        
				<form class="was-validated" name="purchaseentry" autocomplete="off">
					<div class="row">
        
         
						<div class="col-md-12 ">
							<div class="col-lg-6">
							  <div class="form-group">
								   <h5>Country Name </h5>
								   <div class="controls">
										<select class="form-control select2 item_name" name="country_id" id="country_id" required onchange="state_list(country_id.value)">
										<option value="">Select Your Country</option>
										<?php foreach($country_list as $value){?>
											<option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
										<?php } ?>
										</select>
									</div>
							  </div>
							 </div>
						
						</div>
         
						<div class="col-md-12">
							<div class="col-lg-6">
								<div class="form-group">
								<h5>State Name</h5>
									<select class="form-control select2 item_name" name="state_id" id="state_id" onchange="dist_list(country_id.value,state_id.value)" required >
										<option value="">Select Your State</option>
										<?php
											if($_GET['area_id']!='') {
											$state = $pdo_conn->prepare("SELECT * FROM state WHERE country_id='".$updateresult[0]['country_id']."'");
										$state->execute();
										$record = $state->fetchall();
										foreach ($record as  $value) { ?>
										 
										<option value="<?php echo $value['state_id']?>"><?php echo $value['state_name']?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div>
						</div>
		 
						<div class="col-md-12">
							<div class="col-lg-6">
								<div class="form-group">
								<h5>District Name</h5>
									<div id="dist_name_list" name="dist_name_list">
									<select class="form-control select2 item_name" name="district_id" id="district_id"   onchange="city_list(country_id.value,state_id.value,district_id.value,city_id.value)" >
										<option value="">Select Your District</option>
										<?php
											if($_GET['area_id']!='') {
											$state = $pdo_conn->prepare("SELECT * FROM district WHERE country_id='".$updateresult[0]['country_id']."' and state_id='".$updateresult[0]['state_id']."'");
										$state->execute();
										$record = $state->fetchall();
										foreach ($record as  $value) { ?>
										 
										<option value="<?php echo $value['district_id']?>"  ><?php echo $value['district_name']?></option>
										<?php }
										} ?>
									</select>
									</div>
								</div>
							</div>
						</div>
        				
						<div class="col-md-12">
							<div class="col-lg-6">
								<div class="form-group">
								<h5>City Name</h5>
									<div id="dist_name_list" name="dist_name_list">
									<select class="form-control select2 item_name" name="city_id" id="city_id"    area_id>
										<option value="">Select Your City</option>
										<?php
											if($_GET['area_id']!='') {
											$state = $pdo_conn->prepare("SELECT * FROM city WHERE country_id='".$updateresult[0]['country_id']."' and state_id='".$updateresult[0]['state_id']."' and city_id='".$updateresult[0]['city_id']."'");
										$state->execute();
										$record = $state->fetchall();
										foreach ($record as  $value) { ?>
										 
										<option value="<?php echo $value['city_id']?>"  ><?php echo $value['city_name']?></option>
										<?php }
										} ?>
									</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12 ">
							<div class="col-lg-6">
							  <div class="form-group">
								   <h5>area Name </h5>
								   <div class="controls">
										<input type="text" class="form-control" name="area_name" id="area_name" onkeyup="validation(this.id)" required>
									</div>
							  </div>
							 </div>
						
						</div>
         
						<div class="col-md-12">
							<div class="col-lg-6">
								<h5>Status</h5>
								<select class="form-control" name="status" id="status" onkeyup="validation(this.id)" required>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
								</select>
							</div>
						</div>
		 
		 
						<div class="col-md-12 go-btn"><br><br>
							<center><a href="index.php?file=district/list" class="hvr-sweep-to-top">Cancel</a>
							<?php if($updateresult==''){?>
							<a class="hvr-sweep-to-top" onclick="area_cu('','Add')">Save</a>
							<?php }else{?>
							<a class="hvr-sweep-to-top" onclick="area_cu('<?php echo $updateresult[0]['area_id']?>','Update')">Update</a>
							<?php }?></center>
						</div>


					</div>
				</form>
         
          
			</div>
        <!-- /.box-body -->
        
			</div>


		</div>
			 
		
	</section>
    
<?php if($updateresult!=''){?>


<script>



document.getElementById("country_id").value ="<?php echo $updateresult[0]['country_id'];?>";

document.getElementById("state_id").value ="<?php echo $updateresult[0]['state_id'];?>";
document.getElementById("district_id").value ="<?php echo $updateresult[0]['district_id'];?>";
document.getElementById("city_id").value ="<?php echo $updateresult[0]['city_id'];?>";
document.getElementById("area_name").value ="<?php echo $updateresult[0]['area_name'];?>";
document.getElementById("status").value ="<?php echo $updateresult[0]['status'];?>";




</script>
<?php }?>