<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'components/head.php'; ?> 
</head>

<body class="">
  <div class="wrapper ">
      <!-- End Navbar -->
      <?php include 'components/nav.php'; ?> 
      <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/book.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          Nipuna Bookshop
          <!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./customer.php">
            <i class="fas fa-users"></i>
              <p>Customer</p>
            </a>
          </li>
          <li>
            <a href="./books.php">
            <i class="fas fa-book"></i>
              <p>Books</p>
            </a>
          </li>
          <li>
            <a href="./cat.php">
            <i class="nc-icon nc-tile-56"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="active">
            <a href="./author.php">
            <i class="fas fa-user-edit"></i>
              <p>Autors</p>
            </a>
          </li>
          <li>
            <a href="./order.php">
            <i class="fas fa-box-open"></i>
              <p>Orders</p>
            </a>
          </li>
          <li>
            <a href="./worker.php">
            <i class="fas fa-users-cog"></i>
              <p>Workes</p>
            </a>
          </li>
          <li>
            <a href="./custom.php">
            <i class="fas fa-users-cog"></i>
              <p>Customize</p>
            </a>
          </li>
          <!-- <li class="active-pro">
            <a href="./upgrade.html">
              <i class="nc-icon nc-spaceship"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
      <!-- End Navbar -->
      <div class="content" style="font-family: \"Times New Roman\",Times, serif;">
          <div class="row mt-5">
                <div class="col-md-12">
                <div class="row">
            <div class="col-md-10">
              <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">View Author List</a></h1>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Author</button>
            </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Add New Author</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="name" class=""><b>Author Name</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Author Name">
                      </div>
                    </div>
                  <div class="form-row">
                      <div class="form-group col-md-10">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                      </div>
                    </div>
                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="phone"><b>Phone Number</b></label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                    </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                    <?php 
                    if(isset($_POST['submit'])){

                      $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $phone = $_REQUEST['phone'];

                    if(!empty($fname)){
                      if(!empty($emails)){
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                            if(!empty($phone)){
                              if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
     
                                        $query3="SELECT * FROM author WHERE author_name='$uname'";
                                        $sql3=mysqli_query($con,$query3);

                                        if(mysqli_num_rows($sql3)>0){
                                            echo "Username already Exsisted";
                                        }else{
                                              $q1="INSERT INTO author(author_name,email,phone) values('$fname','$emails','$phone')";
                                                    $res1=mysqli_query($con,$q1);
                                                    if ( $res1) {

                                                         echo '<script>alert("Data Saved is Scussessfully.");
                                                         window.location.href="dashboard.php";
                                                                      </script>';
                                                        
                                                    }else{
                                                      echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                                    }
                                              }
                                                              
                                                          
                              }else{ echo "<script>alert(\"Please Enter Valid Phone Number\");</script>";}
                            }else{ echo "<script>alert(\"Please Enter Phone Number\");</script>";}
                        }else{ echo "<script>alert(\"Please Enter Valid Email Address\");</script>";}
                      }else{ echo "<script>alert(\"Please Enter Email Address\");</script>";}
                    }else{ echo "<script>alert(\"Please Enter Author Name\");</script>";}
                }
                ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
            <br><br>
          </div>
            <div class="row">
            <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table v-middle text-center">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th class="border-top-0 text-white">Author Name</th>
                                            <th class="border-top-0 text-white">Email</th>
                                            <th class="border-top-0 text-white">Phone Number</th>
                                            <th class="border-top-0 text-white">Edit</th>
                                            <th class="border-top-0 text-white">Remove</th>
                                        </tr>
                                    </thead>
                                    <?php $count=1;
                                      $getcat = "SELECT * FROM author";
                                      $viewresult = mysqli_query($con, $getcat);
                                        
                                      ?>
                                    <tbody>
                                    	<?php while($row = mysqli_fetch_assoc($viewresult)) { ?>
                                        <tr>
                                            <td><p style="font-size:20px"><?php echo $row['author_name']; ?></p></td>
                                            <td><p style="font-size:20px"><?php echo $row['email']; ?></p></td>
                                            <td><p style="font-size:20px"><?php echo $row['phone']; ?></p></td>
                                            <td><h3><a style="text-decoration: none; color: red; font-size: 15px;" href="edit_author.php?author_id=<?php echo $row['author_id']; ?>"><i class="fas fa-edit"></i></a></h3></td>
                                            <td><h3><a style="text-decoration: none; color: red; font-size: 15px;" href="delete.php?author_id=<?php echo $row['author_id']; ?>"><i class="fas fa-trash-alt"></i></a></h3></td>
                                        </tr>
                                        <?php   $count++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
          </div>
        </div>
      <footer class="footer footer-black  footer-white ">
        <?php include 'components/footer.php'; ?> 
      </footer>
    </div>
  </div>
</body>
</html>
