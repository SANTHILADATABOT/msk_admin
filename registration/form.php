<script language="javascript" type="text/javascript" src="registration/registration.js"></script>
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
<form class="was-validated" name="registration" action='' autocomplete="off">
    <div class="row">
		<div class="col-md-6 ">
			
			

			<div class="form-group">
				<h5>User Type</h5>
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
				<h5>Name</h5>
				<div class="controls">
			 <input type="text" name="name" id="name" value="<?php echo $updateresult[0]['username'];?>" class="form-control"   required>
				<div id="address_error"></div>
				</div>
			</div>

			<div class="form-group">
				<h5>Mobile Number</h5>
				<div class="controls">
					<input type="number" name="mobile" id="mobile" value="<?php echo $updateresult[0]['username'];?>" class="form-control"   required>
				<div id="user_name_error"></div>
				</div>
			</div>


			<div class="form-group">
				<h5>Country  </h5>
				<div class="controls">
					<select name="country_id" id="country_id" required class="form-control select2 item_name" onchange="get_state(country_id.value)">
						<option value="">Select Country</option>
							<?php foreach($country_list as $value) { ?>
								<option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
							<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<h5>State  </h5>
				<div class="controls">
					<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district(country_id.value,this.value)">
					<option value="">Select State</option>
					 
					</select>
				</div>
			</div>

			<div class="form-group">
				<h5>District  </h5>
				<div class="controls">
					<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city(country_id.value,state_id.value,this.value)">
					<option value="">Select District</option>
					 
					</select>
				</div>
			</div>

			<div class="form-group">
				<h5>City  </h5>
				<div class="controls">
					<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area(country_id.value,state_id.value,district_id.value,this.value)">
					<option value="">Select City</option>
					 
					</select>
				</div>
			</div>

			<div class="form-group">
				<h5>Area  </h5>
				<div class="controls">
					<select name="area_id" id="area_id" required class="form-control select2 item_name"  >
					<option value="">Select Area</option>
					 
					</select>
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
             
	<a href="index.php?file=registration/list" class="float-left btn btn-primary">Cancel</a>
	<?php if($updateresult==''){?>
	<button type="button" class="float-right btn btn-success" onclick="registration_c('','Add')">Save</button>
	<?php }else{?>
	<button type="button" class="float-right btn btn-success" onclick="registration_c('<?php echo $updateresult[0]['user_id']?>','Update')">Update</button>
	<?php }?>
	</form>
</div>
<!-- /.box-body -->
<div id="registration_list"></div>
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


