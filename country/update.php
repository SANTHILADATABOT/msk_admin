    <!-- Content Header (Page header) -->
    
	
	<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 24px 37px;">
  	   <h1>
        <div class="top-left inline-dash addnew-bred"><span class="first-head">Update <?php echo ucfirst($foldername); ?> </span>   <br><span class="welcom inline-welcome"><a href="index.php?file=country/list"> <?php echo ucfirst($foldername); ?> List // Update</a> </span></div>
      </h1>	
	</section>

    <!-- Main content -->
    <section class="content">
	 
     <?php
      $pdo_countryment = $pdo_conn->prepare("SELECT * FROM country where country_id=".$_GET['country_id']);
      $pdo_countryment->execute();
      $updateresult = $pdo_countryment->fetchAll();
	?>
     
	 <?php include 'form.php'; ?>
		
	</section>
	<!-- /.content -->
