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
        <div class="col-md-8 p-5 col-md-4 text-left">
              <?php 
              $viewquery = " SELECT * FROM customer where customer_id = '".$_SESSION['customer_id']."'";
              $viewresult = mysqli_query($con,$viewquery);
              $row = mysqli_fetch_assoc($viewresult); ?>


              <h1 class="text-danger text-uppercase">My Account Details</h1><br><br>
              <!-- <div class="dropdown-divider"></div> -->
              <div class="col-md-10">
                  <div class="row ml-3">  
                     <h3 style="color: black;">Name : <?php echo $row['name']; ?></h3>
                  </div>
                  <div class="row ml-3">
                     <h3 style="color: black;">Address : <?php echo $row['address']; ?></h3>
                  </div>
                  <div class="row ml-3">
                     <h3 style="color: black;">NIC Number : <?php echo $row['nic']; ?></h3>
                  </div>
                  <div class="row ml-3">
                     <h3 style="color: black;">Phone Number : <?php echo $row['phone']; ?></h3>
                  </div>
                  <div class="row ml-3">
                     <h3 style="color: black;">Email Address :<?php echo $row['email']; ?></h3>
                  </div>
              </div>

          </div>
              <div class="col-md-4">
                  <button type="button" name="submit" class="btn col-md-10 p-4  btn-info" onclick="window.location.href='edit_profile.php'" style="border-radius:20px;">Edit Profile</button>
                  <button type="button" name="submit" class="btn col-md-10 p-4  btn-info" data-toggle="modal" data-target="#exampleModal" style="border-radius:20px;">Change Password</button>
                  <button type="button" name="submit" class="btn col-md-10 p-4  btn-info" data-toggle="modal" data-target="#exampleModalemail" style="border-radius:20px;">Change Email</button>
                  <button type="button" name="submit" class="btn col-md-10 p-4  btn-danger" onclick="window.location.href='user_delete.php?customer_id=<?php echo $row['customer_id']; ?>'" style="border-radius:20px;">Delete Account</button>
              </div>
      </div>
      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form action="" method="POST"> 
              <div class="modal-body">

                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <input type="password" name="cpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Password"/>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="password" name="npass" id="userPassword" class="form-control input-sm chat-input" placeholder="New Password"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="password" name="conpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Confirm Password"/>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="pass_change"  class="btn btn-primary">Save changes</button>
              </div>
               <?php
                if(isset($_POST['pass_change']))
                {


                $currentpass=stripslashes($_REQUEST['cpass']);
                $newpass=stripslashes($_REQUEST['npass']);
                $confpass=stripslashes($_REQUEST['conpass']);
                $g = $_SESSION['customer_id'];

                if(!empty($currentpass)){
                  if(!empty($newpass)){
                    if(!empty($confpass)){

                      $loginsql="SELECT * FROM customer WHERE password='".md5($currentpass)."'";
                      $result=mysqli_query($con,$loginsql) or mysqli_errno();
                      $rows=mysqli_fetch_assoc($result);

                      $query5="SELECT password FROM customer WHERE customer_id='".$g."'";
                      $sql5=mysqli_query($con,$query5);
                      $row=mysqli_fetch_assoc($sql5);

                      if(isset($rows['password'])==isset($row['password']))
                      {
                        if($newpass==$confpass){
                          $query3="SELECT * FROM customer WHERE password='$newpass'";
                          $sql3=mysqli_query($con,$query3);

                          if(mysqli_num_rows($sql3)>0)
                          {
                            echo "password already Exsisted";
                          }
                          else
                          {
                              $query2="UPDATE customer SET password='".md5($newpass)."' WHERE customer_id='".$g."'";
                              $sql2=mysqli_query($con,$query2);
                              echo "<script type=\"text/javascript\"> alert(\"Password Update Successfull\"); window.location.href='logout.php'; </script>"; 
                          }

                        }else{ echo "<script>alert(\"Password is Not Match\");</script>";} 
                      }else{ echo "<script>alert(\"Current Password is Wrong\");</script>";} 
                    }else{ echo "<script>alert(\"Enter Confirm Password\");</script>";} 
                  }else{ echo "<script>alert(\"Enter New Password\");</script>";} 
                }else{ echo "<script>alert(\"Enter Current Password\");</script>";} 

                }
            ?>
            </form>
            </div>
          </div>
        </div>
             <!-- Modal -->
        <div class="modal fade" id="exampleModalemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form action="" method="POST"> 
              <div class="modal-body">

                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <input type="email" name="cemail" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Email"/>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="email" name="nemail" id="userPassword" class="form-control input-sm chat-input" placeholder="New Email"/>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
              </div>
              <?php
      if(isset($_POST['submit']))
      {

      $currentemail=stripslashes($_REQUEST['cemail']);
      $newemail=stripslashes($_REQUEST['nemail']);
      $g = $_SESSION['customer_id'];

      if(!empty($currentemail)){
        if(!empty($newemail)){
          if(filter_var($newemail, FILTER_VALIDATE_EMAIL)){

            $loginsql="SELECT * FROM customer WHERE email='".$currentemail."'";
            $result=mysqli_query($con,$loginsql) or mysqli_errno();
            $rows=mysqli_fetch_assoc($result);

            $query5="SELECT email FROM customer WHERE customer_id='".$g."'";
            $sql5=mysqli_query($con,$query5);
            $row=mysqli_fetch_assoc($sql5);

            if(isset($rows['email'])==isset($row['email']))
            {
                $query3="SELECT * FROM customer WHERE email='$newemail'";
                $sql3=mysqli_query($con,$query3);

                if(mysqli_num_rows($sql3)>0)
                {
                  echo "<script>alert(\"Email already Exsisted\");</script>";
                }
                else
                {
                    $query2="UPDATE customer SET email='".$newemail."' WHERE email='".$currentemail."'";
                    $sql2=mysqli_query($con,$query2);
                    echo "<script type=\"text/javascript\"> alert(\"Email Update Successfull\"); window.location.href='logout.php'; </script>"; 
                }
            }else{ echo "<script>alert(\"Current Email is Wrong\");</script>";} 
        
          }else{ echo "<script>alert(\"Enter Valid Email\");</script>";} 
        }else{ echo "<script>alert(\"Enter New Email\");</script>";} 
      }else{ echo "<script>alert(\"Enter Current Email\");</script>";} 

      }
  ?>
            </form>
            </div>
          </div>
        </div>

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