/****************************** INSERT & UPDATE ***************************************/
function country_cu(country_id,action)
{
        
		
		format=$("form").serialize()+"&country_id="+country_id+"&action="+action;
		
		jQuery.ajax({
			type: "POST",
			url: "country/curd.php",
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
						window.location.href="index.php?file=country/list";
					}
			
			}});
	
}

function del(country_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "country/curd.php",
			data: "country_id="+country_id+"&action="+"Delete",
			success: function(msg){ 
			alert("Successfully Deleted");
			location.reload();
			}});
	}

}