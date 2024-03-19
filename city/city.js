/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		city_cu();
		
   }
});

function city_cu()
{ 
   event.preventDefault();
	format=$("form").serialize();
	//alert(format);
	var country_id= $("#country_id").val();
	var state_id= $("#state_id").val();
 var district_id=$("#district_id").val();
 var city_name=$("#city_name").val();

if((country_id)&&(state_id)&&(district_id)&&(city_name)){
	jQuery.ajax({
		type: "POST",
		url: "city/curd.php",
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
				window.location.href="index.php?file=city/list";
							
			}
			else if(msg=='Successfully Updated'){
							//alert("kguuy");
				window.location.href="index.php?file=city/list";
							
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
	validation(country_id,state_id,district_id,city_name)

}
}


function city_del(city_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "city/curd.php",
			data: "city_id="+city_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

function dist_list(country_id,state_id){
	
//	alert(country_id)
	jQuery.ajax({
			type: "POST",
			url: "inc/commonfunction.php",
			data: "state_id="+state_id+"&country_id="+country_id+"&action="+"district_list",
			success: function(msg){ 
		//	alert(msg);
				$("#district_id").html(msg);
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
		//	alert(msg);
			 $("#state_id").html(msg);
		}
	});

}


function validation(country_id,state_id,district_id,city_name)
{

//alert(district_id)
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
	else if(city_name=='')
	{
		$("#city_name").focus();
	} 
}