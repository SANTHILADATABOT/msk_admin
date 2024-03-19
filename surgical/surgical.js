/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		surgical();
		
   }
});

function surgical()
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
		
		//alert($("form").serialize());
		surgical_name = $("#surgical_name").val();
		if(surgical_name==""){
			alert("Enter Surgical Name");
			return false;
		}
		
		
		format=$("form").serialize();
		
		jQuery.ajax({
			type: "POST",
			url: "surgical/curd.php",
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
							window.location.href="index.php?file=surgical/list";
							
						}
						else if(msg=='Successfully Updated'){
							//alert("kguuy");
							window.location.href="index.php?file=surgical/list";
							
						}
						else{
						return false
						}
					}
			
			}});
	
}

function del(surgical_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "surgical/curd.php",
			data: "surgical_id="+surgical_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

