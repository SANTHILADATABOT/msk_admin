<script language="javascript" type="text/javascript" src="usercreation/usercreation.js"></script>   
  
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 4px 30px;">
	  <h1>
	  <div class="row">
	  <div class="col-md-6">
        <div class="top-left inline-dash"><span class="first-head"><?php echo ucfirst($foldername);?> List</span><br><span class="welcom inline-welcome">Settings // <?php echo ucfirst($foldername); ?> </span></div>
		</div>
		<div class="col-md-6">
		<div class="btn-add"><a href="index.php?file=usercreation/create" >Add New</a></div>
		</div>
      </h1>	  
    </section>
  
    <!-- Main content -->
         <section class="content">
      <div class="row">
        <div class="col-12">
         
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
				<div class="table-responsive">               
				  <table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100">
					<thead>
						<tr>
							<th>#</th>
							<th>User Role</th>
							<th>User Name</th>
							<th>Mobile Number</th>
							<th>Password</th>
							<th>Country</th>
							<th>State</th>
							<th>District</th>
							<th>City</th>
							<th>Area</th>
							<th>Active Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
                        <?php
                        $pdo_usercreation = $pdo_conn->prepare("SELECT * FROM usercreation where if_volunteer_user='' ORDER BY user_id DESC");
                        $pdo_usercreation->execute();
                        $pdousercreation = $pdo_usercreation->fetchAll();
                        foreach($pdousercreation as $value){ ?>
                        <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo get_user_type($value['user_type']);?></td>
							<td><?php echo $value['username'];?></td>
							<td><?php echo $value['mobile'];?></td>
							<td><?php echo $value['password'];?></td>
            				<td align="center"><?php echo get_country_name($value['country_id']);	?> </td>
            				<td align="center"><?php echo get_state_name($value['state_id']); ?></td>
            				<td align="center"><?php echo get_district_name($value['district_id']); ?></td>
            				<td align="center"><?php echo get_city_name($value['city_id']); ?></td>
            				<td align="center"><?php echo get_area_name($value['area_id']) ?></td>
							<td align="center"><?php echo ($value['active_status']=='1')?'Active':'Inactive';?></td>
							<td>
							  <a href="index.php?file=usercreation/update&user_id=<?php echo $value['user_id']?>" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>  	
                          	  <a href="#" onclick="del(<?php echo $value['user_id']?>)"title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
						  
						  </td>
						</tr>
                        <?php $roll_id+=1;}?>
						
						
					</tbody>				  
					
				</table>
				</div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	<!-- /.content -->
