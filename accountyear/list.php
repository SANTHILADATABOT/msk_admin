<script language="javascript" type="text/javascript" src="accountyear/accountyear.js"></script>  
<?php
	$page_add = get_roll_action_permission('accountingyear', 'add', $userroll);
	$page_edit = get_roll_action_permission('accountingyear', 'edit', $userroll);
	$page_delete = get_roll_action_permission('accountingyear', 'delete', $userroll);
?>
    <section class="content-header">
      <h1>
        <small>Manage</small>
     <?php echo ucfirst($foldername);
      // if($page_add == '1')
      {?> <a href="index.php?file=accountyear/create" class="float-right btn-sm btn-primary">Add New</a> <?php } ?>
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
							<th>From Account Year</th>
							<th>To Account Year</th>
							<th>Active Status</th>
							
              <th>Action</th>
						</tr>
					</thead>
					<tbody>						
                         <?php foreach($pdoaccountyear as $value){ ?>
                         <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['from_account_year'];?></td>
							<td><?php echo $value['to_account_year'];?></td>
							<td><?php echo ucfirst($value['active_status'])?></td>
							
                           <td>
                           <?php  if($page_edit == '1'){?>
						  <a href="index.php?file=accountyear/update&accountyear_id=<?php echo $value['accountyear_id']?>" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                          <?php } ?>
                          <?php if($value['active_status'] != 'active' && $page_delete == '1'){ 	?> 	
                          <a href="#" onclick="del(<?php echo $value['accountyear_id']?>)" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
						  <?php } ?>
						  </td>
						</tr>
                         <?php $roll_id+=1;} ?>
						
						
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
