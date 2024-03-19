/****************************** INSERT & UPDATE ***************************************/
function registration_c(user_id,action)
{
	overall_variable=$("form").serialize();
	//alert(overall_variable);
	array_variable01=overall_variable.split("&");
	for(i=0;i<array_variable01.length;i++)
	{
		array_variable02=array_variable01[i];
		array_variable02=array_variable02.split("=");			
		if(!array_variable02[1])
		{
			$("button").prop("type", "submit");
			return false;
		}
	}
	$("button").prop("type", "button");
	
	format=$("form").serialize()+"&user_id="+user_id+"&action="+action;
	jQuery.ajax({
	type: "POST",
	url: "registration/curd.php",
	data: format,
	success: function(msg)
	{
		if(msg=='error')
		{
			$("#distinct_error").text("Invalid Data");
			return false;
		}
		else
		{
			alert(msg);
			window.location.href="index.php?file=registration/list";
		}
	}});
	
}


function state_validate(action)
{
		alert("hiii");
		var state_name=$("#state").val();
		
		//jQuery("#item_name").html('<img src="img/ajax-loaders/ajax-loader-5.gif"> Loading...');
		jQuery.ajax({
			type: "POST",
			url: "registration/curd.php",
			data: "state_name="+state_name+"&action="+action,
			success: function(msg){
				//alert(msg); 
			  jQuery("#city").html(msg);
			}});
}

function del(user_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value)
	{
		jQuery.ajax(
		{
			type: "POST",
			url: "registration/curd.php",
			data: "user_id="+user_id+"&action="+"Delete",
			success: function(msg)
			{ 
				alert(msg);
				location.reload();
			}
		});
	}

}

function get_state(country_id)
{	
	jQuery.ajax(
	{		
		type: "POST",
		url: "inc/commonfunction.php",
		data: "country_id="+country_id+"&action="+"state_list",
		success: function(msg)
		{		
		alert(msg)	
			$("#state_id").html(msg);
		}
	});
}

function get_district(country_id,state_id)
{	
	jQuery.ajax(
	{		
		type: "POST",
		url: "inc/commonfunction.php",
		data: "state_id="+state_id+"&country_id="+country_id+"&action="+"district_list",
		success: function(msg)
		{			
			$("#district_id").html(msg);
		}
	});
}



function get_city(country_id,state_id,district_id)
{	
	 
	
	jQuery.ajax(
	{
		type: "POST",
		url: "inc/commonfunction.php",
		data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&action="+"city_list",
		success: function(msg)
		{ 
			$("#city_id").html(msg);
		}
	});
}

function get_area(country_id,state_id,district_id,city_id)
{
	jQuery.ajax(
	{
		type: "POST",
		url: "inc/commonfunction.php",
		data: "country_id="+country_id+"&state_id="+state_id+"&district_id="+district_id+"&city_id="+city_id+"&action="+"city_list",
		success: function(msg)
		{ 
			$("#area_id").html(msg);
		}
	});
}