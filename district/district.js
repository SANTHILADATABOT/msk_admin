/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		district_cu();
		
   }
});



function district_cu()
{
	event.preventDefault();
	format=$("form").serialize();
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
			if(msg=='Successfully Created'){
				window.location.href="index.php?file=district/list";
							
			}
			else if(msg=='Successfully Updated'){
							//alert("kguuy");
				window.location.href="index.php?file=district/list";
							
			}
			else{
				return false
			}
		    
		}

	}});
}
else
{
	validation(country_id,state_id,district_name);

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