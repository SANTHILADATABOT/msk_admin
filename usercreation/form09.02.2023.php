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

			</div>
<div class="col-md-6 ">
			<div class="form-group">
				<h5>User Name</h5>
				<div class="controls">
					<input type="text" name="username" id="username" value="<?php echo $updateresult[0]['username'];?>" class="form-control"   required>
				<div id="user_name_error"></div>
				</div>
			</div>
			</div>
<div class="col-md-6 ">
			<div class="form-group">
				<h5>Mobile Number</h5>
				<div class="controls">
					<input type="text" name="mobile" id="mobile" value="<?php echo $updateresult[0]['username'];?>" class="form-control" maxlength="10"   required>
				<div id="user_name_error"></div>
				</div>
			</div>

			 </div>
<div class="col-md-6 ">
			<div class="form-group">
				<h5>Email Address  </h5>
				<div class="controls">
					<input type="text" name="email" id="email" class="form-control"  required>
				
				<div id="address_error"></div>
				</div>
			</div>
			</div>
			<div class="col-md-6 ">
			<div class="form-group">
				<h5>Password </h5>
				<div class="controls">
					<input type="password"  name="password" id="password" class="form-control"  required>
				<div id="password_error"></div>
				</div>
			</div>
</div>
<div class="col-md-6 ">
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
</div>
<div class="col-md-6 ">
			<div class="form-group">
				<h5>State  </h5>
				<div class="controls">
					<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district(country_id.value,this.value)">
					<option value="">Select State</option>
					 <?php
						if($updateresult!='') {
						$state = $pdo_conn->prepare("SELECT * FROM state WHERE country_id='".$updateresult[0]['country_id']."'");
						$state->execute();
						$record = $state->fetchall();
						foreach ($record as  $value) { ?>
						 
						<option value="<?php echo $value['state_id']?>"><?php echo $value['state_name']?></option>
					<?php } } ?>
					</select>
				</div>
			</div>
</div>
<div class="col-md-6 ">
			<div class="form-group">
				<h5>District  </h5>
				<div class="controls">
					<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city(country_id.value,state_id.value,this.value)">
					<option value="">Select District</option>
					 	<?php
							if($updateresult!='') {
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
<div class="col-md-6 ">
			<div class="form-group">
				<h5>City  </h5>
				<div class="controls">
					<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area(country_id.value,state_id.value,district_id.value,this.value)">
					<option value="">Select City</option>
		 			<?php
						if($updateresult!='') {
						$state = $pdo_conn->prepare("SELECT * FROM city WHERE country_id='".$updateresult[0]['country_id']."' and state_id='".$updateresult[0]['state_id']."' and city_id='".$updateresult[0]['city_id']."'");
						$state->execute();
						$record = $state->fetchall();
						foreach ($record as  $value) { ?>
						 
						<option value="<?php echo $value['city_id']?>"  ><?php echo $value['city_name']?></option>
					<?php }	} ?>
					</select>
				</div>
			</div>
</div>
<div class="col-md-6 ">
			<div class="form-group">
				<h5>Area  </h5>
				<div class="controls">
					<select name="area_id" id="area_id" required class="form-control select2 item_name"  >
					<option value="">Select Area</option>
					 <?php
						if($updateresult!='') {
						$state = $pdo_conn->prepare("SELECT * FROM area WHERE country_id='".$updateresult[0]['country_id']."' and state_id='".$updateresult[0]['state_id']."' and city_id='".$updateresult[0]['city_id']."' ");
						$state->execute();
						$record = $state->fetchall();
						foreach ($record as  $value) { ?>
						 
						<option value="<?php echo $value['area_id']?>"  ><?php echo $value['area_name']?></option>
					<?php }	} ?>
					</select>
				</div>
			</div>
</div>
<div class="col-md-6 ">
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
           <div class="col-md-12 go-btn"><br><br>  
	<Center><a href="index.php?file=usercreation/list" class="hvr-sweep-to-top">Cancel</a>
	<?php if($updateresult==''){?>
	<a  class="hvr-sweep-to-top" onclick="usercreation_c('','Add')">Save</a>
	<?php }else{?>
	<a class="hvr-sweep-to-top" onclick="usercreation_c('<?php echo $updateresult[0]['user_id']?>','Update')">Update</a>
	<?php }?></center></div>
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
document.getElementById("mobile").value ="<?php echo $updateresult[0]['mobile'];?>";
document.getElementById("active_status").value ="<?php echo $updateresult[0]['active_status'];?>";
document.getElementById("country_id").value ="<?php echo $updateresult[0]['country_id'];?>";
document.getElementById("state_id").value ="<?php echo $updateresult[0]['state_id'];?>";
document.getElementById("district_id").value ="<?php echo $updateresult[0]['district_id'];?>";
document.getElementById("city_id").value ="<?php echo $updateresult[0]['city_id'];?>";
document.getElementById("area_id").value ="<?php echo $updateresult[0]['area_id'];?>";
</script>
<?php 
}
?>


