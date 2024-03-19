 
     <section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	  <h1>
        <div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Job Application Report</span><br><span class="welcom inline-welcome">Report // Job Application Report</span></div>
      </h1>	  
    </section>
<?php 
$country_id =   $_SESSION['country_id'];
$state_id =   $_SESSION['state_id'];
$district_id =   $_SESSION['district_id'];
$city_id =   $_SESSION['city_id'];
$area_id =   $_SESSION['area_id'];
$user_type  =   $_SESSION['user_roll'];


if($user_type=='1')
{
	$user_type_query='';	 
}
else if($user_type=='2')
{
	$user_type_query='  and country_id="'.$country_id.'"';	 
}
else if($user_type=='3')
{
	$user_type_query='  and country_id="'.$country_id.'"  and state_id="'.$state_id.'" ';
}
else if($user_type=='4')
{
	$user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
}
else if($user_type=='5')
{
    $user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';	  
}
else if ($user_type=='6') {
	$user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'" and area_id="'.$area_id.'"';
}

$dash_country_id =   $_GET['dash_country_id'];
$dash_state_id =   $_GET['dash_state_id'];
$dash_district_id =   $_GET['dash_district_id'];
$dash_city_id =   $_GET['dash_city_id'];
$dash_area_id =   $_GET['dash_area_id'];

$dash_query='';

if($dash_country_id!='')
{
	$dash_query.='   and country_id="'.$dash_country_id.'"';
}

if($dash_state_id!='')
{
	$dash_query.='   and state_id="'.$dash_state_id.'"';
}

if($dash_district_id!='')
{
	$dash_query.='   and district_id="'.$dash_district_id.'"';
}

if($dash_city_id!='')
{
	$dash_query.='   and city_id="'.$dash_city_id.'"';
}

if($dash_area_id!='')
{
	$dash_query.='   and area_id="'.$dash_area_id.'"';
}

$prepare = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $user_type_query $dash_query ");
$prepare->execute();
$country_list = $prepare->fetchall();
if($_GET['id_number']=="" && $_GET['qualification']=="")
{

    
  
 $select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $user_type_query $dash_query ORDER BY job_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();

}


 else if($_GET['id_number']!="" && $_GET['qualification']=="" ){

    $query = "AND id_no='".$_GET['id_number']."' ";
  
 $select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $query $user_type_query $dash_query ORDER BY job_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();

}
else if($_GET['id_number']=="" && $_GET['qualification']!="" ){

    $query = "AND qualification='".$_GET['qualification']."' ";
  
 $select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $query $user_type_query $dash_query ORDER BY job_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();

}


else 
{
  $query = "AND id_no='".$_GET['id_number']."' AND qualification='".$_GET['qualification']."' ";
  
 $select_customer_creation = $pdo_conn->prepare("SELECT * FROM job_application WHERE status='1' $query $user_type_query $dash_query ORDER BY job_id DESC");
  $select_customer_creation->execute();
  $survey_list = $select_customer_creation->fetchAll();

}

?>
 
    <!-- Main content -->
 <section
  class="content">
<form>
			<div class="box">
				<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
     

<div  class="col-md-3">
    		<h5 class="list-content">ID Number</h5>
    		 
    	 
					<select name="id_number" id="id_number" required class="form-control select2 item_name" >
						<option value="">Select ID Number</option>
							<?php 
							
							foreach($country_list as $value) { ?>
								<option value="<?php echo $value['id_no']?>" <?php if($value['id_no']==$_GET['id_number']){ echo "selected"; }?>><?php echo $value['id_no']?></option>
							<?php } ?>
					</select>
				</div>

			<div  class="col-md-3">
    		<h5 class="list-content">Education Qualification</h5>
    		 
    	 
					<select name="qualification" id="qualification" required class="form-control select2 item_name" >
						<option value="">Select Qualification</option>
							<?php 
							
							foreach($country_list as $value) { ?>
								<option value="<?php echo $value['qualification']?>" <?php if($value['qualification']==$_GET['qualification']){ echo "selected"; }?>><?php echo $value['qualification']?></option>
							<?php } ?>
					</select>
				</div>	
					<div  class="col-md-3">
		  <div class="go-btn ">
    	 	<a onclick="get_survey_filter_list()" class="hvr-sweep-to-top">Go</a>
    	 </div> 	
    	</div>
    	 
    	</div>


<table border="0" cellspacing="0" width="90%">
	<tr>
		
		<td width="10%" align="center">
            <a onclick="javascript:job_application_overall_print()" style="float:right"><img  align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
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
							<th>Name</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Education Qualification</th>
							<th>Marital Status</th>
							<th>Mobile No</th>
							<th>Action</th>
							 
						</tr>
					</thead>
						<tbody id="areawise_count_list" >	
 <?php
 //echo "SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC";
						 

						 foreach($survey_list as $value){?>
						
						   <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['id_no'];	?>	</td>
							<td><?php echo $value['name']; ?></td>
						    <td><?php echo $value['age']; ?></td>
							<td><?php echo  $value['gender']; ?></td>
							<td><?php echo  $value['qualification']; ?></td> 
							<td><?php echo $value['marital_status'];?></td>
							<td><?php echo $value['mobile_no']; ?> </td>
							 <td>
							 <a href="#" title="View" id="quotation_view_modal" onclick="jobapplication_view('<?php echo $value['job_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  
							 
							 <a href="#" title="Delete" id="quotation_view_modal" onclick="jobapplication_delete('<?php echo $value['job_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-trash" aria-hidden="true"></i></a>  
						<!-- <a href="#" title="View" id="quotation_view_modal" onclick="jobapplication_view('<?php echo $value['job_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  -->
							 
						</tr>
						
						<?php $roll_id+=1;}?>
 </tbody>
	
 </table>
 
</div>
</div><!--
 <div class="modal fade" id="quotation_view">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			               <!-- <div class="modal-header">
			                  <h3 class="modal-title">Job Application View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <!-- Modal body -->
			              <!--  <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>
			                <!-- Modal footer -->
			                <!--<div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> -->
			<!-- /.box -->

		      
</div>
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
	 var qualification =document.getElementById("qualification").value;
 

  var format ="id_number="+id_number+"&qualification="+qualification;
  //var format ="from_date="+from_date+"&to_date="+to_date+"&staffcreation_id="+staffcreation_id;
window.location.href = "index.php?file=jobapplication_report/list&"+format;
}

function jobapplication_view(job_id)
{ 
//alert("check"+job_id);	
	jQuery.ajax({
	type: "POST",
	url: "jobapplication_report/job_application.php?",
	data: "job_id="+job_id,
	success: function(msg)
	{ 
		//alert(msg);
	 // $("#quotation_view_modal_body").html(msg);
	 window.open('jobapplication_report/job_application.php?job_id='+job_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	}
	});
}

function jobapplication_delete(job_id)
{ 
    if (confirm("Are you sure?")) {
        // your deletion code
//alert("check"+job_id);	
	jQuery.ajax({
	type: "POST",
	url: "jobapplication_report/delete.php?",
	data: "job_id="+job_id,
	success: function(msg)
	{ 
		alert(msg);
	 	window.location.href = 'index.php?file=jobapplication_report/list';
	   
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
	url: "areawise_survey_report/job_application.php?",
	data: "survey_id="+survey_id,
	success: function(msg)
	{ 
		//alert(msg);
	  $("#quotation_view_modal_body").html(msg);
	}
	});
}	
function job_application_overall_print()
{
    var dash_country_id =   '<?php echo $dash_country_id; ?>';
    var dash_state_id   =   '<?php echo $dash_state_id; ?>';
    var dash_district_id    =   '<?php echo $dash_district_id; ?>';
    var dash_city_id    =   '<?php echo $dash_city_id; ?>';
    var dash_area_id    =   '<?php echo $dash_area_id; ?>';

var id_number =document.getElementById("id_number").value;
var qualification =document.getElementById("qualification").value;
jQuery.ajax({
	type: "POST",
	url: "jobapplication_report/job_application_overall_print.php",
	data: "id_number="+id_number+"&dash_country_id="+dash_country_id+"&dash_state_id="+dash_state_id+"&dash_district_id="+dash_district_id+"&dash_city_id="+dash_city_id+"&dash_area_id="+dash_area_id,
	success: function(msg)
	{ 
		//alert(msg);
		window.open('jobapplication_report/job_application_overall_print.php?id_number='+id_number+"&qualification="+qualification+"&dash_country_id="+dash_country_id+"&dash_state_id="+dash_state_id+"&dash_district_id="+dash_district_id+"&dash_city_id="+dash_city_id+"&dash_area_id="+dash_area_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	}
	});

}
</script>