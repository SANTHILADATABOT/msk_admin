    
	<script language="javascript" type="text/javascript" src="country/country.js"></script>
	
	
	
	<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 4px 30px;">
	  <h1>
	  <div class="row">
	  <div class="col-md-6">
        <div class="top-left inline-dash"><span class="first-head"><?php echo ucfirst($foldername);?> List</span><br><span class="welcom inline-welcome">Settings // <?php echo ucfirst($foldername); ?> </span></div>
		</div>
		<div class="col-md-6">
		<div class="btn-add"><a href="index.php?file=country/create" >Add New</a></div>
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
							<th>Country Name</th>
							<th>Status</th>
							
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>						
                        <?php foreach($country_list as $value){?>
                        
                           <tr>
						    <td><?php echo $roll_id;?></td>
							<td><?php echo $value['country_name'];?></td>
							<td><?php if ($value['status']=='1'){ echo "Active";} else { echo "Inactive"; }?></td>
							
                           <td> 
<!--						  <a href="index.php?file=country/view&country_id=<?php echo $value['country_id']?>" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></a>  
-->						  <a href="index.php?file=country/update&country_id=<?php echo $value['country_id']?>" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>  	
                          <a href="#" onclick="del(<?php echo $value['country_id']?>)" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
						  
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
