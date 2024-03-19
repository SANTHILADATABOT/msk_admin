
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
textarea#description {
    border: 1px solid #020065;
}
</style>

<script language="javascript" type="text/javascript" src="language/language.js"></script>

		<section class="content">
		
			<div class="col">
                <div class="box">
					<div class="box-body">
        
						<form class="was-validated" name="language" autocomplete="off">
							<div class="row">
 
        
								<div class="col-md-12 ">
									<div class="col-lg-6">
									  <div class="form-group">
										   <h5>Language Name </h5>
										   <div class="controls">
												<input type="hidden"  name="language_id" id="language_id" />
												<input type="hidden"  name="action" id="action" />
												<input type="text"  name="language_name" id="language_name"  class="form-control" onchange="validation(this.id)"  required>
											</div>
									  </div>
									 </div>
								
								</div>
         
								<div class="col-md-12">
									<div class="col-lg-6">
										<h5>Description</h5>
										 <textarea id="description" name="description" style="width:100%;height: 90px;"></textarea>
									</div>
								</div>

         
								<div class="col-md-12 go-btn"><br><br>
									<center><a href="index.php?file=language/list" class="hvr-sweep-to-top">Cancel</a>
									<?php if($updateresult==''){?>
									<a class="hvr-sweep-to-top" onclick="language_cu()">Save</a>
									<?php }else{?>
									<a class="hvr-sweep-to-top" onclick="language_cu()">Update</a>
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
document.getElementById("language_id").value ="<?php echo $updateresult[0]['language_id'];?>";

document.getElementById("language_name").value ="<?php echo $updateresult[0]['language_name'];?>";
document.getElementById("description").value ="<?php echo $updateresult[0]['description'];?>";
</script>
<?php }
else{
?>
<script>
document.getElementById("action").value ="<?php echo "Add";?>";	
</script>
<?php } ?>