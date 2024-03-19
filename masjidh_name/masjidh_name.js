/****************************** INSERT & UPDATE ***************************************/
$(document).on('keypress',function(e) {
	
    if(e.which == 13) {
        //alert("1st");
		organization();
		
    }
});

function organization()
{
	event.preventDefault();
	   
		 
		 masjidh_name = $("#masjidh_name").val();
		//alert(masjidh_name);
		if(masjidh_name==""){
			alert("Enter Masjid Name");
			return false;
		}
		 
		 
	    //jQuery("#userrole_list").html('<img src="img/ajax-loaders/ajax-loader-5.gif"> Loading...');
		//alert("VFDEFRFDDE123");
		
		format=$("form").serialize();
		
		jQuery.ajax({
			type: "POST",
			url: "masjidh_name/curd.php",
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
						if(msg=='Successfully Created'){
						window.location.href="index.php?file=masjidh_name/list";
							
						}
						else if(msg=='Successfully Updated'){
							//alert("kguuy");
							window.location.href="index.php?file=masjidh_name/list";
							
						}
						else{
						return false
						}
					}
			
			}});
	
}

function del(masjidh_id)
{
	value=confirm("Are Sure You Want Delete?");
	if(value){
	  jQuery.ajax({
			type: "POST",
			url: "masjidh_name/curd.php",
			data: "masjidh_id="+masjidh_id+"&action="+"Delete",
			success: function(msg){ 
			alert(msg);
			location.reload();
			}});
	}

}

