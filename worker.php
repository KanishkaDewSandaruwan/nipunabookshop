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
          <li>
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
          <li class="active">
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
              <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Worker List</a></h1>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">New Register</button>
            </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Register Worker</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="name" class=""><b>Full Name</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-10">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                      </div>
                    </div>

                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="address"><b>Address</b></label>
                      <input type="text" class="form-control"  name="address" placeholder="Address">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="phone"><b>Phone Number</b></label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputState"><b>Gender</b></label>
                        <select id="inputState" name="gender" class="form-control">
                          <option selected>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>

                  <div class="form-row">
                       <div class="form-group col-md-10">
                      <label for="phone"><b>Usename</b></label>
                      <input type="text" style="text-transform: uppercase;" class="form-control" name="uname" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-10">
                      <label for="phone"><b>Password</b></label>
                      <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="phone"><b>Confirm Password</b></label>
                      <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                    <?php 
                    if(isset($_POST['submit'])){
                      $fname = $_REQUEST['name'];
                      $emails = $_REQUEST['email'];
                      $address = $_REQUEST['address'];
                      $phone = $_REQUEST['phone'];
                      $gender = $_REQUEST['gender'];
                      $uname = $_REQUEST['uname'];
                      $pass = $_REQUEST['pass'];
                      $conf_pass = $_REQUEST['conf_pass'];
  
  
                      if(!empty($fname)){
                        if(!empty($emails)){
                          if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                            if(!empty($address)){
                              if(!empty($phone)){
                                if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                  if(!empty($gender)){
                                    if(!empty($uname)){
                                          if(!empty($pass)){
                                            if(!empty($conf_pass)){
                                              if($pass==$conf_pass){
                                                  $query2="SELECT * FROM editor WHERE email='$emails'";
                                                      $sql2=mysqli_query($con,$query2);
  
                                                      if(mysqli_num_rows($sql2)>0){
                                                        echo "<script>alert(\"Email Alrady Exsisted\");</script>";
                                                      }else{
                                                          $query3="SELECT * FROM editor WHERE username='$uname'";
                                                          $sql3=mysqli_query($con,$query3);
  
                                                          if(mysqli_num_rows($sql3)>0){
                                                            echo "<script>alert(\"Username Alrady Exsisted\");</script>";
                                                          }else{
                                                                      $q1="INSERT INTO editor(full_name,address,phone_number,email,gender,password,username) values('$fname','$address','$phone','$emails','$gender','".md5($pass)."','$uname')";
                                                                            $res1=mysqli_query($con,$q1);
                                                                            if ( $res1) {
  
                                                                                 echo '<script>alert("Data Saved is Scussessfully.");
                                                                                 window.location.href="worker.php";
                                                                                              </script>';
                                                                                
                                                                            }else{
                                                                              echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                                                            }
                                                                      
                                                                }
                                                            }
                                              }else{ echo "<script>alert(\"Password is Not Match\");</script>";}
                                            }else{ echo "<script>alert(\"Please Confirm Password\");</script>";}
                                          }else{ echo "<script>alert(\"Please Enter Password\");</script>";}
                                        }else{ echo "<script>alert(\"Please Enter Username\");</script>";}
                                      }else{ echo "<script>alert(\"Please select Gender\");</script>";}
                                    }else{ echo "<script>alert(\"Please Enter Valid Phone Number\");</script>";}
                                  }else{ echo "<script>alert(\"Please Enter Phone Number\");</script>";}
                                }else{ echo "<script>alert(\"Please Enter Address\");</script>";}
                              }else{ echo "<script>alert(\"Please Enter Valid Email Address\");</script>";}
                            }else{ echo "<script>alert(\"Please Enter Email Address\");</script>";}
                          }else{ echo "<script>alert(\"Please Enter Worker Name\");</script>";}       
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
                                            <th class="border-top-0 text-white">Worker Name</th>
                                            <th class="border-top-0 text-white">Address</th>
                                            <th class="border-top-0 text-white">Phone Number</th>
                                            <th class="border-top-0 text-white">Email </th>
                                            <th class="border-top-0 text-white">Gender</th>
                                            <th class="border-top-0 text-white">Username</th>
                                            <th class="border-top-0 text-white">Edit</th>
                                            <th class="border-top-0 text-white">Remove</th>
                                        </tr>
                                    </thead>
                                    <?php $count=1;
                                      $editor = "SELECT * FROM editor";
                                      $viewresult = mysqli_query($con, $editor);
                                        
                                      ?>
                                    <tbody>
                                    	<?php while($row = mysqli_fetch_assoc($viewresult)) { 
                                        if($row['username'] != 'admin'){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['full_name']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['phone_number']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><a style="text-decoration: none; color: red; font-size: 15px;" href="edit_worker.php?editor_id=<?php echo $row['editor_id']; ?>"><i class="fas fa-edit"></i></a></td>
                                            <td><a style="text-decoration: none; color: red; font-size: 15px;" href="delete.php?editor_id=<?php echo $row['editor_id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <?php   $count++; } }?>
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
