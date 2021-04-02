<?php
  require_once 'connection.php'; //insert connection to page
  session_start();
	if(!isset($_SESSION['customer_id'])){
		header('location:index.php');
	}else{
		$id = $_SESSION['customer_id'];
		$viewquery = " SELECT * FROM customer where customer_id = '$id'";
        $viewresult = mysqli_query($con,$viewquery); 
        $row1 = mysqli_fetch_assoc($viewresult);

        if (!isset($row1['name'])) {
        	header('location:logout.php');
        }
	}
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
	<div id="carousel" class="carousel slide carousel-fade " data-ride="carousel">

	</div>
	<div class="row">
			<div class="col-md-8">
					

			<!-- 2nd Block section -->

			<!-- Start Cart -->
				<?php 
				$cid = $_SESSION['customer_id'];
				$carts="SELECT * FROM cart where customer_id='".$cid."'";
				$carts1 = mysqli_query($con,$carts); 
				$total = 0;

				while ($row = mysqli_fetch_assoc($carts1)) { 
				$id = $row['book_id'];

					$food="SELECT * FROM books where book_id ='".$id."'";
					$query1 = mysqli_query($con,$food); 
					if($row1 = mysqli_fetch_assoc($query1)){

					$total = $total + $row['price'];
					$diliverFee = 40;

						$bookimage = $row1['image'];
						$bookimage_src = "upload/book/".$bookimage; 


						?>
					<div class="row mt-5 mb-5">
						<div class="col-md-1">
						</div>
						<div class="col-md-3">
							<img style="width: 100%;" class="img-fluid" src="<?php echo $bookimage_src; ?>"  alt="Gallery Images">
						</div>
						<div class="col-md-3 p-5">
							<h4><?php echo $row1['book_title']; ?></h4>
						</div>
						<div class="col-md-2 p-5">
							<h4><?php echo $row1['spc_price']; ?></h4>
						</div>
						<div class="col-md-2 p-5">
							<a href="removecart.php?cart_id=<?php echo $row1['book_id']; ?>"><h4><i style="font-size: 30px" class="fas fa-times"></i></h4></a>
						</div>
					</div>
		<?php }  }?>
				</div>
				<?php $carts="SELECT * FROM cart where customer_id='".$cid."'";
				$carts1 = mysqli_query($con,$carts); 
				if ($row = mysqli_fetch_assoc($carts1)) {  ?>
				<div class="col-md-4 mt-5 p-5" style="background-color: #f9f6f7; padding-left: 5%;">
					<h1 style="color: green">Book Payment Summery</h1><br>
					<div class="row"  style="background-color: #f9f6f7; color: black; padding-left: 5%;">
		            <div class="col-sm-8">
		              <p>Subtotal </p>
		              <p>Shiping Fee </p>
		              <p>Subtotal </p>
		            </div>
		            <div class="col-sm-4">
		              <p>Rs. <?php echo $total; ?> </p>
		              <p>Rs. <?php echo $diliverFee; ?> </p>
		              <p>Rs. <?php $total = $total + $diliverFee; echo $total; ?> </p>
		            </div>

		          </div>
		          <div class="row mt-5"  style="background-color: #f9f6f7; color: red; padding-left: 5%;">
		            <h2>Total </h2> <h2 style="margin-left: 35%;">Rs. <?php echo $total; ?></h2>
		          </div>

		          <div class="row mt-5 justify-content-center">
		                <button class="btn btn-info col-sm-11 ml-1" onclick="redirectUser()" type="button" style="background-color: #4e1d6d ; padding: 4%;">PROCEED TO CHECKOUT</i></button>
		          </div>
				</div>
			<?php }else{ ?>
				<div class="row p-5">
					<h1 style="font-size: 40px">Empty Cart</h1>
				</div>
			<?php } ?>
		<?php  ?> 
			</div>
		<script type="text/javascript">
      function redirectUser(){

          window.location.href='makeOrder.php?total=<?php echo $total; ?>';

        }
    </script>

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