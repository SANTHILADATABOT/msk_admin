/****************************** INSERT & UPDATE ***************************************/
function language_cu(language_id,action)
{ 
	format=$("form").serialize()+"&language_id="+language_id+"&action="+action;
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
						window.location.href="index.php?file=language/list";
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