    <!-- Content Header (Page header) -->
  
	
	<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 24px 37px;">
  	   <h1>
        <div class="top-left inline-dash addnew-bred"><span class="first-head">Update <?php echo ucfirst($foldername); ?> </span>   <br><span class="welcom inline-welcome"><a href="index.php?file=disease/list"> <?php echo ucfirst($foldername); ?> List // Update </a> </span></div>
      </h1>	
	</section>

    <!-- Main content -->
    <section class="content">
	 
     <?php
      $pdo_diseasement = $pdo_conn->prepare("SELECT * FROM disease where disease_id=".$_GET['disease_id']);
      $pdo_diseasement->execute();
      $updateresult = $pdo_diseasement->fetchAll();
	?>
     
	 <?php include 'form.php'; ?>
		
	</section>
	<!-- /.content -->
