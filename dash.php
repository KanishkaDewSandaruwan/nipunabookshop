<?php
  require_once 'connection.php'; //insert connection to page
  require_once 'admin.php'; //Check login 

?>

<!--doctype html-->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.dashboard.css">
	
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>Hello, world!</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	  
	    <!--fontawesome-->
   <link href="fontawesome/css/all.css" rel="stylesheet">
  </head>
 
  <body>
  
  <div id="wrapper">
	  
        <!-- Sidebar -->
<nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
	<div class="simplebar-content" style="padding: 0px;">
		<a class="sidebar-brand" href="dash.php"><span class="align-middle">Nipuna Book Shop</span></a>
		<ul class="navbar-nav align-self-stretch">
	 
			<li class="sidebar-header">Pages</li>

			<li class=""> 
			<a class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bar-chart-1"></i>Dashboard</a>
			</li>

				<li class="has-sub"> 
					<a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse" >
						<i class="flaticon-user"></i>   Customers
					</a>

					<div class="collapse menu mega-dropdown" id="collapseExample2">
						<div class="dropmenu" aria-labelledby="navbarDropdown">
							<div class="container-fluid ">
								<div class="row">
									<div class="col-lg-12 px-2">
										<div class="submenu-box"> 
											<ul class="list-unstyled m-0">
												<li><a href="dash.php?id=1">All Customers</a></li>
												<li><a href="dash.php?id=2">New Customers</a></li>
												<li><a href="dash.php?id=3">Coustomer Reports</a></li> 
												<!-- <li><a href="">Asp.net</a></li> -->
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</li>

				<li class="has-sub"> 
					<a class="nav-link collapsed text-left" href="#collapse2" role="button" data-toggle="collapse" >
						<i class="flaticon-user"></i>Books
					</a>

					<div class="collapse menu mega-dropdown" id="collapse2">
						<div class="dropmenu" aria-labelledby="navbarDropdown">
							<div class="container-fluid ">
								<div class="row">
									<div class="col-lg-12 px-2">
										<div class="submenu-box"> 
											<ul class="list-unstyled m-0">
												<li><a href="dash.php?id=4">New Books</a></li>
												<li><a href="dash.php?id=5">Top Search</a></li>
												<li><a href="dash.php?id=6">All Books</a></li>
												<!-- <li><a href="">Asp.net</a></li> -->
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

				</li>

				<li class="has-sub"> 
					<a class="nav-link collapsed text-left" href="#collapse3" role="button" data-toggle="collapse" >
						<i class="flaticon-user"></i>Authors
					</a>

					<div class="collapse menu mega-dropdown" id="collapse3">
						<div class="dropmenu" aria-labelledby="navbarDropdown">
							<div class="container-fluid ">
								<div class="row">
									<div class="col-lg-12 px-2">
										<div class="submenu-box"> 
											<ul class="list-unstyled m-0">
												<li><a href="dash.php?id=8">All Authors</a></li>
												<li><a href="dash.php?id=9">New Added Authors</a></li>
												<li><a href="dash.php?id=10">Author Reports</a></li> 
												<!-- <li><a href="">Asp.net</a></li> -->
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</li>

				<li class="sidebar-header">Tools DataBase</li>

				<li class=""> 
					<a href="dash.php?id=11" class="nav-link text-left"  role="button" ><i class="flaticon-bar-chart-1"></i>Add A New Book</a>
				</li>

				<li class=""> 
				<a href="dash.php?id=12" class="nav-link text-left"  role="button" ><i class="flaticon-bar-chart-1"></i>  Add A New Categories</a>
				</li>

				<li class=""> 
				<a href="dash.php?id=14" class="nav-link text-left"  role="button" ><i class="flaticon-bar-chart-1"></i>  Add A New Author</a>
				</li>

				<li class=""> 
				<a href="dash.php?id=15" class="nav-link text-left"  role="button" ><i class="flaticon-bar-chart-1"></i>  Add A New Admin</a>
				</li>

				<li class="sidebar-header">tools Site</li>

				<li class=""> 
				<a href="dash.php?id=16" class="nav-link text-left"  role="button" ><i class="flaticon-bar-chart-1"></i>  Add New Banner</a>
				</li>
		  </ul>
	</div>
</nav>
	  
	<!-- /#sidebar-wrapper -->
	  		
<div id="page-content-wrapper">
	<div id="content">
		<div class="container-fluid p-0 px-lg-0 px-md-0">
			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light my-navbar">

			  <!-- Sidebar Toggle (Topbar) -->
				<div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
				   <span></span>
					<span></span>
					 <span></span>
				</div>


			  <!-- Topbar Search -->
			  <form class="d-none d-sm-inline-block form-inline navbar-search">
				<div class="input-group">
				  <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
				  <div class="input-group-append">
					<button class="btn btn-primary" type="button">
					  <i class="fas fa-search fa-sm"></i>
					</button>
				  </div>
				</div>
			  </form>

			  <!-- Topbar Navbar -->
			  <ul class="navbar-nav ml-auto">

				<!-- Nav Item - Search Dropdown (Visible Only XS) -->
				<li class="nav-item dropdown  d-sm-none">

				  <!-- Dropdown - Messages -->
				  <div class="dropdown-menu dropdown-menu-right p-3">
					<form class="form-inline mr-auto w-100 navbar-search">
					  <div class="input-group">
						<input type="text" class="form-control bg-light border-0 small"
						placeholder="Search for..." >
						<div class="input-group-append">
						  <button class="btn btn-primary" type="button">
							<i class="fas fa-search fa-sm"></i>
						  </button>
						</div>
					  </div>
					</form>
				  </div>
				</li>
				<!-- Nav Item - Messages -->
				<li class="nav-item">
				  <a class="nav-link " href="#"
				 role="button">
					<i class="fas fa-shopping-cart "></i>
					<!-- Counter - Messages -->
					<span class="badge badge-danger badge-counter">7</span>
				  </a>
				</li>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
					<span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome Back!</span>
					<img class="img-profile rounded-circle" src="img/logo3.png">
				  </a>
				</li>

			  </ul>

			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid px-lg-4">
				<div class="row">
					<div class="col-md-12 mt-lg-4 mt-4">
					  <!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						</div>
					</div>

<!--
					<div class="col-md-12">
						<div class="row">
							<div class="col-sm-3">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title mb-4">Sales</h5>
										<h1 class="display-5 mt-1 mb-3">2.382</h1>
										<div class="mb-1">
											<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
											<span class="text-muted">Since last week</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
-->

					<!-- column -->

					<div class="col-md-12 mt-4">
						<div class="card">

							<!-- title -->
								
							<!-- //title -->
							
							<!-- Table -->
									<?php
	  
									  if(isset($_REQUEST['id'])) {

											  $id = $_REQUEST['id'];
											  		if($id==1)
													  
														{
														$count=1;
														$viewquery = " SELECT * FROM sign_up";
														$viewresult = mysqli_query($con,$viewquery);
															//title
														echo '<div class="col-md-12 mt-lg-4 mt-4">
																<div class="d-sm-flex align-items-center justify-content-between mb-4">
																	<h1 class="h3 mb-0 text-gray-800">Customers</h1>
																</div>
															</div>
															<div class="card-body">
																<div class="d-md-flex align-items-center">

																	<div>
																		<h4 class="card-title">All Customers</h4>
																		<h5 class="card-subtitle">Overview of All Customers</h5>
																	</div>
																	
																</div>
															</div>
															<div class="table-responsive">
																		<table class="table v-middle">
																			<thead>
																				<tr class="bg-light">
																					<th class="border-top-0">Name</th>
																					<th class="border-top-0">Phone</th>
																					<th class="border-top-0">Address</th>
																					<th class="border-top-0">Email</th>
																					<th class="border-top-0">NIC Number</th>
																					<th class="border-top-0">Edit</th>
																					<th class="border-top-0">Delete</th>
																				</tr>
																			</thead>';

														while($row = mysqli_fetch_assoc($viewresult))
														{
															echo '<tbody>
																	<tr>
																		<td>'.$row['name'].'</td>
																		<td>'.$row['phone'].'</td>
																		<td>'.$row['address'].'</td>
																		<td>'.$row['email'].'</td>
																		<td>'.$row['nic_num'].'</td>
																		<td><a href="edit.php?book_id='.$row['customer_id'].'">Edit</a></td>
																		<td><a href="delete.php?book_id='.$row['customer_id'].'">Delete</a></td>
																	</tr>
																</tbody>';}
														echo '</table></div>';
													   }
										  
										  				if($id==2)
													   {
														$count=1;
														$viewquery = " SELECT * FROM sign_up";
														$viewresult = mysqli_query($con,$viewquery);
														
														echo '<div class="card-body">
																<div class="d-md-flex align-items-center">

																	<div>
																		<h4 class="card-title">New Customers</h4>
																		<h5 class="card-subtitle">Overview of New Customers</h5>
																	</div>
																	
																</div>
															</div>
															<div class="table-responsive">
																		<table class="table v-middle">
																			<thead>
																				<tr class="bg-light">
																					<th class="border-top-0">Name</th>
																					<th class="border-top-0">Phone</th>
																					<th class="border-top-0">Address</th>
																					<th class="border-top-0">Email</th>
																					<th class="border-top-0">NIC Number</th>
																					<th class="border-top-0">Edit</th>
																					<th class="border-top-0">Delete</th>
																				</tr>
																			</thead>';
														
														while($row = mysqli_fetch_assoc($viewresult))
															{
															if($count <= 10)
															{
																echo '<tbody>
																		<tr>
																			<td>'.$row['name'].'</td>
																			<td>'.$row['phone'].'</td>
																			<td>'.$row['address'].'</td>
																			<td>'.$row['email'].'</td>
																			<td>'.$row['nic_num'].'</td>
																			<td><a href="edit.php?book_id='.$row['customer_id'].'">Edit</a></td>
																			<td><a href="delete.php?book_id='.$row['customer_id'].'">Delete</a></td>
																		</tr>
																	</tbody>';
																}
																$count++;
															}
															echo '</table></div>';
														}
														if($id==11)
														{
														echo'<form method="POST" action="#" enctype="multipart/form-data">
															<input type="hidden" name="size" value="1000000">
														<div><label for="inputState"><b>Book Cover</b></label>
															<input type="file" name="bookcover">
														<div><label for="inputState"><b>Book Name</b></label>
															<input id="text" name="bookname" placeholder="Book Name"></inout>
														</div>
														<div><label for="inputState"><b>Author</b></label>
															<select class="col-2" id="inputState" name="author" class="form-control">';
																$q1 = "SELECT * FROM author";
																$res1 = mysqli_query($con,$q1);
																$c=1;
																while($row=mysqli_fetch_assoc($res1))
																{
																echo "<option>".$row['au_name']."</option>";
																	$c++;
																}
														echo'</select></div>';
																	
														echo'<div>
															<label for="inputState"><b>Categories</b></label>
															<select class="col-2" id="inputState" name="categorie" class="form-control">';
																$q2 = "SELECT * FROM categories";
																	$res2 = mysqli_query($con,$q2);
																	$d=1;
																	while($row=mysqli_fetch_assoc($res2))
																	{
																	echo "<option>".$row['categorie_name']."</option>";
																		$d++;
																	}
														echo'</select></div>';
														echo'<div>
																<button type="submit" name="upload">POST</button>
															</div></form>';
														}
									  }
										?> 
							<!-- //Table -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<!--footer-->
		
		<footer class="footer">
		<div class="container-fluid">
			<div class="row text-muted">
				<div class="col-6 text-left">
					<p class="mb-0">
						<a href="index.html" class="text-muted"><strong>Dashboard Vishweb Design </strong></a> &copy
					</p>
				</div>
				<div class="col-6 text-right">
					<ul class="list-inline">
						<li class="footer-item">
							<a class="text-muted" href="#">Support</a>
						</li>
						<li class="footer-item">
							<a class="text-muted" href="#">Help Center</a>
						</li>
						<li class="footer-item">
							<a class="text-muted" href="#">Privacy</a>
						</li>
						<li class="footer-item">
							<a class="text-muted" href="#">Terms</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		</footer>
		
	</div>

	
</div>
   <!-- /#page-content-wrapper -->
</div>
    <!-- /#wrapper -->
	  
	  
 <script>
 
$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

});

</script>

  </body>
</html>