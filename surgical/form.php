<script language="javascript" type="text/javascript" src="surgical/surgical.js"></script>
<section class="content">
<div class="col">
	<div class="box">
		<!-- /.box-header -->
		<div class="box-body">
			<form class="was-validated"  name="userroll" autocomplete="off">
				<div class="row">
					
                  

					<div class="col-md-6 ">
					<div class="form-group">
					<h5>Surgical Name  </h5>
					<div class="controls">
					<input type="hidden"  name="surgical_id" id="surgical_id" />
					<input type="hidden"  name="action" id="action" />
					<input type="text" name="surgical_name" id="surgical_name" onkeyup="validation(this.id)" class="form-control" required>
					
					</div>

					</div>
                    <div class="form-group">
					<h5>Description </h5>
					<div class="controls">
					<textarea id="description" name="description" style="width:100%;height: 90px;"></textarea>					
					</div>
					
					</div>

					<div class="form-group">
					<h5>Active Status  </h5>
					<div class="controls">
					<select name="status" id="status" class="form-control" required>
					<option value="1">Active</option>
					<option value="0">Inactive</option>
					</select>
					</div>
					</div>

					</div>
				</div>
				<div class="col-md-12 go-btn"><br><br>
				<center><a href="index.php?file=surgical/list" class="hvr-sweep-to-top">Cancel</a>
				<?php if($updateresult==''){?>
				<a class="hvr-sweep-to-top" onclick="surgical()">Save</a>
				<?php }else{?>
				<a class="hvr-sweep-to-top" onclick="surgical()">Update</a>
				<?php }?></center>
				</div>
			</form>
		</div>
		<!-- /.box-body -->
		<div id="userrole_list"></div>
		<div id="distinct_error" style="color:red"></div>
	</div>
</div>
</section>
<?php if($updateresult!=''){?>
<script>
document.getElementById("action").value ="<?php echo "Update";?>";
document.getElementById("surgical_id").value ="<?php echo $updateresult[0]['surgical_id'];?>";

document.getElementById("surgical_name").value ="<?php echo $updateresult[0]['surgical_name'];?>";
document.getElementById("description").value ="<?php echo $updateresult[0]['description'];?>";
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
<style>
textarea#description {
    border: 1px solid #020065;
}
</style>

