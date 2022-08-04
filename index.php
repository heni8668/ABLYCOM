<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<head>
<link href="calendar.css" type="text/css" rel="stylesheet" />

<style>
#object {
  animation: MoveUpDown 1s linear infinite;
  position: absolute;
  left: 0;
  bottom: 0;
}

@keyframes MoveUpDown {
    0%, 100% {
    bottom: 0;
  }
  50% {
    bottom: 0px;
  }
}



</style></head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style='width:1100px;'">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
						   <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/logo.png" style="backgroud-color:#708090;width:100%; height:360px;"alt="Forth slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner21.jpg" style="width:100%; height:360px;"alt="Second slide">
		                  </div>
		                  <div class="item ">
		                    <img src="images/banner31.jpg" style="width:100%;height:360px;"alt="First slide">
		                  </div> 
						  <div class="item ">
		                    <img src="images/banner11.jpg" style="width:100%;height:360px;"alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            <h2>Latest Products</h2>
					
		       		<?php
$conn = $pdo->open();
	try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       										<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>Birr ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
				

						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();
		       		?> <div class="col-sm-9">
		            <h1 class="page-header"></h1>
	        	</div>
				
				
				
	      </section>
	        	<div class="col-sm-3" style="border:50px;background-color:#708090;color:white; width:300px;height:700px; margin-left:850px;margin-top:-770px;">
	        		<div style="margin-top:10px;margin-left:10px;">
				<div class="col-md-6">
								<h3 class="section-title">Timings</h3>
								<div class="contact-info">
									<h5>Monday - Friday</h5>
									<p>09:00 AM - 6:30 PM</p>
									<h5><p>Saturday: Closed</p></h5>
									<h5><p>Sunday: Closed</p></h5>
									
								</div>
							</div>
					</div>
					
					<div id="right"style="margin-top:200px;margin-left:-10px;">
<script src="time.js" language="javascript" type="text/javascript"></script>
		<body  onLoad="yourClock()", onUnload="stopClock(); return true"> 
		<form name="the_clock">
		<table width="290px" height="200px" border="5" cellpadding="0" cellspacing="0" style="background:#343e48;">
		<tr align="center" ><td>
		<p style="color: white;">The Time is:&nbsp;&nbsp;<input type="text" name="the_time" size="10" style="padding-bottom:5px;color: black;" padding-top:15px;></p>        
		</td></tr>
	
	    
	    </form>



<tr>
<td>
	
<script src="calendar.js" LANGUAGE="JavaScript" type="text/javascript"></script>
</td>
</tr>
</table>
<div id="below">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7880.308165849471!2d38.74513448282875!3d9.04970633207088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8fa5f9bdb7e5%3A0x9e990b728f7c2f6a!2zU2VtZW4gTWF6ZWdhamEgTWVza2VsZWduYSB8IOGIsOGInOGKlSDhiJvhi5jhjIvhjIMg4YiY4Yi14YmA4YiI4Yqb!5e0!3m2!1sen!2set!4v1658844216964!5m2!1sen!2set" width="290" height="230" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	 

<!--<img id="bel" src="Capture.png" width="290" height="200"/>-->
</div>	
</div>


	        	</div></div></div>
	        </div>
	     <?php include 'includes/sidebar1.php'; ?>
	   
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>




