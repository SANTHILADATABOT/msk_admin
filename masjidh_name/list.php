<script language="javascript" type="text/javascript" src="masjidh_name/masjidh_name.js"></script> 
   
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 4px 30px;">
	  <h1>
	  <div class="row">
	  <div class="col-md-6">
        <div class="top-left inline-dash"><span class="first-head">Masjidh Name List</span><br><span class="welcom inline-welcome">Settings // Masjidh Name </span></div>
		</div>
		<div class="col-md-6">
		<div class="btn-add"><a href="index.php?file=masjidh_name/create" >Add New</a></div>
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
							<th>Majidh Name</th>
							<th>Description</th>
							<th>Active Status</th>
                             <th>Action</th>
						</tr>
					</thead>
					<?php
//echo "SELECT * FROM  blood_group order by blood_id desc";
                  $organization=$pdo_conn->prepare("SELECT * FROM  masjidh_name order by masjidh_id desc");
                  $organization->execute();
                  $organizationlist=$organization->fetchAll();
					?>
					<tbody>
						<?php foreach($organizationlist as $value)
						{ 
						?>
							<tr>
							  <td><?php echo $roll_id;?></td>
							  <td><?php echo $value['masjidh_name'];?></td>
							 <td><?php echo $value['description']; ?></td>
							  <td><?php if ($value['status']=='1'){ echo "Active";} else { echo "Inactive"; }?></td>
							  <td> 
								<a href="index.php?file=masjidh_name/update&masjidh_id=<?php echo $value['masjidh_id']?>" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>  	
								<a href="#" onclick="del(<?php echo $value['masjidh_id']?>)" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
							  </td>
							</tr>								
						<?php 
						$roll_id+=1;
						} 
						?>
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
