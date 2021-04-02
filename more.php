<?php
  require_once 'connection.php';
  session_start(); //insert connection to page
?>

<!DOCTYPE html>
<html>
<head>
		<title>Nipuna Book Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="img/book.png" sizes="300x300" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
	<script src="js/bootstrap.min.js"></script>
<!--FontAwsome-->
	<link href="fontawesome/css/all.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.ss.js"></script>
	<!--<script src="js/script.ss.js"></script>-->
<!--Fonts-->

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

<!--/Fonts-->
</head>
<body>
	<!--Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
		<div class="container-fluid ">
  			<a href="index.php" class="navbar-brand mr-0 mr-md-2 nav-link">
  				<img id="logo" src="img/Logo/logo.png">
  			</a>

  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   				<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="collapsibleNavbar">

    			<ul class="navbar-nav nav-item ml-auto">

        			<a class=" nav-item nav-link active text-light" href="index.php">Home</a>

      				<!--DROP DOWN CATEGORIES-->
      				<div class="dropdown">
      					<a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown-menu text-light">Categories</a>
      					<div class="dropdown-menu">
      						<?php
      						$query = "SELECT * FROM book_cat";
      						$result = mysqli_query($con,$query);

      						while ($row = mysqli_fetch_assoc($result)) {
      							$get = $row['cat_name'];
      							$id = $row['cat_id'];

      							$bood="SELECT * FROM books where cat_id='".$id."'";
								$query1 = mysqli_query($con,$bood);

								if (mysqli_num_rows($query1) > 0) {
      								echo '<a href="more.php?cat_id='.$row['cat_id'].'" class="dropdown-item small smooth-scroll list-unstyled">'.$get.'</a>';
      							}
      						}
      						 ?>
      						
      					</div>
      				</div>
      				<!--/DROP DOWN CATEGORIES-->

      				<!--DROP DOWN AUTHOR-->
      				<div class="dropdown">
      					<a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown-menu text-light">Author</a>
      					<div class="dropdown-menu">
      						<?php
      						$query = "SELECT * FROM author";
      						$result = mysqli_query($con,$query);

      						while($row = mysqli_fetch_assoc($result)) {
      							$get = $row['author_name'];
      							$id = $row['author_id'];

      							$bood="SELECT * FROM books where author_id='".$id."'";
								$query1 = mysqli_query($con,$bood);

								if (mysqli_num_rows($query1) > 0) {
	      							echo '<a href="more.php?author_id='.$row['author_id'].'" class="dropdown-item small">'.$get.'</a>';
								}
      						}
      						?>
      					</div>
      				</div>
      				<!--/DROP DOWN AUTHOR-->
   				</ul>
   				<!--Search Bar-->
   				<form class="form-inline mx-auto" method="POST">
					<input class="form-control mx-sm-2 col-lg-6 col-xl-9 " type="search" name="search" placeholder="what are you looking for...?" aria-label="search">
					<button class="btn btn-light my-sm-0" name="sub"  type="submit">Search</button>
				</form>
				<?php 
					    if (isset($_POST['sub'])) {
					    	$search = $_REQUEST['search'];
					    	echo "<script type=\"text/javascript\">window.location.href='search.php?key=$search'; </script>"; 
					    }
					     ?>
				<!--/Search Bar-->

   				<ul class="navbar-nav nav-item mx-auto">

   					<a href="cart.php" class="nav-item nav-link mr-3"><i style="font-size: 30px" class="fas fa-shopping-cart text-light"></i><span></span></a>

      				<!--DROP DOWN LOGIN-->
      				<div class="dropdown">
      					<a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="dropdown-menu"><i style="font-size: 30px" class="fas fa-user text-light mr-2"></i><?php 
      						if (isset($_SESSION['customer_id'])) {
      						$id = $_SESSION['customer_id']; 
      						$query = "SELECT * FROM customer where customer_id = '$id'";
      						$result = mysqli_query($con,$query);

      						if($row = mysqli_fetch_assoc($result)) {
      							echo $row['name'];
      						}
      					} ?></a>
      					<div class="dropdown-menu">
      						<?php if(isset($_SESSION['customer_id'])){ ?>
      						<a href="myaccount.php" class="dropdown-item"><i class="fas fa-sign-in-alt"></i><span> My Account</span></a>
      						<a href="myorder.php" class="dropdown-item" ><i class="fas fa-sign-in-alt"></i><span> My Order</span></a>
      						<a href="logout.php" class="dropdown-item" ><i class="fas fa-sign-in-alt"></i><span> Logout</span></a>
      					<?php }else{ ?>
      						<a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalLoginForm"><i class="fas fa-sign-in-alt"></i><span> Sign In</span></a>
      						<a href="" class="dropdown-item" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-user-plus"></i><span> Sign Up</span></a>

      					<?php } ?>
      					</div>
      				</div>
      				<!--/DROP DOWN LOGIN-->

      				<a href="#contact" class="nav-item nav-link mr-2 ml-2 smooth-scroll list-unstyled"><span> 
      					
      						
      					</span></a>
   				</ul>
  			</div> 
  		</div> 
	</nav>
	<!--/Navigation-->
	
	<!--Sign Up and Sign In-->

	<!--Sign In-->
	<form action="signin.php" method="POST">

		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">

			      <div class="modal-header text-center">
			        <h4 class="modal-title w-100 ">SIGN IN</h4>	        
			      </div>

				    <div class="modal-body">

				    	<div class="container-fluid text-center">

					        <div class="md-form mb-3">
					        	<div class=" row">
					          		<i class="fas fa-envelope prefix col-3 " ></i>
					         	 	<input type="email" id="defaultForm-email" name="email" class="form-control validate col-8" placeholder="Enter your Email">
					         	</div>
					        </div>

					        <div class="md-form mb-3">
					        	<div class=" row">
					          		<i class="fas fa-lock prefix grey-text col-3"></i>
					          		<input type="password" id="defaultForm-pass" name="password" class="form-control validate col-8 " placeholder="Enter your password">
					          	</div>
					        </div>

					    </div>

				    </div>

					<div class="container-fluid text-center">
				    	<button type="submit" class="btn btn-default" name="submit">SIGN IN</button>
					</div>

			      	<div class="modal-footer d-flex justify-content-center">
			      		<div class="options text-center ">
	                		<p>Not a member? <a href="index.php#modalRegisterForm" class="blue-text" data-toggle="modal" data-target="#modalRegisterForm">Sign Up Here</a></p>
	              		</div>
			      	</div>

			    </div>
			</div>
		</div>

	</form>
	<!--/Sign In-->

	<!--Sign UP-->
	<form action="signup.php" method="POST">

		<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  	<div class="modal-dialog" role="document">

			    <div class="modal-content">

			      <div class="modal-header text-center">
			        <h4 class="modal-title w-100 ">SIGN UP</h4>
			      </div>

			      <div class="modal-body">

			      	<div class="container-fluid text-center">

				        <div class="md-form mb-3">
				        	<div class="row">
						        <i class="fas fa-user prefix grey-text col-3"></i>
						        <input type="text" id="orangeForm-name" name="name" class="form-control validate col-8" placeholder="Enter your Name">
					        </div>
				        </div>

				        <div class="md-form mb-3">
				        	<div class="row">
				          		<i class="fas fa-envelope prefix grey-textr col-3"></i>
				          		<input type="email" id="orangeForm-email" name="email" class="form-control validate col-8" placeholder="Enter your Email">
				          	</div>
				        </div>

				        <div class="md-form mb-3">
				        	<div class="row">
				          		<i class="fas fa-address-card prefix grey-textr col-3"></i>
				          		<input type="text" id="orangeForm-address" name="address" class="form-control validate col-8" placeholder="Enter Address">
				          	</div>
				        </div>

				        <div class="md-form mb-3">
				        	<div class="row">
				          		<i class="fas fa-phone-alt grey-textr col-3"></i>
				          		<input type="text" id="orangeForm-phone" name="Phone" class="form-control validate col-8" placeholder="Enter your Phone">
				          	</div>
				        </div>

				        <div class="md-form mb-3">
				        	<div class="row">
				          		<i class="fas fa-id-card-alt grey-textr col-3"></i>
				          		<input type="text" id="orangeForm-nic" name="nic1" class="form-control validate col-8" placeholder="Enter your NIC">
				          	</div>
				        </div>

				        <div class="md-form mb-3">
				        	<div class="row">
						        <i class="fas fa-lock prefix grey-text col-3"></i>
						        <input type="password" id="orangeForm-pass" name="pw" class="form-control validate col-8" placeholder="Enter your password">
						    </div>
				        </div>

				         <div class="md-form mb-3">
				         	<div class="row">
				          		<i class="fas fa-lock prefix grey-text col-3"></i>
				          		<input type="password" id="orangeForm-pass2" name="confirmpw" class="form-control validate col-8" placeholder="confirm your password">
				          	</div>
				        </div>

				        <div class="form-group mt-4 mb-1">
			              <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox1">
			              <label for="checkbox1" class="white-text form-check-label">Accept the<a href="#" class="green-text font-weight-bold">
			                  Terms and Conditions</a></label>
			            </div>

			       	</div>

			        <div class="container-fluid text-center">
					    <button type="submit" name="submit" class="btn btn-default">SIGN UP</button>
					</div>

			      </div>
			      <div class="modal-footer d-flex justify-content-center">
			      </div>
			    </div>
		  </div>
		</div>

	</form>
	<!--/Sign UP-->

	<!--Carousel Wrapper-->
	<div id="carousel" class="carousel slide carousel-fade " data-ride="carousel">

	</div>


	<!-- Start Food section with category -->
	<?php if (isset($_REQUEST['cat_id'])) {

	$id = $_REQUEST['cat_id'];

	$foodcat="SELECT * FROM book_cat where cat_id = '$id' ";
	$query2 = mysqli_query($con,$foodcat); 
	$counts = 0;
	while ($row2 = mysqli_fetch_assoc($query2)) { 
		$id = $row2['cat_id'];
		$food1="SELECT * FROM books where cat_id='".$id."'";
		$query3 = mysqli_query($con,$food1); 
		if (mysqli_fetch_assoc($query3)) {
		?>

	<div class="gallery-box p-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<!-- <div class="heading-title text-center"> -->
						<h2 style="font-size: 50px; text-align: left; color: black"><b><?php echo $row2['cat_name']; ?></b><h2>
						<hr>
					<!-- </div> -->
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<?php 
						$food="SELECT * FROM books where cat_id='".$id."'";
						$query1 = mysqli_query($con,$food); 
						$count = 0;
						while ($row3 = mysqli_fetch_assoc($query1)) { 
						$bookimage = $row3['image'];
						$bookimage_src = "upload/book/".$bookimage; 


						if ($row3['qnt'] > 1) {
						if ($count < 6) { 
							?>
							<div class="col-sm-12 col-md-4 col-lg-4 mt-5">
						<a class="lightbox">
							<img style="width: 100%; height: 500px" class="img-fluid" src="<?php echo $bookimage_src; ?>"  alt="Gallery Images">
							<h4 class="mt-2"><b><?php echo $row3['book_title']; ?></b></h4>
							<p class="item-price"><?php echo $row3['description']; ?></p>
							<p class="item-price text-danger"><b>Rs. <?php echo $row3['spc_price']; ?></b></p>
							<a href="addtocart.php?book_id=<?php echo $row3['book_id']; ?>" class="btn btn-primary">Add to Cart</a>
						</a>
					</div>
					<?php  }else{ ?> 
						<div class="row">
							<div class="col-md-12 ml-5 mt-5">
								<a class="" href="menu.php"><h1>More food .... Go to Menu</h1></a>
							</div>
						</div>
						
						<?php }  $count++; } } ?>
				</div>
			</div>
		</div>
	</div>
<?php } $counts++; } 
}else if (isset($_REQUEST['author_id'])) { 

	$id = $_REQUEST['author_id'];

	$boodcat="SELECT * FROM author where author_id = '$id' ";
	$query2 = mysqli_query($con,$boodcat); 
	$counts = 0;
	while ($row2 = mysqli_fetch_assoc($query2)) { 
		$id = $row2['author_id'];
		$bood1="SELECT * FROM books where author_id='".$id."'";
		$query3 = mysqli_query($con,$bood1); 
		if (mysqli_fetch_assoc($query3)) {
		?>

	<div class="gallery-box p-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<!-- <div class="heading-title text-center"> -->
						<h2 style="font-size: 50px; text-align: left; color: black"><b><?php echo $row2['author_name']; ?></b><h2>
						<hr>
					<!-- </div> -->
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<?php 
						$bood="SELECT * FROM books where author_id='".$id."'";
						$query1 = mysqli_query($con,$bood); 
						$count = 0;
						while ($row3 = mysqli_fetch_assoc($query1)) { 
						$bookimage = $row3['image'];
						$bookimage_src = "upload/book/".$bookimage; 


						if ($row3['qnt'] > 1) {
						if ($count < 6) { 
							?>
							<div class="col-sm-12 col-md-4 col-lg-4 mt-5">
						<a class="lightbox">
							<img style="width: 100%; height: 500px" class="img-fluid" src="<?php echo $bookimage_src; ?>"  alt="Gallery Images">
							<h4 class="mt-2"><b><?php echo $row3['book_title']; ?></b></h4>
							<p class="item-price"><?php echo $row3['description']; ?></p>
							<p class="item-price text-danger"><b>Rs. <?php echo $row3['spc_price']; ?></b></p>
							<a href="addtocart.php?book_id=<?php echo $row3['book_id']; ?>" class="btn btn-primary">Add to Cart</a>
						</a>
					</div>
					<?php  }else{ ?> 
						<div class="row">
							<div class="col-md-12 ml-5 mt-5">
								<a class="" href="menu.php"><h1>More food .... Go to Menu</h1></a>
							</div>
						</div>
						
						<?php }  $count++; } } ?>
				</div>
			</div>
		</div>
	</div>
<?php } $counts++; } 
}?>
	<!-- End Gallery -->


	<!--/Content-->

	<footer class=" container-fluid bg-dark p-3" id="contact">
		<div class="row">
			<div class="col-md-9">
				<h4 class="text-white text-left ml-2">Nipuna Book Shop <br> 0717474879</h4>
				<p class="text-white text-left ml-2">No, 06/01/B6, Makola Rd Sapugaskanda <br> G.M Methsara - SEU/IS/16/MIT/069</p>
				<p class="text-white text-left ml-2">NipunaBookshop&copy2021</p>
			</div>
			<div class="col-md-3 p-3">
				<img style="width: 90%; float: right;" src="img/Logo/logo.png">
			</div>
		</div>
	</footer>

</body>
</html>