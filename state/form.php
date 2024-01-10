
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

<script language="javascript" type="text/javascript" src="state/state.js"></script>

		<section class="content">
		
			<div class="col">
                <div class="box">
					<div class="box-body">
        
						<form class="was-validated" name="state" autocomplete="off">
							<div class="row">
 
        						<div class="col-md-12 ">
									<div class="col-lg-6">
									  <div class="form-group">
										   <h5>Country Name </h5>
										   <div class="controls">
												<select class="form-control select2 item_name" name="country_id" id="country_id" required>
												<option value="">Select Your Country</option>
												<?php foreach($country_list as $value){?>
													<option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
												<?php } ?>
												</select>
											</div>
									  </div>
									 </div>
								
								</div>
								<div class="col-md-12 ">
									<div class="col-lg-6">
									  <div class="form-group">
										   <h5>State Name </h5>
										   <div class="controls">
												<input type="text"  name="state_name" id="state_name"  class="form-control" onchange="validation(this.id)"  required>
											</div>
									  </div>
									 </div>
								
								</div>
         
								<div class="col-md-12">
									<div class="col-lg-6">
										<h5>Status</h5>
										<select name="status" id="status"  class="form-control" onchange="validation(this.id)"  required>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
										</select>
									</div>
								</div>

         
								<div class="col-md-12 go-btn"><br><br>
									<center><a href="index.php?file=state/list" class="hvr-sweep-to-top">Cancel</a>
									<?php if($updateresult==''){?>
									<a class="hvr-sweep-to-top" onclick="state_cu('','Add')">Save</a>
									<?php }else{?>
									<a class="hvr-sweep-to-top" onclick="state_cu('<?php echo $updateresult[0]['state_id']?>','Update')">Update</a>
									<?php }?></center>
								</div>
         

							</div>
						</form>
                
					</div>
                
				</div>

			</div>
			 
		
		</section>
    
<?php if($updateresult!=''){?>
<script>
document.getElementById("country_id").value ="<?php echo $updateresult[0]['country_id'];?>";
document.getElementById("state_name").value ="<?php echo $updateresult[0]['state_name'];?>";
document.getElementById("status").value ="<?php echo $updateresult[0]['status'];?>";
</script>
<?php }?>