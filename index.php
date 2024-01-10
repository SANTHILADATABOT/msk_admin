<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() 
{
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<?php 
include 'inc/header.php'; 
if($usercreationid) { ?>

<div class="wrapper">

  <?php include 'inc/menu.php'; ?>
  
  <?php
		$fileroot = $_GET['file'];
		$filepath = explode('/',$fileroot);
		$foldername = $filepath[0];
		$filename = $filepath[1];
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'inc/left-menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
	<?php 	 	 
	 if($fileroot)
	 { 
		include $foldername.'/'.$filename.'.php';
	 }
	 else
	 { 
		  include 'dashboard.php';
	 }
	  ?>
	  
  </div>
  <!-- /.content-wrapper -->
  
  <?php include 'inc/footer.php'; ?>
 
</div>
<!-- ./wrapper -->
  	
<?php } else { include 'login.php'; } include 'inc/footer-bottom.php'; ?>
