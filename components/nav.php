
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">නිපුණ පොත්හල - Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="font-size: 45px" class="fas fa-users-cog"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <?php if (isset($_SESSION['username'])) {
                  $uname = $_SESSION['username'];
                  if ($uname == 'admin') { ?>
                  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#changepassword">Change Password</a>
                  <a class="dropdown-item" href="admin_logout.php">Logout</a>
                <?php }else{ ?>
                  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#changeusername">Change Username</a>
                  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#changepassword">Change Password</a>
                  <a class="dropdown-item" href="admin_logout.php">Logout</a>

                <?php } } ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Modal -->
        <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                $g = $_SESSION['username'];

                if(!empty($currentpass)){
                  if(!empty($newpass)){
                    if(!empty($confpass)){

                      $loginsql="SELECT * FROM editor WHERE password='".md5($currentpass)."'";
                      $result=mysqli_query($con,$loginsql) or mysqli_errno();
                      $rows=mysqli_fetch_assoc($result);

                      $query5="SELECT password FROM editor WHERE username='".$g."'";
                      $sql5=mysqli_query($con,$query5);
                      $row=mysqli_fetch_assoc($sql5);

                      if(isset($rows['password'])==isset($row['password']))
                      {
                        if($newpass==$confpass){
                          $query3="SELECT * FROM editor WHERE password='$newpass'";
                          $sql3=mysqli_query($con,$query3);

                          if(mysqli_num_rows($sql3)>0)
                          {
                            echo "password already Exsisted";
                          }
                          else
                          {
                              $query2="UPDATE editor SET password='".md5($newpass)."' WHERE username='".$g."'";
                              $sql2=mysqli_query($con,$query2);
                              echo "<script type=\"text/javascript\"> alert(\"Password Update Successfull\"); window.location.href='admin_logout.php'; </script>"; 
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
        <div class="modal fade" id="changeusername" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Username</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form action="" method="POST"> 
              <div class="modal-body">

                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <input type="text" name="cuname" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Username"/>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="text" name="nuname" id="userPassword" class="form-control input-sm chat-input" placeholder="New Username"/>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit_uname"  class="btn btn-primary">Save changes</button>
              </div>
              <?php
      if(isset($_POST['submit_uname']))
      {

      $currentuname=stripslashes($_REQUEST['cuname']);
      $newuname=stripslashes($_REQUEST['nuname']);
      $g = $_SESSION['username'];

      if(!empty($currentuname)){
        if(!empty($newuname)){

            $loginsql="SELECT * FROM editor WHERE username='".$currentuname."'";
            $result=mysqli_query($con,$loginsql) or mysqli_errno();
            $rows=mysqli_fetch_assoc($result);

            $query5="SELECT username FROM editor WHERE username='".$g."'";
            $sql5=mysqli_query($con,$query5);
            $row=mysqli_fetch_assoc($sql5);

            if(isset($rows['username'])==isset($row['username']))
            {
                $query3="SELECT * FROM editor WHERE username='$newuname'";
                $sql3=mysqli_query($con,$query3);

                if(mysqli_num_rows($sql3)>0)
                {
                  echo "<script>alert(\"Username already Exsisted\");</script>";
                }
                else
                {
                    $query2="UPDATE editor SET username='".$newuname."' WHERE username='".$currentuname."'";
                    $sql2=mysqli_query($con,$query2);
                    echo "<script type=\"text/javascript\"> alert(\"Username Update Successfull\"); window.location.href='admin_logout.php'; </script>"; 
                }
            }else{ echo "<script>alert(\"Current Username is Wrong\");</script>";} 
        
        }else{ echo "<script>alert(\"Enter New Username\");</script>";} 
      }else{ echo "<script>alert(\"Enter Current Username\");</script>";} 

      }
  ?>
            </form>
            </div>
          </div>
        </div>