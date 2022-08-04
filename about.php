<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		           
				   
				   
				   
<div id="page-wrapper">
    <div class="row"> 
      
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>About US</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
        <!--	About Our Company -->
        <div class="full-row">
            <div class="container">
                
				
				<?php 
					
					 $stmt = $conn->prepare("SELECT * FROM about");
                      $stmt->execute();
                      foreach($stmt as $row){
				?>
				<div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h2 class="double-down-line-left text-secondary position-relative pb-4 mb-4"><?php echo $row['name'];?></h2>
                    </div>
                </div>
                <div class="row about-company">
                    <div class="col-md-12 col-lg-7">
                        <div class="about-content">
                           <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4"> <?php echo $row['content'];?></h4>
                        </div>
                    </div>
                   
                </div>
				
				<?php } ?>
				
            </div>
        </div>
        <!--	About Our Company -->        
        
       <!--	Footer   start-->

		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <!-- End Scroll To top --> 
    </div>
</div>
				   
				   
				   
				   
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>