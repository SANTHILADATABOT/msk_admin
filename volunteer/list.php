<script language="javascript" type="text/javascript" src="usercreation/usercreation.js"></script>   
  
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 4px 30px;">
	  <h1>
	  <div class="row">
	  <div class="col-md-6">
        <div class="top-left inline-dash"><span class="first-head"><?php echo ucfirst($foldername);?> List</span><br><span class="welcom inline-welcome">Settings // <?php echo ucfirst($foldername); ?> </span></div>
		</div>
		<div class="col-md-6">
		&nbsp;
		</div>
      </h1>	  
    </section>
  
    <!-- Main content -->
         <section class="content">
      <div class="row">
        <div class="col-12">
         
          <div class="box">
              <div class="box-head">
    			<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
    				<div class="col-md-12">
    				    <div class="pull-right">
        					<div class="mr-3" style="display:inline-block;width:150px;">
        						<h5 class="list-content" for="active_status">Active Status</h5>
        						<select id="active_status" class="form-control select2" disabled>
        							<option value="">Select Status</option>
        							<option value="1">Active</option>
        							<option value="0">Inactive</option>
        						</select>
        					</div>
        					<div class="go-btn" style="display:inline-block;cursor:pointer;">
        						<button id="active_status_btn" onclick="set_select_status()" class="btn btn-primary mt-0" disabled>SAVE</button>
        					</div>
    					</div>
    				</div>
    			</div>
			</div>
            
            <!-- /.box-header -->
            <div class="box-body">
				<div class="table-responsive">               
				  <table id="VolunteerTable" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100">
					<thead>
						<tr>
							<th><input type="checkbox" id="select_cb_all" style="position: static;opacity:1;" onclick="select_cb_all_click(this.checked)" /></th>
							<th>#</th>
							<th>User Name</th>
							<th>Mobile Number</th>
							<th>Password</th>
							<th>Country</th>
							<th>State</th>
							<th>District</th>
							<th>City</th>
							<th>Area</th>
							<th>Active Status</th>
						</tr>
					</thead>
					<tbody>
						
                        <?php
                        $pdo_usercreation = $pdo_conn->prepare("SELECT * FROM usercreation where if_volunteer_user='volunteer' ORDER BY user_id DESC");
                        $pdo_usercreation->execute();
                        $pdousercreation = $pdo_usercreation->fetchAll();
                        foreach($pdousercreation as $value){ ?>
                        <tr>
							<td><input type="checkbox" class="select_cb_indiv" id="select_cb-<?php echo $value['user_id'];?>" style="position: static;opacity:1;" onclick="select_cb_indiv_click()" /></td>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['username'];?></td>
							<td><?php echo $value['mobile'];?></td>
							<td><?php echo $value['password'];?></td>
            				<td align="center"><?php echo get_country_name($value['country_id']);	?> </td>
            				<td align="center"><?php echo get_state_name($value['state_id']); ?></td>
            				<td align="center"><?php echo get_district_name($value['district_id']); ?></td>
            				<td align="center"><?php echo get_city_name($value['city_id']); ?></td>
            				<td align="center"><?php echo get_area_name($value['area_id']) ?></td>
							<td align="center"><?php echo ($value['active_status']=='1')?'Active':'Inactive';?></td>
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
	
<script>
    var VolunteerTable=null;
    $(document).ready(function(){
        VolunteerTable=$("#VolunteerTable").DataTable({
            columnDefs: [
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }
            ],
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            order: [[1, 'asc']]
        });
    });
    function select_cb_all_click(checked1){
        var row_cnt=VolunteerTable.rows().count();
        for(let i1=0;i1<row_cnt;i1++){
            var ch1=$(VolunteerTable.cell({row:i1, column: 0}).node()).find('.select_cb_indiv');
            ch1.prop('checked', checked1);
        }
        check_status_save(checked1);
    }
    function select_cb_indiv_click(){
        var row_cnt=VolunteerTable.rows().count();
        let i0=0;
        for(let i1=0;i1<row_cnt;i1++){
            var ch1=$(VolunteerTable.cell({row:i1, column: 0}).node()).find('.select_cb_indiv');
            if(ch1.prop('checked')){i0++;}
        }
        if(i0==0){
            document.getElementById("select_cb_all").indeterminate=false;
            document.getElementById("select_cb_all").checked=false;
            check_status_save(false);
        }else if(i0==row_cnt){
            document.getElementById("select_cb_all").indeterminate=false;
            document.getElementById("select_cb_all").checked=true;
            check_status_save(true);
        }else{
            document.getElementById("select_cb_all").indeterminate=true;
            check_status_save(true);
        }
    }
    function check_status_save(ch1){
        if(ch1){
            document.getElementById("active_status").removeAttribute('disabled');
            document.getElementById("active_status_btn").removeAttribute('disabled');
        }else{
            document.getElementById("active_status").setAttribute('disabled','disabled');
            document.getElementById("active_status_btn").setAttribute('disabled','disabled');
        }
    }
    function set_select_status(){
        var active_status=$("#active_status").val();
        if(active_status!=''){
            document.getElementById("active_status_btn").setAttribute('disabled','disabled');
            var row_cnt=VolunteerTable.rows().count();
            var active_status1=[];
            for(let i1=0;i1<row_cnt;i1++){
                var ch1=$(VolunteerTable.cell({row:i1, column: 0}).node()).find('.select_cb_indiv');
                var id1=((ch1.attr('id')).split('-'))[1];
                if(ch1.prop('checked')){active_status1.push(id1);}
            }
    		jQuery.ajax({
    			type: "POST",
    			url: "volunteer/model.php",
    			data: {action:'Update_status',active_status1:JSON.stringify(active_status1),active_status:active_status},
    			success: function(msg){
                    document.getElementById("active_status_btn").removeAttribute('disabled');
                    if(msg=="Successfully Updated"){
                        window.location.reload();
                    }
    			}
    		});
        }else{
            
        }
    }
</script>

