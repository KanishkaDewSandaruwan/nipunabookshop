<?php
  require_once 'connection.php'; //insert connection to page
  session_start();
	if(!isset($_SESSION['customer_id'])){
		header('location:index.php');
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
        <div class="col-md-4 mt-5 text-left ml-5">
              <div class="form-login"></br>
                <form action="" method="POST"> 
                    <h2>Edit Your Details</h2>
                    </br>
                    <input type="text" id="userName" name="name" style="text-transform: uppercase;" class="form-control input-sm chat-input" placeholder="Name"/>
                    </br></br>
                    <input type="text" name="phone" id="userPassword" class="form-control input-sm chat-input" placeholder="Phone Number"/>
                    </br></br>
                    <input type="text" name="address" id="userPassword" class="form-control input-sm chat-input" placeholder="Your Address"/>
                    </br></br>
                    <input type="text" name="nic" id="userPassword" class="form-control input-sm chat-input" placeholder="Your NIC Number"/>
                    </br></br>
                    <div class="wrapper">
                        <button style="font-size: 20px;" class="btn p-3 btn-danger btn-round col-md-6" type="submit" name="submit"><b>Change Details<i class="fa fa-sign-in"></i></b></button><br><br>
                            <!-- <button type="submit" name="submit" class="group-btn">login </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    </br>
    <?php
    if(isset($_POST['submit']))
    {


        $name = $_REQUEST['name'];
        $nic = $_REQUEST['nic'];
        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];
        $geID = $_SESSION['customer_id'];
        $cdate = date("Y/m/d m:H:s");


          
                    if(!empty($name))
                      {
                        $query3="UPDATE customer SET first_name='$name' WHERE customer_id='".$geID."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                      }

                      if(!empty($address))
                      {
                        $query3="UPDATE customer SET address='$address' WHERE customer_id='".$geID."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                      }

                      if(!empty($phone))
                      {
                        if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                            $query3="UPDATE customer SET phone='$phone' WHERE customer_id='".$geID."'";
                            $sql3=mysqli_query($con,$query3);
                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";

                          }else{echo "Enter Valid Phone Number";}
                      }


                      if(!empty($nic))
                      {
                        $query3="UPDATE customer SET nic='$nic' WHERE customer_id='".$geID."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                      }

    }
?>
	<!--/Content-->

	<footer style="margin-top: 18%" class=" container-fluid bg-dark p-3" id="contact">
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