
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

<script language="javascript" type="text/javascript" src="country/country.js"></script>

		<section class="content">
		
			<div class="col">
                <div class="box">
					<div class="box-body">
        
						<form class="was-validated" name="country" autocomplete="off">
							<div class="row">
 
        
								<div class="col-md-12 ">
									<div class="col-lg-6">
									  <div class="form-group">
										   <h5>Country Name </h5>
										   <div class="controls">
										        <input type="hidden"  name="country_id" id="country_id" />
												 <input type="hidden"  name="action" id="action" />
												<input type="text"  name="country_name" id="country_name"  class="form-control" onchange="validation(this.id)"  required>
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
									<center><a href="index.php?file=country/list" class="hvr-sweep-to-top">Cancel</a>
									<?php if($updateresult==''){?>
									<a class="hvr-sweep-to-top" onclick="country_cu()">Save</a>
									<?php }else{?>
									<a class="hvr-sweep-to-top"  onclick="country_cu()">Update</a>
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
document.getElementById("action").value ="<?php echo "Update";?>";
document.getElementById("country_id").value ="<?php echo $updateresult[0]['country_id'];?>";
document.getElementById("country_name").value ="<?php echo $updateresult[0]['country_name'];?>";
document.getElementById("status").value ="<?php echo $updateresult[0]['status'];?>";
</script>
<?php }
else{
?>
<script>
document.getElementById("action").value ="<?php echo "Add";?>";	
</script>
<?php
}

?>