/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		state_cu();
		
   }
});



function state_cu()
{
        event.preventDefault();
	    //jQuery("#state_list").html('<img src="img/ajax-loaders/ajax-loader-5.gif"> Loading...');
	var state_name=$("#state_name")	.val();
	var country_id=$("#country_id").val();
	//alert(state_name);
	if((country_id)&&(state_name))
	{
		format=$("form").serialize();
		
		jQuery.ajax({
			type: "POST",
			url: "state/curd.php",
			data: format,
			success: function(msg){ 
			     //alert(msg);
			     if(msg=='error')
					{
						
						$("#distinct_error").text("Invalid Data");
						return false;
					}
					else
					{
						
						alert(msg);
						if(msg=='Successfully Created '){
						window.location.href="index.php?file=state/list";
						
						}
						else if(msg=='Successfully Updated '){
							//alert("kguuy");
							window.location.href="index.php?file=state/list";
							
						}
						else{
						return false
						}
					}
			
			}});
	}
	else
	{
		validation(country_id,state_name)

	}
	
}

function del(state_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "state/curd.php",
			data: "state_id="+state_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}



function validation(country_id,state_name)
{
	if(country_id=='')
	{

		$("#country_id").select2('open');
	
	}
	else if(state_name=='')
	{
		$("#state_name").focus();
	}
}