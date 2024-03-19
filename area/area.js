/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		area_cu();
		
   }
});

function area_cu()
{ 
	event.preventDefault();
	format=$("form").serialize();
   // alert(format);
	var country_id= $("#country_id").val();
	var state_id= $("#state_id").val();
 var district_id=$("#district_id").val();
  var city_id=$("#city_id").val();
 var area_name=$("#area_name").val();
// / alert(country_id.length);
if((country_id)&&(state_id)&&(district_id)&&(city_id)&&(area_name)){
	//alert(format);
	jQuery.ajax({
		type: "POST",
		url: "area/curd.php",
		data: format,
		success: function(msg){ 
		
        if(msg=='error')
		{			
			$("#distinct_error").text("Invalid Data");
			return false;
		}
		else
		{
			alert(msg);
			if(msg=='Successfully Created'){
				window.location.href="index.php?file=area/list";
							
			}
			else if(msg=='Successfully Updated'){
							//alert("kguuy");
				window.location.href="index.php?file=area/list";
							
			}
			else{
				return false
			}
		}
		}
	});	
}
else
{
	validation(country_id,state_id,district_id,city_id,area_name)
}
}


function del(area_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "area/curd.php",
			data: "area_id="+area_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

function dist_list(country_id,state_id){
	
	//alert(country_id)
	jQuery.ajax({
	type: "POST",
	url: "inc/commonfunction.php",
	data: "state_id="+state_id+"&country_id="+country_id+"&action="+"district_list",
	success: function(msg){ 
	//alert(msg);
		$("#district_id").html(msg);
		$("#select2-city_id-container").html('');
	}
	});
}



function state_list(country_id)
{
	jQuery.ajax({
		type: "POST",
		url: "inc/commonfunction.php",
		data: "country_id="+country_id+"&action="+"state_list",
		success: function(msg){ 
			//alert(msg);
			 $("#state_id").html(msg);
				$("#select2-city_id-container").html('');
				$("#select2-district_id-container").html('');
		}
	});

}

function city_list(country_id,state_id,district_id,city_id)
{
	//alert(state_id);
	jQuery.ajax({
		type: "POST",
		url: "inc/commonfunction.php",
		data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&action="+"city_list",
		success: function(msg){ 
		//	alert(msg);
			$("#city_id").html(msg);
		}
	});	
}

function validation(country_id,state_id,district_id,city_id,area_name)
{

	if(country_id=='')
	{
		$("#country_id").select2('open');
	
	}
 	else if(state_id=='')
	{
		$("#state_id").select2('open');
	}
	else if(district_id=='')
	{
		$("#district_id").select2('open');
	} 
	else if(city_id=='')
	{
		$("#city_id").select2('open');
	} 
	 
	else if(area_name=='')
	{
		$("#area_name").focus();
	} 
}