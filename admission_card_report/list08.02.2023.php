 
     <section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	  <h1>
        <div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Admission Card Report</span><br><span class="welcom inline-welcome">Report // Admission Card Report</span></div>
      </h1>	  
    </section>

 
    <!-- Main content -->
 <section class="content">
<form>
			<div class="box">
				<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
     

    <?php


if($_GET['id_number']=="")
{
  $select_customer_creation = $pdo_conn->prepare("SELECT * FROM admission_card WHERE delete_status!='1'  ORDER BY admission_card_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();
}
else if($_GET['id_number']!="" )
{
	$query = "AND id_number='".$_GET['id_number']."' ";
	$select_customer_creation = $pdo_conn->prepare("SELECT * FROM admission_card WHERE delete_status!='1' $query ORDER BY admission_card_id DESC");
	$select_customer_creation->execute();
	$survey_list = $select_customer_creation->fetchAll();
}
    ?>	

     
</div>
<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
<div  class="col-md-2">
    		<h5 class="list-content">ID Number</h5>
    		 
    	 
					<select name="id_number" id="id_number" required class="form-control select2 item_name" >
						<option value="">Select ID Number</option>
							<?php 
							$prepare = $pdo_conn->prepare("SELECT * FROM admission_card WHERE delete_status!='1'");
							$prepare->execute();
							$country_list = $prepare->fetchall();
							foreach($country_list as $value) { ?>
							<option value="<?php echo $value['id_number']?>" <?php if($value['id_number']==$_GET['id_number']){ echo "selected"; }?>><?php echo $value['id_number']?></option>
							<?php } ?>
					</select>
				</div>
					<div  class="col-md-2">
		  <div class="go-btn ">
    	 	<a onclick="get_survey_filter_list()" class="hvr-sweep-to-top">Go</a>
    	 </div> 	
    	</div>
    	 
    	</div>
<table border="0" cellspacing="0" width="90%">
	<tr>
		
		<td width="10%" align="center">
            <a onclick="javascript:application_card_overall_print()" style="float:right"><img  align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
		</td>
	</tr>
</table>
 
 <!-- /.box-header --> 
		<div class="box-body">
			<div class="table-responsive">          
			     
				<table id="example" class="table table-bordered table-hover table-striped display nowrap margin-top-10 w-p100 boreder">
					
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Patient Name</th>
							<th>Mobile No</th>
							<th>Address</th>
							<th>Hosptial Name</th>
							<th>Contact Person Name</th>
							
							<th>Action</th>
							 
						</tr>
					</thead>
						<tbody id="areawise_count_list" >	
 <?php
 //echo "SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC";
						

						 foreach($survey_list as $value){?>
						
						   <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['id_number'];	?>	</td>
							<td><?php echo $value['patient_name'];	?>	</td>
							<td><?php echo $value['mobile_no']; ?> </td>
							<td><?php echo $value['address']; ?></td>
						    <td><?php echo $value['hospital_name']; ?></td>
						    <td><?php echo $value['contact_person']; ?></td>
							
							
							 <td>
						<!-- <a href="#" title="View" id="quotation_view_modal" onclick="admission_card_view('<?php echo $value['admission_card_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  -->
						 <a href="#" title="View" id="quotation_view_modal" onclick="admission_card_view('<?php echo $value['admission_card_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  
						 
						 <a href="#" title="Delete" id="quotation_view_modal" onclick="admission_card_delete('<?php echo $value['admission_card_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-trash" aria-hidden="true"></i></a>  
							 
						</tr>
						
						<?php $roll_id+=1;}?>
 </tbody>
	
 </table>
 
</div>
</div>
<!--
 <div class="modal fade" id="quotation_view">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			             <!--   <div class="modal-header">
			                  <h3 class="modal-title">Admission Card View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <!-- Modal body -->
			              <!--  <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>
			                <!-- Modal footer -->
			              <!--  <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> -->
			<!-- /.box -->

		 
		<!-- /.col -->
	 
	<!-- /.row -->
 		<!-- /.content -->
 		</form>
 		</section>
		</div>
<script type="text/javascript">
	function get_survey_filter_list() 
{
	 var id_number =document.getElementById("id_number").value;
 

  var format ="id_number="+id_number;
  //var format ="from_date="+from_date+"&to_date="+to_date+"&staffcreation_id="+staffcreation_id;
window.location.href = "index.php?file=admission_card_report/list&"+format;
}


	
function admission_card_view(admission_card_id)
{ 
	jQuery.ajax({
	type: "POST",
	url: "admission_card_report/admission_card.php?",
	data: "admission_card_id="+admission_card_id,
	success: function(msg)
	{ 
		//alert(msg);
	 // $("#quotation_view_modal_body").html(msg);
	 window.open('admission_card_report/admission_card.php?admission_card_id='+admission_card_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	}
	});
}

function admission_card_delete(admission_card_id)
{ 
    if (confirm("Are you sure?")) {
        // your deletion code
    
	jQuery.ajax({
	type: "POST",
	url: "admission_card_report/delete.php?",
	data: "admission_card_id="+admission_card_id,
	success: function(msg)
	{ 
		alert(msg);
	 	window.location.href = 'index.php?file=admission_card_report/list';
	   
	}
	});
	
    }
    return false;
}
	
function get_state_list(country_id)
{
	format=$("form").serialize()+"&action=state_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#state_id").html(msg);		 
		}
	});
}

function get_district_list(country_id,state_id)
{
	format=$("form").serialize()+"&action=district_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#district_id").html(msg);		 
		}
	});
}

function get_city_list(country_id,state_id,district_id)
{
	format=$("form").serialize()+"&action=city_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#city_id").html(msg);		 
		}
	});
}

function get_area_list(country_id,state_id,district_id,city_id)
{
	format=$("form").serialize()+"&action=area_list";
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: format,
		success: function(msg)
		{ 
		    $("#area_id").html(msg);		 
		}
	});
} 

function  get_filter_list(country_id,state_id,district_id,city_id,area_id)
{
	 
	jQuery.ajax({
	type: "POST",
	url: "areawise_survey_report/areawise_survey_list.php",
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id,
	success: function(msg)
	{ 
		// /alert(msg);
	 $("#areawise_count_list").html(msg);
	}
});
}

function area_survey_view(survey_id)
{ 
	jQuery.ajax({
	type: "POST",
	url: "areawise_survey_report/admission_card.php?",
	data: "survey_id="+survey_id,
	success: function(msg)
	{ 
		//alert(msg);
	  $("#quotation_view_modal_body").html(msg);
	}
	});
}	
function application_card_overall_print()
{
var id_number =document.getElementById("id_number").value;
jQuery.ajax({
	type: "POST",
	url: "admission_card_report/application_card_overall_print.php",
	data: "id_number="+id_number,
	success: function(msg)
	{ 
		//alert(msg);
		window.open('admission_card_report/application_card_overall_print.php?id_number='+id_number,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	}
	});

}
</script>