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
          <li class="active">
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
      <div class="content">
          <div class="row">
             <form method="post" action="" style="padding: 3%;" enctype='multipart/form-data'>
                    <p style="font-size: 20px; color: green">Slider Image 01</p>
                    <input type='file' name='file' /><br>

                    <p style="font-size: 20px; color: green">Slider Image 02</p>
                    <input type='file' name='file1' /><br>

                    <p style="font-size: 20px; color: green">Slider Image 03</p>
                    <input type='file' name='file2' /><br><br>

                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a"><b>Title</b></label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a"><b>Description</b></label>
                        <input type="text" class="form-control" name="desc" placeholder="Description">
                      </div>
                    </div>

                    <input class="btn btn-info col-sm-4 p-3 btn-round" type='submit' value='Upload' name='but_upload'>

                    <button type="button" onclick="window.location.href='custom.php'" name="button" class="btn col-sm-4 p-3 btn-round btn-info">Back to Slide Manager</button><br><br>
                  </form>

                  <?php
                   if(isset($_POST['but_upload'])){

                    $title = $_REQUEST['title'];
                    $desc = $_REQUEST['desc'];
                   
                    $name = $_FILES['file']['name'];
                    $name1 = $_FILES['file1']['name'];
                    $name2 = $_FILES['file2']['name'];


                    // $target_dir = "upload/";
                    $target_dir = "upload/slider/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $target_file1 = $target_dir . basename($_FILES["file1"]["name"]);
                    $target_file2 = $target_dir . basename($_FILES["file2"]["name"]);


                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
                    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));


                    // Valid file extensions
                    $extensions_arr = array("jpg","jpeg","png","gif");

                    $viewquery = " SELECT * FROM slider_banner";
                    $viewresult = mysqli_query($con,$viewquery);

                    if(mysqli_num_rows($viewresult)>0){
                        echo '<script>alert("Slide Show Alrady Addedd. You can Only Change Image"); window.location.href="custom.php";</script>';
                    }else{

                        // Check extension
                        if( in_array($imageFileType,$extensions_arr) ){
                          if( in_array($imageFileType1,$extensions_arr) ){
                            if( in_array($imageFileType2,$extensions_arr) ){
                                if (!empty($title)) {


                       
                                   $query = "INSERT into slider_banner(slider_banner_01,slider_banner_02,slider_banner_03,title,description) values('".$name."','".$name1."','".$name2."','$title','$desc')";
                                   mysqli_query($con,$query);
                                
                                   // Upload file
                                   move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                                   move_uploaded_file($_FILES['file1']['tmp_name'],$target_dir.$name1);
                                   move_uploaded_file($_FILES['file2']['tmp_name'],$target_dir.$name2);

                                    echo '<script>alert("Slide Show Inserted Success"); window.location.href="custom.php";</script>';
                              }else{echo "<script>alert(\"Enter Title\");</script>";}
                            
                          }
                         }
                        }
                   
                    }
                  }
                    
                  ?>
        </div>
        
      </div>
      <footer class="footer footer-black  footer-white ">
        <?php include 'components/footer.php'; ?> 
      </footer>
    </div>
  </div>
</body>
</html>
