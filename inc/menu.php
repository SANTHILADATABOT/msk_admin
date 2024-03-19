
<header class="main-header">
<!-- Logo -->

<a href="index.php" class="logo"> 
<!-- mini logo for sidebar mini 50x50 pixels --> 
<b class="logo-mini">  <span class="dark-logo"><img src="images/logo-dark.png" alt="logo"></span> </b> 
<!-- logo for regular state and mobile devices --> 
<span class="logo-lg"> <img src="images/logo-light-text.png" alt="logo" class="light-logo"> <img src="images/logo-dark-text.png" alt="logo" class="dark-logo"> </span> </a> 
<!-- Header Navbar -->
<nav class="navbar navbar-static-top"> 
  <!-- Sidebar toggle button--> 
  <a href="#"  data-toggle="push-menu" role="button">  
 
 <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft" style="margin-top: -17px;">
        <span class="ms-toggler-bar bg-white"></span>
        <span class="ms-toggler-bar bg-white"></span>
        <span class="ms-toggler-bar bg-white"></span>
      </div>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
	 <li> <a href="index.php" ><i class="ion ion-home main-icon"></i></a> </li>
	 <?php
	 if($_SESSION['user_roll']=='1'){
	     ?>
	  <li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin" ></i></a> </li>
	  <?php
	 }
	 ?>
	    <li> <a href="#" onclick="logout()" class="power"><i class="ion ion-power  main-icon" ></i></a> </li>
	  
	  
	</ul>
  </div>
</nav>
</header>

<aside class="control-sidebar control-sidebar-dark"> 
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-map-marker"></i></a></li>
    <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-fa"></i></a></li>
    <li class="nav-item"><a href="#control-sidebar-spinner-tab" data-toggle="tab"><i class="fa fa-user"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content"> 
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-spinner-tab">
      <ul class="control-sidebar-menu">
        <li> 
         <a href="index.php?file=userroll/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>User Roll</h4>
           </div>
          </a> 
        </li>
        <li> 
         <a href="index.php?file=usercreation/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>User Creation</h4>
           </div>
          </a> 
        </li>
        <li> 
         <a href="index.php?file=volunteer/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Volunteer</h4>
           </div>
          </a> 
        </li>
        <li> 
         <a href="index.php?file=userrights/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>User Rights</h4>
           </div>
          </a> 
        </li>

        <!-- <li> 
          <a href="index.php?file=registration/list"> 
            <div class="menu-info">
              <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Registration</h4>
            </div>
          </a> 
        </li> -->


      </ul>
     
    </div>
    <!-- /.tab-pane --> 
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">
      <ul class="control-sidebar-menu">
        <!-- <li> 
          <a href="index.php?file=accountyear/list"> <i class="menu-icon fa fa-table bg-purple"></i>
           <div class="menu-info">
             <h4 class="control-sidebar-subheading">Accounting Year</h4>
           </div>
          </a> 
        </li> -->
        <li> 
          <a href="index.php?file=country/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Country</h4>
           </div>
          </a> 
        </li>
        <li> 
          <a href="index.php?file=state/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>State</h4>
           </div>
          </a> 
        </li>
         <li> 
          <a href="index.php?file=district/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>District</h4>
           </div>
          </a> 
        </li>
        <li> 
         <a href="index.php?file=city/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>City</h4>
           </div>
          </a> 
        </li>
        <li> 
         <a href="index.php?file=area/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Area</h4>
           </div>
          </a> 
        </li>
      </ul>
     
    </div>
    <!-- /.tab-pane --> 
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane --> 
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <ul class="control-sidebar-menu">
        <li> 
          <a href="index.php?file=relationship/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Relationship</h4>
           </div>
          </a>
        </li>
        <li> 
          <a href="index.php?file=language/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Language</h4>
           </div>
          </a> 
        </li>
        <li> 
          <a href="index.php?file=disease/list">
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Disease</h4>
           </div>
          </a> 
        </li>
        <li> 
          <a href="index.php?file=qualification/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Qualification</h4>
           </div>
          </a> 
        </li>
        <li> 
          <a href="index.php?file=blood_group/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Blood Group</h4>
           </div>
          </a> 
        </li>
        <li> 
          <a href="index.php?file=masjidh_name/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Masjidh Name </h4>
           </div>
          </a> 
        </li>
         <li> 
          <a href="index.php?file=house/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>House</h4>
           </div>
          </a> 
        </li>
      <li> 
          <a href="index.php?file=surgical/list"> 
           <div class="menu-info">
             <h4 class="control-sidebar-subheading"><i class="fa fa-chevron-circle-right set-icons"></i>Surgical</h4>
           </div>
          </a> 
        </li>

      </ul>
    </div>
    <!-- /.tab-pane --> 
  </div>
</aside>

