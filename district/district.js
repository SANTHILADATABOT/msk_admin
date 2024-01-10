/****************************** INSERT & UPDATE ***************************************/
function district_cu(district_id,action)
{
	format=$("form").serialize()+"&district_id="+district_id+"&action="+action;
	var country_id= $("#country_id").val();
	var state_id= $("#state_id").val();
 var district_name=$("#district_name").val();
// / alert(country_id.length);
if((country_id)&&(state_id)&&(district_name)){
	jQuery.ajax({
	type: "POST",
	url: "district/curd.php",
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
			window.location.href="index.php?file=district/list";
		}

	}});
}
else
{
	validation(country_id,state_id,district_name)

}
	
}


function del(district_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "district/curd.php",
			data: "district_id="+district_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

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
		}
	});

}

function validation(country_id,state_id,district_name)
{

	if(country_id=='')
	{
		$("#country_id").select2('open');
	
	}
 	else if(state_id.length=='')
	{
		$("#state_id").select2('open');
	}
	else if(district_name=='')
	{
		$("#district_name").focus();
	} 
}