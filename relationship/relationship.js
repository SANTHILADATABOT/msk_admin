/****************************** INSERT & UPDATE ***************************************/
function relationship_cu(relationship_id,action)
{ 
	format=$("form").serialize()+"&relationship_id="+relationship_id+"&action="+action;
	var relationship_name=$("#relationship_name").val();
	if(relationship_name)
	{
		jQuery.ajax({
		type: "POST",
		url: "relationship/curd.php",
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
					window.location.href="index.php?file=relationship/list";
				}
		
			}
		});
	}
	else
	{
		validation(relationship_name)
	}

	
}

function del(relationship_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "relationship/curd.php",
			data: "relationship_id="+relationship_id+"&action="+"Delete",
			success: function(msg){ 
			alert("Successfully Deleted");
			location.reload();
			}});
	}

}

function validation(relationship_name)
{
	if(relationship_name=='')
	{
		$("#relationship_name").focus();
	}
}