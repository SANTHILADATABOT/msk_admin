    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
      <h1>
		<small>Update</small>
		<?php echo ucfirst($foldername); ?>        
      </h1>
	  
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?file=masjidh_name/list"><i class="fa fa-home"></i> <?php echo ucfirst($foldername); ?> List</a></li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
    </section> -->
<section class="content-header report-pg" style="background-repeat: no-repeat;background-position: center;background-size: cover;background-image: url(images/top_bg.png);padding: 24px 37px;">
  	   <h1>
        <div class="top-left inline-dash addnew-bred"><span class="first-head">Update  <?php echo ucfirst($foldername); ?> </span>   <br><span class="welcom inline-welcome"><a href="index.php?file=masjidh_nane/list"> <?php echo ucfirst($foldername); ?> List // Update </a> </span></div>
      </h1>	
	</section>
    <!-- Main content -->
    <section class="content">
	 
     <?php
      $pdo_organization = $pdo_conn->prepare("SELECT * FROM masjidh_name where masjidh_id=".$_GET['masjidh_id']);
      $pdo_organization->execute();
      $updateresult = $pdo_organization->fetchAll();
	?>
     
	 <?php include 'form.php'; ?>
		
	</section>
	<!-- /.content -->
