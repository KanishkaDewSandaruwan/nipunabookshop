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
              <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Edit Worker Details</a></h1>
            </div>
            <div class="row">
              <form class="reg_form bg-light p-4 border-round" action="" method="POST" enctype="multipart/form-data">
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
                          <option selected></option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>
                </div>
                  <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                    <?php 
                    if(isset($_POST['submit'])){
                      $fname = $_REQUEST['name'];
                      $emails = $_REQUEST['email'];
                      $address = $_REQUEST['address'];
                      $phone = $_REQUEST['phone'];
                      $gender = $_REQUEST['gender'];

                      $id = $_REQUEST['editor_id'];

                      if(!empty($fname))
                        {
                          $query3="UPDATE editor SET full_name='$fname' WHERE editor_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"worker.php\";</script>";
                        }


                        if(!empty($emails))
                              {
                                if(filter_var($emails, FILTER_VALIDATE_EMAIL)){

                                  $query1="SELECT * FROM editor WHERE email='$emails'";
                                  $sql1=mysqli_query($con,$query1);


                                    if(mysqli_num_rows($sql1)>0)
                                    {
                                      echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                                    }
                                    else
                                      {
                                        $query3="UPDATE editor SET email='$emails' WHERE editor_id='".$id."'";
                                        $sql3=mysqli_query($con,$query3);
                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='worker.php';</script>";
                                      }
                                }else{echo "<script type=\"text/javascript\"> alert(\"Enter Valied Email Address\");</script>";}
                              }
                              if(!empty($address))
                              {
                                $query3="UPDATE editor SET address='$address' WHERE editor_id='".$id."'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"worker.php\";</script>";
                              }
                              if(!empty($phone))
                              {
                                if(preg_match("/^([0]([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                    $query3="UPDATE editor SET phone_number='$phone' WHERE editor_id='".$id."'";
                                    $sql3=mysqli_query($con,$query3);
                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"worker.php\";</script>";

                                  }else{echo "<script type=\"text/javascript\"> alert(\"Enter Valied Phone Number\");</script>";}
                              }
                              if(!empty($gender))
                              {
                                $loginsql="SELECT * FROM editor WHERE editor_id='".$id."'";
                                  $result=mysqli_query($con,$loginsql);
                                  $rows=mysqli_fetch_assoc($result);
                                  $a = $rows['gender'];

                                  if($a==$gender)
                                  {
                                      echo "<script type=\"text/javascript\"> alert(\"Gender already Here\");</script>";
                                    }else{ 
                                      $query3="UPDATE editor SET gender='$gender' WHERE editor_id='".$id."'";
                                      $sql3=mysqli_query($con,$query3);
                                      echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"worker.php\";</script>";
                                }
                              }
        
        
                }
                ?>
                  </div>
                </form>
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
