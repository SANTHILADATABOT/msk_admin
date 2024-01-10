/****************************** INSERT & UPDATE ***************************************/
function disease_cu(disease_id,action)
{ 
	format=$("form").serialize()+"&disease_id="+disease_id+"&action="+action;
	var disease_name=$("#disease_name").val();
	if(disease_name)
	{
		jQuery.ajax({
		type: "POST",
		url: "disease/curd.php",
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
					window.location.href="index.php?file=disease/list";
				}
		
			}
		});
	}
	else
	{
		validation(disease_name)
	}

	
}

function del(disease_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "disease/curd.php",
			data: "disease_id="+disease_id+"&action="+"Delete",
			success: function(msg){ 
			alert("Successfully Deleted");
			location.reload();
			}});
	}

}

function validation(disease_name)
{
	if(disease_name=='')
	{
		$("#disease_name").focus();
	}
}