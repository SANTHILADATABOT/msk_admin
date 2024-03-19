/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		house();
		
   }
});

function house()
{
	event.preventDefault();
	
	  //  overall_variable=$("form").serialize();
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
			   
			   
		//  }
		// $("button").prop("type", "button");
		 
	    //jQuery("#userrole_list").html('<img src="img/ajax-loaders/ajax-loader-5.gif"> Loading...');
		
		//alert($("form").serialize());
		 house_name = $("#house_name").val();
		//alert(house_name);
		if(house_name==""){
			alert("Enter House NThen I bind a click event to my button, to change it to a submit type for the next click. For some reason, it's triggering the submit on the first click. Name");
			return false;
		}
		
		
		format=$("form").serialize();
		
		jQuery.ajax({
			type: "POST",
			url: "house/curd.php",
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
							window.location.href="index.php?file=house/list";
							
						}
						else if(msg=='Successfully Updated'){
							//alert("kguuy");
							window.location.href="index.php?file=house/list";
							
						}
						else{
						return false
						}
					}
			
			}});
	
}

function del(house_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "house/curd.php",
			data: "house_id="+house_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

