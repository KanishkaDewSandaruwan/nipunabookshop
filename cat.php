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
          <li class="active">
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
              <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">View Categori List</a></h1>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
            </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Add New Categori</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                      <div class="form-group col-md-12">
                      <label for="phone"><b>Categori Name</label>
                      <input type="text" class="form-control" name="cat_name" placeholder="Categori Name">
                      </div>
                    </div>
                    <br>
                    Select Foods Front image to upload:<br>
                        <input type="file" name="file" /><br><br>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                    <?php 
                    if(isset($_POST['submit'])){
                      $cat_name = $_REQUEST['cat_name'];


                      if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) { 
                        
                        $name = $_FILES['file']['name'];
                        $target_dir = "upload/cat/";
                        $target_file = $target_dir . basename($_FILES["file"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $extensions_arr = array("jpg","jpeg","png","gif");

                            if(!empty($cat_name)){
                                $q4 = "SELECT * FROM book_cat WHERE cat_name='$cat_name'";
                                $res4 = mysqli_query($con,$q4);

                                    if(mysqli_num_rows($res4)>0)
                                    {
                                      echo '<script>alert("Book Categori Alrady Saved.");
                                      </script>';
                                    }
                                    else{
                                      $q1="INSERT INTO book_cat(cat_name,cat_image) values('$cat_name','$name')";
                                            $res1=mysqli_query($con,$q1);
                                            if (in_array($imageFileType,$extensions_arr)) {

                                              move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                                                if ( $res1)
                                                {

                                                    echo '<script>alert("Book Categori Saved is Scussessfully.");
                                                      </script>';
                                                }else{
                                                  echo "<script>alert(\"Book Categori Save is Not Scussess\");</script>";
                                                }
                                            }
                                    }  
                            }else{ echo "<script>alert(\"Please Enter Categori Name\");</script>";}
                          }else{ echo "<script>alert(\"Please select Image to Upload\");</script>";}
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
            <div class="col-md-6 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table v-middle text-center">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th class="border-top-0 text-white">Categori Name</th>
                                            <th class="border-top-0 text-white">Image</th>
                                            <th class="border-top-0 text-white">Remove</th>
                                        </tr>
                                    </thead>
                                    <?php $count=1;
                                      $getcat = "SELECT * FROM book_cat";
                                      $viewresult = mysqli_query($con, $getcat);
                                        
                                      ?>
                                    <tbody>
                                    	<?php while($row = mysqli_fetch_assoc($viewresult)) { 

                                            $image = $row['cat_image'];
                                            $image_src = "upload/cat/".$image;?>
                                        <tr>
                                            <td><h4><?php echo $row['cat_name']; ?></h4></td>
                                            <td><img width="100px" src='<?php echo $image_src; ?>'></td>
                                            <td><h3><a style="text-decoration: none; color: red; font-size: 15px;" href="delete.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="fas fa-trash-alt"></i></a></h3></td>
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
