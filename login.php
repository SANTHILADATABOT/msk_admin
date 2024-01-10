<script src="assets/vendor_components/jquery/dist/jquery.js"></script>

<style>
.gr__a1{
    height:100% !important;
}
.content-wrapper {
    margin-left: 0px;
    background:none !important;
   
}
.wrapper{
    background:none !important;
}

.bg-row{
    
    margin:10em 0;
}
@media(max-width:480px) {
.bg-row{
    background-color:#fff;
    margin:5em 0;
}

}
@media(max-width:1150px) {
.sidebar-mini{
    background-size:inherit !important;
}    
    
    
}
body.skin-blue-light.sidebar-mini:before {
    position: fixed;
    content: "";
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    opacity: 0.80;
    background-color: #666666;
}
.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #ffffff;
    background: rgba(255,255,255,0.2);
	font-weight: 700;
	color:white;
}
.btn-sign {
    background-color: #010368;
    border-color: #ffffff;
    color: #fff !important;
}
.form-control:focus {
    border-color: #030562;
    box-shadow: none;
    background: rgba(255,255,255,0.2);
}
label.lable-colr {
    font-weight: 600;
    color: white;
    font-size: 14px;
}
input, button, select, optgroup, textarea {
    margin: 0px 0px;
}
button.btn.btn-sign.btn-block.margin-top-10.hvr-sweep-to-top {
    width: 32%;
}
.text-fade {
    color: #ffffff !important;
    text-align: center;
    font-weight: 600;
    font-size: 36px;
    font-family: 'Roboto Slab', serif;
}
</style>


<body class="hold-transition bg-img bg-opacity" style="background-image: url(images/icons/piller.png); background-size: cover; background-position: center;background-repeat: no-repeat;overflow-y: hidden;" data-overlay="4">

	<div class="container h-p100 hold-transition bg-img" >

<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-lg-8 col-md-11 col-12">
				<div class="row align-items-center justify-content-md-center h-p100 bg-row" data-overlay-light="9">
					<div class="col-lg-5 col-md-6 col-12">
						<div class="p-40 text-center content-bottom">
							<img src="images/logo.jpg" class=" b-2 p-10 "  />
						</div>
					</div>
					<div class="col-lg-7 col-md-6 col-12">
						<div class="p-20 log-top content-bottom">
							<div class="content-top-agile">
								
								<p class="text-fade">Weclome to Masjidh Sevai Kuzhu</p>
				
							</div>
							<form  method="post" id="login_form">
								<div class="form-group">
								<label class="lable-colr">Username</label>
									<div class="input-group mb-3">
										<input type="text" id="login_name" class="form-control" placeholder="Username">
										<!--<div class="input-group-prepend">
											<span class="input-group-text bg-signs border-signs"><i class="fa fa-user"></i></span>
										</div>-->
									</div>
								</div>
								<div class="form-group">
								
								<label class="lable-colr">password</label>
									<div class="input-group mb-3">
					
										<input type="password" id="login_password" class="form-control" placeholder="Password">
										<!--<div class="input-group-prepend">
											<span class="input-group-text bg-signs border-signs"><i class="fa fa-lock"></i></span>
										</div>-->
									</div>
								</div>
								  <div class="row">
									
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button class="btn btn-sign btn-block margin-top-10 hvr-sweep-to-top" type="button" onclick="login()">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>			

						</div>
					</div>
				</div>
				
				
			</div>
			
			
		</div>
        
   </div>
   
</body>

<script>
function login()
{
	//debugger;
	login_name=document.getElementById("login_name").value;	
	login_password=document.getElementById("login_password").value;
	
	if(login_name!='' & login_password!='')
	{
		jQuery.ajax({
			type: "POST",
			url: "inc/checklogins.php",
			data: { login_name : login_name,login_password : login_password,action : 'Check-Login' },
			success: function(msg){ 
				//alert(msg)
				console.log(msg);
				if(msg == 'success'){
					window.location.href="index.php";
				}else if(msg =='failed'){
					alert('Invalid user credentials');
				}
			}});
	}else{
		alert('Please fill user credentials');
	}
	
	
}

$(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (jQuery('#login_form').length != 0) {
        if(keycode == '13'){
             login();
        }
    }
});
</script>