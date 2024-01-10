<?php
$current_date=date('Y-m-d');

$wanted=$_GET['wanted'];
$status=$_GET['status'];

$query='';


if($wanted=='Own')
{
	$query='   and house like "%Own House%"';
}
else if($wanted=='Rent')
{
	$query='   and house like "%Rented%"';
}
else if($wanted=='Bathroom')
{
	$query='   and bathroom_availability like "%No%"';
}
else if($wanted=='Economic')
{
    if($status==''){
	    $query='   and economic_status!=""';
    }else if($status=='A'){
	    $query='   and economic_status="A"';
    }else if($status=='B'){
	    $query='   and economic_status="B"';
    }else if($status=='C'){
	    $query='   and economic_status="C"';
    }else if($status=='D'){
	    $query='   and economic_status="D"';
    }else if($status=='E'){
	    $query='   and economic_status="E"';
    }
}
else if($wanted=='Disability')
{
	$query='   and disability_pension!=""';
}
else if($wanted=='Widow')
{
	$query='   and widow_aged_welfare!=""';
}
else if($wanted=='Orphan')
{
	$query='   and destitute_orphan_welfare!=""';
}
else if($wanted=='Food')
{
	$query='   and incapable_of_working!=""';
}
else if($wanted=='Job')
{ 
	$query='   and guide_for_emp!=""';
}

else if($wanted=='Medical')
{
	$query='   and disease_details!=""';
}

else if($wanted=='Marriage')
{
	$query='   and marriage_help!=""';
}

else if($wanted=='MSK')
{
	$query='   and interested_to_serve!=""';
}

else
{
	$query='   and guide_for_emp!=""';
}	
 
 function val_of_family_name($exp_val)
    {
        $i=1;
	global $pdo_conn;
        $get_val=explode(",",$exp_val);
        $get_count=count($get_val);
        foreach($get_val as  $val_get)
        {
             if($i==$get_count) {$val_con="";  } else {$val_con=","; }
            
             $findrelationship = $pdo_conn->prepare("SELECT * From fact_finding_subform  where id='".$val_get."'");
                    $findrelationship->execute();
                    
                    $fetrelationship_list = $findrelationship->fetch();
                    $get_val_name.=$fetrelationship_list['family_head_name'].$val_con;
$i++;
        }
      //return   'ss';
      return   $get_val_name;
         
}		
 ?>
<script language="javascript" type="text/javascript" src="survey_report/survey_report.js"></script>
    
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	  <h1>
        <div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Survey Report</span><br><span class="welcom inline-welcome">Report // Survey Report </span></div>
      </h1>	  
    </section>
 
    <!-- Main content -->
 <section class="content">
	<div class="row">

		<div class="col-12">
 
			<div class="box">
				<div class="row" style="padding: 0px 32px; margin-bottom: 32px;">
    

    	<div  class="col-lg-3">
    		<h5 class="list-content">Wanted</h5>
    		<select class="form_control select2" id="wanted" name="wanted" onchange="get_economic_status(wanted.value);">
    		    <option value="Own" <?php if($wanted=='Own'){?> selected <?php } ?>>Own House</option>
    		    <option value="Rent" <?php if($wanted=='Rent'){?> selected <?php } ?>>Rented House</option>
    		    <option value="Bathroom" <?php if($wanted=='Bathroom'){?> selected <?php } ?>>Availability of Toilet / Bathroom</option>
    		    <option value="Economic" <?php if($wanted=='Economic'){?> selected <?php } ?>>Families Economic Status</option>
    		    <option value="Disability" <?php if($wanted=='Disability'){?> selected <?php } ?>>Disability Pension</option>
    		    <option value="Widow" <?php if($wanted=='Widow'){?> selected <?php } ?>>Widow / Aged Unmarried Welfare</option>
    		    <option value="Orphan" <?php if($wanted=='Orphan'){?> selected <?php } ?>>Destitute / Orphan Welfare</option>
    		    <option value="Food" <?php if($wanted=='Food'){?> selected <?php } ?>>Food Help</option>
    			<option value="Job" <?php if(($wanted=='Job')||($wanted=='')){?> selected <?php } ?>>Job Wanted</option>
    			<option value="Medical" <?php if($wanted=='Medical'){?> selected <?php } ?>>Medical Wanted</option>
    			<option value="Marriage" <?php if($wanted=='Marriage'){?> selected <?php } ?>>Marriage Wanted</option>
    			<option value="MSK" <?php if($wanted=='MSK'){?> selected <?php } ?>>MSk Join</option>
    		</select>
    	</div>
    	<?php if($wanted=='Economic'){?>
    	<div class="col-lg-3" id="economic_status_div" >
    	    	<?php } 
    	    	else {
    	    	   
    	    	?>
    	    	<div class="col-lg-3" id="economic_status_div" style="Display:None">
    <?php } ?>
    	    <h5 class="list-content">Economic Status</h5>
    	    <select class="form_control select2" id="economic_status" name="economic_status">
    	        <option value="" <?php if($status==''){?> selected <?php } ?>>Select</option>
    	        <option value="A" <?php if($status=='A'){?> selected <?php } ?>>A</option>
    	        <option value="B" <?php if($status=='B'){?> selected <?php } ?>>B</option>
    	        <option value="C" <?php if($status=='C'){?> selected <?php } ?>>C</option>
    	        <option value="D" <?php if($status=='D'){?> selected <?php } ?>>D</option>
    	        <option value="E" <?php if($status=='E'){?> selected <?php } ?>>E</option>
    	    </select>
    	</div>
    
    	 
    		<div class="go-btn ">
    	 	<a onclick="get_survey_filter_list(wanted.value)" class="hvr-sweep-to-top">Go</a>
    	 </div>
 
</div>
<table border="0" cellspacing="0" width="90%">
	<tr>
		
		<td width="10%" align="center">
            <a onclick="javascript:survey_overall_print()" style="float:right"><img  align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
		</td>
	</tr>
</table>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">               
						<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100">
							<thead>
<?php if(($wanted!="Medical"))
{?>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>Country Name</th>
									<th>State Name</th>
									<th>District Name</th>
									<th>City Name</th>
 									<th>Area Name</th>
									<th>Action</th>	
									</tr>
<?php } else {?>
                                	<tr>
									<th>#</th>
									<th>Family No</th>
									<th>Disease Details</th>
									<th>Surgery Details</th>
									<th>Name(Surgery)</th>
									<th>Mon Exp on Medicine</th>
									<th>Name(Mon Exp)</th>
									<th>Country Name</th>
									<th>State Name</th>
									<th>District Name</th>
									<th>City Name</th>
 									<th>Area Name</th>
 									<th>Action</th>	

									</tr>
<?php } ?>
							
							</thead>
							<tbody id="survey_report_list">						
<?php


if(($wanted!="Medical"))
{
    
  
								$survey = $pdo_conn->prepare("SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC");
						
								$survey->execute();
								$survey_list = $survey->fetchall();
		
								foreach($survey_list as $value)
							 	{ 
									if($wanted=='MSK')
									{
										$name=$value['interest_to_serve_msk_no'];
									}
									else if($wanted=='Job')
									{
										$name=$value['guide_for_emp'];
									}
									else if($wanted=='Medical')
									{
										$name=$value['disease_no'];
									}
									else if($wanted=='Marriage')
									{
										$name=$value['marriage_help'];
									}
									$name=$value['guide_for_emp'];
								?>
							
							    <tr>
									<td align="center"><?php echo $roll_id;?></td>
									<td align="center"><?php echo $value['family_no']?></td>
									<td align="center"><?php echo $value['contact_no']; ?></td>
									<td align="center"><?php echo get_country_name($value['country_id']);	?>	</td>
									<td align="center"><?php echo get_state_name($value['state_id']); ?></td>
									<td align="center"><?php echo get_district_name($value['district_id']); ?></td>
									<td align="center"><?php echo get_city_name($value['city_id']); ?></td> 
									<td align="center"><?php echo get_area_name($value['area_id']) ?></td>
									
								    <td> 
							  			<a href="#" title="View" id="quotation_view_modal" onclick="survey_view('<?php echo $value['survey_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  

							  			<!--  <a href="#" title="View" id="quotation_view_modal" onclick="survey_view('survey_report/view.php','<?php echo $value['survey_id'];?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
							  		</td>
								</tr>
								
								<?php 
									$roll_id+=1;
								} 
							 }else { 
							     
							 
							 
							 	$res_medical = $pdo_conn->prepare("SELECT DISTINCT a.country_id,a.district_id,a.state_id,a.city_id,a.area_id,a.survey_id,a.unique_no,a.family_no,b.disease_details,b.surgery_details,b.surgery_details_no,b.mon_exp_on_medicine,b.mon_exp_on_medicine_no,a.contact_no FROM  fact_family_disease b left join fact_finding_form a ON a.unique_no=b.unique_no  WHERE  b.delete_status!='1' and a.user_id!='0' and a.delete_status!='1' ORDER BY a.survey_id DESC");
						
								$res_medical->execute();
								$fet_list_medical = $res_medical->fetchall();
		
								foreach($fet_list_medical as $get_value)
							 	{ 
								$get_survey_id=survye_id_from_unique_no($get_value[unique_no]);
								
				           	   
                                  

								?>
							
							    <tr>
									<td align="center"><?php echo $roll_id;?></td>
									 <td align="center" class="style2 right">&nbsp;<?php echo $get_value['family_no'];?></td>
									<td align="center"><?php echo $get_value['disease_details']?></td>
									<td align="center"><?php echo $get_value['surgery_details']; ?></td>
									<td align="center"><?php echo val_of_family_name($get_value['surgery_details_no']); ?></td>
									<td align="center"><?php echo $get_value['mon_exp_on_medicine'];?>	</td>
									<td align="center"><?php echo val_of_family_name($get_value['mon_exp_on_medicine_no']); ?></td>
									<td align="center"><?php echo get_country_name($get_value['country_id']);	?>	</td>
									<td align="center"><?php echo get_state_name($get_value['state_id']); ?></td>
									<td align="center"><?php echo get_district_name($get_value['district_id']); ?></td>
									<td align="center"><?php echo get_city_name($get_value['city_id']); ?></td> 
									<td align="center"><?php echo get_area_name($get_value['area_id']) ?></td>
									
								    <td> 
							  			<a href="#" title="View" id="quotation_view_modal" onclick="survey_view('<?php echo $get_survey_id ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  

							  			<!--  <a href="#" title="View" id="quotation_view_modal" onclick="survey_view('survey_report/view.php','<?php echo $value['survey_id'];?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
							  		</td>
								</tr>
								
								<?php 
									$roll_id+=1;
							 
							 	}
							  } ?>

								
							</tbody>				  
			
						</table>


					<!--	<div class="modal fade" id="quotation_view" width="1000">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			               <!-- <div class="modal-header">
			                  <h3 class="modal-title">Survey View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>-->
			                <!-- Modal body -->
			               <!-- <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>-->
			                <!-- Modal footer -->
			          <!--      <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> 
					</div>              
				</div>-->
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
		<!-- /.content -->
<script type="text/javascript">
	

function get_survey_filter_list(wanted) 
{
  
    var status = $("#economic_status").val();
    if(wanted!='Economic'){
	    status='';
	}

	window.location.href="index.php?file=survey_report/list&wanted="+wanted+"&status="+status;

	/*jQuery.ajax({
	type: "POST",
	url: "survey_report/survey_list.php",
	data: "wanted="+wanted,
	success: function(msg)
	{ 
		//alert(msg);
		
	  $("#survey_report_list").html(msg);
	}
	});*/
	
	
}
/*function survey_view(url, survey_id)
{
	window.open(url+'?survey_id='+survey_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
}*/
/*function customer_view_modal(url, customer_id)
{
	window.open(url+'?customer_id='+customer_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
}*/
function survey_view(survey_id)
{ 
	jQuery.ajax({
	type: "POST",
	url: "survey_report/view.php",
	data: "survey_id="+survey_id,
	success: function(msg)
	{ 
		//alert(msg);
		//window.open.href="index.php?file=survey_report/view";
window.open('survey_report/view.php?survey_id='+survey_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	 // $("#quotation_view_modal_body").html(msg);
	}
	});
}	
function survey_overall_print()
{
var wanted_data=$("#wanted option:selected").val();
var status = $("#economic_status").val();
jQuery.ajax({
	type: "POST",
	url: "survey_report/survey_overall_print.php",
	data: "wanted_data="+wanted_data+"&status="+status,
	success: function(msg)
	{ 
	    if(wanted_data=="Medical")
	    {
		window.open('survey_report/survey_medical_print.php?wanted_data='+wanted_data,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	    }
	    else
	    {
	   	window.open('survey_report/survey_overall_print.php?wanted_data='+wanted_data+'&status='+status,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
    
	    }

	}
	});

}

function get_economic_status(wanted){
    if(wanted=='Economic'){
        $('#economic_status_div').show();
    }else{
        $('#economic_status_div').hide();
    }
}
</script>