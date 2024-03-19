/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		userrole_cu();
		
   }
});

function userrole_cu()
{
	event.preventDefault();
	    //overall_variable=$("form").serialize();
		//  array_variable01=overall_variable.split("&");
		//  for(i=0;i<array_variable01.length;i++)
		//  {
		//	array_variable02=array_variable01[i];
		//	array_variable02=array_variable02.split("=");
		//	if(!array_variable02[1])
		//	{
		//		  $("button").prop("type", "submit");
		//		  return false;
		//	 }
			   
			   
		 // }
		 //$("button").prop("type", "button");
		 
	    //jQuery("#userrole_list").html('<img src="img/ajax-loaders/ajax-loader-5.gif"> Loading...');
		
	    roll_name = $("#roll_name").val();
		if(roll_name==""){
			alert("Enter Usrr Roll Name");
			return false;
		}

	
		format=$("form").serialize();
		
		jQuery.ajax({
			type: "POST",
			url: "userroll/curd.php",
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
							window.location.href="index.php?file=userroll/list";
							
						}
						else if(msg=='Successfully Updated'){
							//alert("kguuy");
							window.location.href="index.php?file=userroll/list";
							
						}
						else{
						return false
						}
					}
			
			}});
	
}

function del(userroll_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "userroll/curd.php",
			data: "userroll_id="+userroll_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

