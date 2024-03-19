
     <section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 25px 0px;">
	  <h1>
        <div class="top-left inline-dash" style="padding: 0px 13px;top: 7px;"><span class="first-head">Food Needed Report</span><br><span class="welcom inline-welcome">Report // Food Needed Report</span></div>
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
	$country_query  =   '';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='2')
{
	$user_type_query='  and country_id="'.$country_id.'"';
	$country_query  =   '  and country_id="'.$country_id.'"';
	$state_query    =   '';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='3')
{
	$user_type_query='  and country_id="'.$country_id.'"  and state_id="'.$state_id.'" ';
	$country_query  =   '  and country_id="'.$country_id.'"';
	$state_query    =   ' and country_id="'.$country_id.'"  and state_id="'.$state_id.'"';
	$district_query =   '';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='4')
{
	$user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$country_query  =   '  and country_id="'.$country_id.'"';
	$state_query    =   ' and country_id="'.$country_id.'"  and state_id="'.$state_id.'"';
	$district_query =   ' and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$city_query =   '';
	$area_query =   '';
}
else if($user_type=='5')
{
    $user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';	  
    $country_query  =   '  and country_id="'.$country_id.'"';
	$state_query    =   ' and country_id="'.$country_id.'"  and state_id="'.$state_id.'"';
	$district_query =   ' and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$city_query =   ' and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';
	$area_query =   '';
}
else if ($user_type=='6') {
	$user_type_query='  and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'" and area_id="'.$area_id.'"';
	$country_query  =   '  and country_id="'.$country_id.'"';
	$state_query    =   ' and country_id="'.$country_id.'"  and state_id="'.$state_id.'"';
	$district_query =   ' and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'"';
	$city_query =   ' and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'"';
	$area_query =   ' and country_id="'.$country_id.'" and state_id="'.$state_id.'" and district_id="'.$district_id.'" and city_id="'.$city_id.'" and area_id="'.$area_id.'"';
}


?>
  
    <!-- Main content -->
 <section class="content">
<form>
			<div class="box">
				<div class="row" style="padding: 0px 33px; margin-bottom: 33px;">
     

    	<div  class="col-md-2">
    		<h5 class="list-content">Country</h5>
    		 
    	 
					<select name="country_id" id="country_id" required class="form-control select2 item_name" onchange="get_state_list(country_id.value)">
						<option value="">Select Country</option>
							<?php 
							$prepare = $pdo_conn->prepare("SELECT * FROM country WHERE delete_status!='1' and status='1' $country_query");
							$prepare->execute();
							$country_list = $prepare->fetchall();
							foreach($country_list as $value) { ?>
								<option value="<?php echo $value['country_id']?>"><?php echo $value['country_name']?></option>
							<?php } ?>
					</select>
		 
    	</div>
    	 
    	<div  class="col-md-2">
    		<h5 class="list-content">State</h5>
    		<select name="state_id" id="state_id" required class="form-control select2 item_name" onchange="get_district_list(country_id.value,state_id.value)">
						<option value="">Select State</option>
							<?php 
				// 			$state = $pdo_conn->prepare("SELECT * FROM state WHERE delete_status!='1' and status='1' ");
				// 			$state->execute();
				// 			$state_list = $state->fetchall();
				// 			foreach($state_list as $value) { 
							?>
								<!--<option value="<?php echo $value['state_id']?>"><?php echo $value['state_name']?></option>-->
							<?php //} ?>
					</select>
    	</div>

    	<div  class="col-md-2">
    		<h5 class="list-content">District</h5>
    		<select name="district_id" id="district_id" required class="form-control select2 item_name" onchange="get_city_list(country_id.value,state_id.value,district_id.value)">
						<option value="">Select District</option>
							<?php 
				// 			$district = $pdo_conn->prepare("SELECT * FROM district WHERE delete_status!='1' and status='1' ");
				// 			$district->execute();
				// 			$district_list = $district->fetchall();
				// 			foreach($district_list as $value) { 
							?>
								<!--<option value="<?php echo $value['district_id']?>"><?php echo $value['district_name']?></option>-->
							<?php //} ?>
					</select>
    	</div>

    	<div  class="col-md-2">
    		<h5 class="list-content">City</h5>
    		<select name="city_id" id="city_id" required class="form-control select2 item_name" onchange="get_area_list(country_id.value,state_id.value,district_id.value,city_id.value)">
				<option value="">Select City</option>
					<?php 
				// 	$city = $pdo_conn->prepare("SELECT * FROM city WHERE delete_status!='1' and status='1' ");
				// 	$city->execute();
				// 	$city_list = $city->fetchall();
				// 	foreach($city_list as $value) { 
					?>
						<!--<option value="<?php echo $value['city_id']?>"><?php echo $value['city_name']?></option>-->
					<?php //} ?>
			</select>
    	</div>
		<!--
<div class="modal fade" id="quotation_view">
			            <div class="modal-dialog modal-lg">
			              <div class="modal-content">
			                <!-- Modal Header -->
			              <!--  <div class="modal-header">
			                  <h3 class="modal-title">Food Needed Survey View</h3>
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <!-- Modal body -->
			              <!--  <div class="modal-body">
			                	<div id="quotation_view_modal_body"></div>
			                </div>
			                <!-- Modal footer -->
			               <!-- <div class="modal-footer">
							  <a href="#" class="float-right btn btn-primary" data-dismiss="modal">Close</a>
			                </div>                    
			              </div>
			            </div>
			          </div> -->
    	<div  class="col-md-2">
    		<h5 class="list-content">Area</h5>
    		<select name="area_id" id="area_id" required class="form-control select2 item_name"  >
				<option value="">Select Area</option>
					<?php 
				// 	$area = $pdo_conn->prepare("SELECT * FROM area WHERE delete_status!='1' and status='1' ");
				// 	$area->execute();
				// 	$area_list = $area->fetchall();
				// 	foreach($area_list as $value) { 
					?>
						<!--<option value="<?php echo $value['area_id']?>"><?php echo $value['area_name']?></option>-->
					<?php //} ?>
			</select>
    	</div>

    	<div  class="col-md-2">
		<div class="go-btn ">
    		 <a onclick="get_filter_list(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" class="hvr-sweep-to-top">GO</a>
    	</div>
		</div>
     
</div>

<table border="0" cellspacing="0" width="90%">
	<tr>
		
		<td width="10%" align="center">
            <a onclick="javascript:food_needed_overall_print(country_id.value,state_id.value,district_id.value,city_id.value,area_id.value)" style="float:right"><img  align="right" src="images/print.png" width="30" height="30" border="0" title="PRINT"></a>
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
							<th>Name</th>
							<th>Mobile Number</th>							
							<th>Address</th>
							<th>Profession</th>
							<th>Reason For Choosing Food</th>
							<th>Action</th>
						  
						</tr>
					</thead>
						<tbody id="areawise_count_list" >	
 <?php
 //echo "SELECT * FROM fact_finding_form WHERE delete_status!='1' $query ORDER BY survey_id DESC";
						$survey = $pdo_conn->prepare("SELECT * FROM food_needed WHERE delete_status!='1' $query $user_type_query ORDER BY food_needed_id DESC");
						$survey->execute();
						$survey_list = $survey->fetchall();

						 foreach($survey_list as $value){?>
						
						   <tr>
							<td><?php echo $roll_id;?></td>
							<td><?php echo $value['name'];	?>	</td>
							<td><?php echo $value['mobile_no'];	?>	</td>
							<td><?php echo $value['address'];	?>	</td>
							<td><?php echo $value['profession'];	?>	</td>
							<td><?php echo $value['reason_for_choosing_food'];	?>	</td>
							 
							 <td>
						 <!--<a href="#" title="View" id="quotation_view_modal" onclick="food_needed_view('<?php echo $value['food_needed_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
						 <a href="#" title="View" id="quotation_view_modal" onclick="food_needed_view('<?php echo $value['food_needed_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-eye" aria-hidden="true"></i></a>  
						 <a href="#" title="Delete" id="quotation_view_modal" onclick="food_needed_delete('<?php echo $value['food_needed_id'] ?>')" data-toggle="modal" data-target="#quotation_view"><i class="fa fa-trash" aria-hidden="true"></i></a>  
						</td>  
						</tr>
						
						<?php $roll_id+=1;}?>
 </tbody>
	
 </table>
 
</div>
</div> 
 		</form>
 		</section>
		</div>
<script type="text/javascript">
	
function get_state_list(country_id)
{
    var state_query =   '<?php echo $state_query; ?>';
	format=$("form").serialize()+"&action=state_list"+"&state_query="+state_query;
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
    var district_query =   '<?php echo $district_query; ?>';
	format=$("form").serialize()+"&action=district_list"+"&district_query="+district_query;
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
    var city_query =   '<?php echo $city_query; ?>';
	format=$("form").serialize()+"&action=city_list"+"&city_query="+city_query;
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
    var area_query =   '<?php echo $area_query; ?>';
	format=$("form").serialize()+"&action=area_list"+"&area_query="+area_query;
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
	url: "food_needed_report/food_needed_list.php",
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id,
	success: function(msg)
	{ 
		// /alert(msg);
	 $("#areawise_count_list").html(msg);
	}
});
}

function food_needed_view(food_needed_id)
{ 
//alert(food_needed_id);
	jQuery.ajax({
	type: "POST",
	url: "food_needed_report/food_needed_people.php?",
	data: "food_needed_id="+food_needed_id,
	success: function(msg)
	{ 
	//alert(msg);
	 // $("#quotation_view_modal_body").html(msg);
	 window.open('food_needed_report/food_needed_people.php?food_needed_id='+food_needed_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	}
	});
}

function food_needed_delete(food_needed_id)
{ 
    if (confirm("Are you sure?")) {
        // your deletion code
//alert(food_needed_id);
	jQuery.ajax({
	type: "POST",
	url: "food_needed_report/delete.php?",
	data: "food_needed_id="+food_needed_id,
	success: function(msg)
	{ 
	alert(msg);
	window.location.href = 'index.php?file=food_needed_report/list';
		
	}
	});
	
    }
    return false;
}

function food_needed_overall_print(country_id,state_id,district_id,city_id,area_id)
{

jQuery.ajax({
	type: "POST",
	url: "food_needed_report/food_needed_overall_print.php",
	data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&area_id="+area_id,
	success: function(msg)
	{ 
		//alert(msg);
		window.open('food_needed_report/food_needed_overall_print.php?country_id='+country_id+'&state_id='+state_id+'&district_id='+district_id+'&city_id='+city_id+'&area_id='+area_id,'onmouseover','height=650,width=950,scrollbars=yes,resizable=no,left=250,top=250,toolbar=no,location=no,directories=no,status=no,menubar=no');	
	}
	});

}
</script>