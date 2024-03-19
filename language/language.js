/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        //alert();
		language_cu();
		
   }
});

function language_cu()
{ 
    event.preventDefault();
	format=$("form").serialize();
	var language_name=$("#language_name").val();
	if(language_name)
	{
		jQuery.ajax({
			type: "POST",
			url: "language/curd.php",
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
						if(msg=='Successfully Created '){
							window.location.href="index.php?file=language/list";
							
						}
						else if(msg=='Successfully Updated '){
							//alert("kguuy");
							window.location.href="index.php?file=language/list";
							
						}
						else{
						return false
						}
					}
			
			}});
	}
	else
	{
		validation(language_name)
	}
	
}

function del(language_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "language/curd.php",
			data: "language_id="+language_id+"&action="+"Delete",
			success: function(msg){ 
			alert("Successfully Deleted");
			location.reload();
			}});
	}

}

function language_name(language_name)
{
	if(language_name=='')
	{
		$("#language_name").focus();
	}
}