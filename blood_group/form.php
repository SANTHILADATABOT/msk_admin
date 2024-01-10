<script language="javascript" type="text/javascript" src="blood_group/blood_group.js"></script>
<section class="content">
<div class="col">
	<div class="box">
		<!-- /.box-header -->
		<div class="box-body">
			<form class="was-validated"  name="userroll" autocomplete="off">
				<div class="row">
					
                  

					<div class="col-md-6 ">
					<div class="form-group">
					<h5>Blood Group Name  </h5>
					<div class="controls">
					<input type="text" name="blood_group_name" id="blood_group_name" onkeyup="validation(this.id)" class="form-control" required>
					
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
				<center><a href="index.php?file=blood_group/list" class="hvr-sweep-to-top">Cancel</a>
				<?php if($updateresult==''){?>
				<a class="hvr-sweep-to-top" onclick="blood_group('','Add')">Save</a>
				<?php }else{?> 
				<a class="hvr-sweep-to-top" onclick="blood_group('<?php echo $updateresult[0]['blood_id'];?>','Update')">Update</a>
				<?php }?> </center>
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
document.getElementById("blood_group_name").value ="<?php echo $updateresult[0]['blood_group_name'];?>";
document.getElementById("description").value ="<?php echo $updateresult[0]['description'];?>";
document.getElementById("status").value ="<?php echo $updateresult[0]['status'];?>";
</script>
<?php } ?>

<style>
textarea#description {
    border: 1px solid #020065;
}
</style>
