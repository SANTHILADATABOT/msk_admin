/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
    if(e.which == 13) {
       // alert();
		country_cu();
		
    }
});



function country_cu()
{
        event.preventDefault();
		//alert($("form").serialize());
		format=$("form").serialize();
		country_name = $("#country_name").val();
		//alert(country_name);
		if(country_name==""){
			alert("Enter Country Name");
			return false;
		}
		
		jQuery.ajax({
			type: "POST",
			url: "country/curd.php",
			data: format,
			success: function(msg){ 
			     //alert(msg);
			     if(msg=='error')
					{
						
						$("#distinct_error").text("Invalid Data");
						return false;
					}
					else
					{
						alert(msg);
						if(msg=='Successfully Created '){
						window.location.href="index.php?file=country/list";
							
						}
						else if(msg=='Successfully Updated '){
							//alert("kguuy");
							window.location.href="index.php?file=country/list";
							
						}
						else{
						return false
						}
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