<script language="javascript" type="text/javascript" src="usercreation/usercreation.js"></script>
<!-- Main content -->
<section class="content">
<div class="col">
<div class="box">
<!-- /.box-header -->
<div class="box-body">
<?php
$pdo_userroll = $pdo_conn->prepare("SELECT * FROM userroll ORDER BY userroll_id DESC");
$pdo_userroll->execute();
$pdouserroll = $pdo_userroll->fetchAll();



?>       
<form class="was-validated" name="usercreation" action='' autocomplete="off">
    <div class="row">
		<div class="col-md-6 ">
			
			

			<div class="form-group">
				<h5>User Roll</h5>
				<div class="controls">
				<select name="user_type" id="user_type" required class="form-control select2 item_name">
				<option value="">Select Your Roll</option>
				<?php foreach($pdouserroll as $value)
				{ 
				?>
					<option value="<?php echo $value['userroll_id']?>"><?php echo $value['roll_name']?></option>
				<?php 
				}
				?>
				</select>
				</div>
			</div> 

			<div class="form-group">
				<h5>Email Address  </h5>
				<div class="controls">
				<textarea name="email" id="email" rows="3" class="form-control"  required></textarea>
				<div id="address_error"></div>
				</div>
			</div>

			<div class="form-group">
				<h5>User Name</h5>
				<div class="controls">
					<input type="text" name="username" id="username" value="<?php echo $updateresult[0]['username'];?>" class="form-control"   required>
				<div id="user_name_error"></div>
				</div>
			</div>


			<div class="form-group">
				<h5>Password </h5>
				<div class="controls">
					<input type="password"  name="password" id="password" class="form-control"  required>
				<div id="password_error"></div>
				</div>
			</div>

			<div class="form-group">
				<h5>Active Status </h5>
				<div class="controls">
					<select name="active_status" id="active_status" required class="form-control ">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
			</div>

		</div>
	</div>
             
	<a href="index.php?file=usercreation/list" class="float-left btn btn-primary">Cancel</a>
	<?php if($updateresult==''){?>
	<button type="button" class="float-right btn btn-success" onclick="usercreation_c('','Add')">Save</button>
	<?php }else{?>
	<button type="button" class="float-right btn btn-success" onclick="usercreation_c('<?php echo $updateresult[0]['user_id']?>','Update')">Update</button>
	<?php }?>
	</form>
</div>
<!-- /.box-body -->
<div id="usercreation_list"></div>
<div id="distinct_error" style="color:red"></div>
</div>
</div>	
</section>

<?php 
if($updateresult!='')
{?>
<script>
document.getElementById("username").value ="<?php echo $updateresult[0]['username'];?>";
document.getElementById("password").value ="<?php echo $updateresult[0]['password'];?>";
document.getElementById("email").value ="<?php echo $updateresult[0]['email'];?>";
document.getElementById("user_type").value ="<?php echo $updateresult[0]['user_type'];?>";
document.getElementById("active_status").value ="<?php echo $updateresult[0]['active_status'];?>";
</script>
<?php 
}
?>


