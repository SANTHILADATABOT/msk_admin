/****************************** INSERT & UPDATE ***************************************/
function qualification_cu(qualification_id,action)
{ 
	format=$("form").serialize()+"&qualification_id="+qualification_id+"&action="+action;
	var qualification_name=$("#qualification_name").val();
	if(qualification_name)
	{
		jQuery.ajax({
		type: "POST",
		url: "qualification/curd.php",
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
					window.location.href="index.php?file=qualification/list";
				}
		
			}
		});
	}
	else
	{
		validation(qualification_name)
	}

	
}

function del(qualification_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "qualification/curd.php",
			data: "qualification_id="+qualification_id+"&action="+"Delete",
			success: function(msg){ 
			alert("Successfully Deleted");
			location.reload();
			}});
	}

}

function validation(qualification_name)
{
	if(qualification_name=='')
	{
		$("#qualification_name").focus();
	}
}