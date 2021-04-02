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
          <li class="active">
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
              <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Edit Book</a></h1>
            </div>
            <div class="row">
              <form class="reg_form bg-light p-4 border-round" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="title" class="a"><b>Book Title</b></label>
                        <input type="text" class="form-control" name="title" placeholder="Book Title">
                      </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="price"><b>Price</b></label>
                      <input type="text" class="form-control"  name="price" placeholder="Price">
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="price"><b>Speacial Price</b></label>
                      <input type="text" class="form-control"  name="spcprice" placeholder="Speacial Price">
                      <p class="text-danger">Optional..</p>
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="desc"><b>Description </b></label>
                      <input type="text" class="form-control" name="desc" placeholder="Description ">
                    </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputState"><b>Author</b></label>
                        <select id="inputState" name="author" class="form-control">
                          <option selected></option>
                          ';
                          <?php 
                          $q3 = "SELECT * FROM author";
                          $res3 = mysqli_query($con,$q3);
                          $c=1;
                          while($row=mysqli_fetch_assoc($res3)){
                            echo "<option>".$row['author_name']."</option>";
                            $c++;
                          }
                          ?>
                        </select>
                      </div>
                      </div>

                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputState"><b>Categories</b></label>
                        <select id="inputState" name="cat" class="form-control">
                          <option selected></option>';
                         <?php 
                             $q3 = "SELECT * FROM book_cat";
                             $res3 = mysqli_query($con,$q3);
                             $c=1;
                             while($row=mysqli_fetch_assoc($res3)){
                               echo "<option>".$row['cat_name']."</option>";
                               $c++;
                             }
                         ?>
                        </select>
                      </div>
                      </div>

                    <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="phone"><b>Quantity</b></label>
                        <input type="text" style="text-transform: uppercase;" class="form-control" name="qnt" placeholder="Quantity">
                    </div>
                    </div>

                    <br>
                    Select Foods Front image to upload:<br>
                        <input type="file" name="file" /><br><br>
                </div>
                  <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                    <?php 
                    if(isset($_POST['submit'])){
                        $title = $_REQUEST['title'];
                        $price = $_REQUEST['price'];
                        $desc = $_REQUEST['desc'];
                        $author = $_REQUEST['author'];
                        $cat = $_REQUEST['cat'];
                        $qnt = $_REQUEST['qnt'];
                        $cdate = date("Y/m/d");

                        $spcprice = $_REQUEST['spcprice'];

                        $id = $_REQUEST['book_id'];

                        $q4 = "SELECT * FROM author WHERE author_name='$author'";
                        $res4 = mysqli_query($con,$q4);
                        $row2 = mysqli_fetch_assoc($res4);
                        $author_id = $row2['author_id'];

                        $q4 = "SELECT * FROM book_cat WHERE cat_name='$cat'";
                        $res4 = mysqli_query($con,$q4);
                        $row2 = mysqli_fetch_assoc($res4);
                        $cat_id = $row2['cat_id'];
    

                        
                        $name = $_FILES['file']['name'];
                        $target_dir = "upload/book/";
                        $target_file = $target_dir . basename($_FILES["file"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $extensions_arr = array("jpg","jpeg","png","gif");

                        if(!empty($title))
                        {
                          $query3="UPDATE books SET book_title='$title' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if(!empty($price))
                        {
                          $query3="UPDATE books SET book_price='$price' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if(!empty($desc))
                        {
                          $query3="UPDATE books SET description='$desc' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if(!empty($author))
                        {
                          $query3="UPDATE books SET author_id='$author_id' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if(!empty($cat))
                        {
                          $query3="UPDATE books SET cat_id='$cat_id' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if(!empty($qnt))
                        {
                          $query3="UPDATE books SET qnt='$qnt' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if(!empty($spcprice))
                        {
                          $query3="UPDATE books SET spc_price='$spcprice' WHERE book_id='".$id."'";
                          $sql3=mysqli_query($con,$query3);
                          echo "<script type=\"text/javascript\"> alert(\"Update Succussfully\"); window.location= \"books.php\";</script>";
                        }

                        if( in_array($imageFileType,$extensions_arr) ){
                          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                          $query="UPDATE books SET image='$name' where book_id='".$id."'";
                          mysqli_query($con,$query);
                          echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"books.php\";</script>";
                      }
    
            
    
                             
                            
                }
                ?>
                  </div>
                </form>
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
