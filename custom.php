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
          <div class="col-md-10">
            <a href="slider_manager.php" style="text-decoration: none;"><h1 class="text-danger"> Slider Manager </h1></a>
            <h4 class="form_title"> Slider Banner size is 1080 X 600</h4><br>

            <button type="submit" onclick="window.location.href='slideAdd.php'" name="button" class="btn col-xl-4 p-3 btn-info" style="border-radius:20px; float:left;">Add Slider</button>

            <button type="submit" onclick="window.location.href='changeSlide.php'" name="button" class="btn col-xl-4  p-3 btn-info" style="border-radius:20px;float:left;">Edit Slider Images</button>

            <button type="submit" onclick="window.location.href='remove_image.php'" name="button" class="btn col-xl-4 p-3 btn-info" style="border-radius:20px; float:left;">Remove Slider</button>

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
