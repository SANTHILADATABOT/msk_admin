/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		blood_group();
		
   }
});
function blood_group()
{
	    
	  //   overall_variable=$("form").serialize();
		 //  array_variable01=overall_variable.split("&");
		 //  for(i=0;i<array_variable01.length;i++)
		 //  {
			// array_variable02=array_variable01[i];
			// array_variable02=array_variable02.split("=");
			// if(!array_variable02[1])
			// {
			// 	  $("button").prop("type", "submit");
			// 	  return false;
			//  }
			   
			   
		 //  }
		 // $("button").prop("type", "button");
		 
	  //   jQuery("#userrole_list").html('<img src="img/ajax-loaders/ajax-loader-5.gif"> Loading...');
		
		event.preventDefault();
		format=$("form").serialize();
		var blood_group_name=$("#blood_group_name").val();
		
	if(blood_group_name)
	{
		jQuery.ajax({
			type: "POST",
			url: "blood_group/curd.php",
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
							console.log("hi");
							window.location.href="index.php?file=blood_group/list";
							
						}
						else if(msg=='Successfully Updated'){
							//alert("kguuy");
							window.location.href="index.php?file=blood_group/list";
							
						}
						else{
						return false;
						}
					}
			}});
	
}
else
	{
		validation(blood_group_name);
	}
}

function del(blood_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "blood_group/curd.php",
			data: "blood_id="+blood_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

