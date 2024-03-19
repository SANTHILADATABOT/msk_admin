/****************************** INSERT & UPDATE ***************************************/
function accountyear_cu(accountyear_id,action)
{
		if($('form[name="accountyear"]').valid()){		
		
	    format=$("form").serialize()+"&accountyear_id="+accountyear_id+"&action="+action;
		
		jQuery.ajax({
			type: "POST",
			url: "accountyear/curd.php",
			data: format,
			success: function(msg){ 
					if(msg !='0' && msg !='1')
					{						
						$("#distinct_error").text(msg);
						return false;
					}else{
						console.log(msg);
						window.location.href="index.php?file=accountyear/list";
					}
			
			}});
		}
	
}

function del(accountyear_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "accountyear/curd.php",
			data: "accountyear_id="+accountyear_id+"&action="+"Delete",
			success: function(msg){ 
			console.log(msg);
			location.reload();
			}});
	}

}

$(document).ready(function(){	
$('form').validate();
});