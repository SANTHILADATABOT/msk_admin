<script language="javascript" type="text/javascript" src="accountyear/accountyear.js"></script> 
<?php 
		$from_account_year='';
		$to_account_year=''; 
		$active_status ='';
		if($_GET['accountyear_id'] !='')
		{
			  $sql = "SELECT * FROM accountyear where accountyear_id=".$_GET['accountyear_id'];
			  $pdo_statement = $pdo_conn->prepare($sql);
			  $pdo_statement->execute();
			  $updateresult = $pdo_statement->fetchAll();
			  $from_account_year =$updateresult[0]['from_account_year'];
			  $to_account_year=$updateresult[0]['to_account_year'];
			  $active_status=$updateresult[0]['active_status'];	 
		}  
?> 
    <!-- Main content -->
    <section class="content">
		
			<div class="col">
                <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
        
        <form class="was-validated" name="accountyear" autocomplete="off">
        <div class="row">
         <div class="col-md-6 ">
              <div class="form-group">
				   <h5>From Account Year</h5>
				   <div class="controls">
					    <input type="number" name="from_account_year" id="from_account_year" class="form-control"  value="<?php echo $from_account_year ?>" required>
					</div>
			  </div>
			  <div class="form-group">
				   <h5>To Account Year</h5>
				   <div class="controls">
					   <input type="number" name="to_account_year" id="to_account_year"  class="form-control"  value="<?php echo $to_account_year ?>" required>
				   </div>
			  </div>
			
			<div class="form-group">
				   <h5>Active Status</h5>
				   <div class="controls">
                   <select name="active_status" id="active_status" required class="form-control">
	                            <option value="">Select Your Status</option>
                   				<?php if($active_status == 'active'){?>
                                <option value="active" selected>Active</option>
                                <?php }else{?>
                                <option value="active" >Active</option>
                                <?php } if($active_status=='inactive'){?>
                                <option value="inactive" selected>Inactive</option>
                                <?php }else{?>
                                <option value="inactive">Inactive</option>
                                <?php }?>
							</select>
				   </div>
			  </div>
			
			
            </div>
                
          
            </div>
             
          <a href="index.php?file=accountyear/list" class="float-left btn btn-primary">Cancel</a>
          <?php if($updateresult==''){?>
		  <button type="button" class="float-right btn btn-success" onclick="accountyear_cu('','Add')">Save</button>
          <?php }else{?>
          <button type="button" class="float-right btn btn-success" onclick="accountyear_cu('<?php echo $updateresult[0]['accountyear_id']?>','Update')">Update</button>
          <?php }?>
          
          </form>
          
          
      </div>
        <!-- /.box-body -->
        <div id="accountyear_list"></div>
        <div id="distinct_error" style="color:red"></div>
      </div>
			</div>
	</section>
