<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
          <li class="active">
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
        <div class="row p-3 ">
  <div class="col-md-12">
    <?php   
                  $count = 0;
                  
                  $viewquery = " SELECT * FROM bookorder order by trn_date desc";
                  $viewresult = mysqli_query($con,$viewquery);

                  while($row1 = mysqli_fetch_assoc($viewresult)) { ?>

                  <div class="row" style="padding: 2%;  margin: 1%; color: #00394e; background-color: #f9f6f7">

                    <div class="dropdown-divider"></div>
                    <div class="col-sm-3 justify-content-left">
                      <?php   
                        $dlist = $row1['book_ids'];

                         $stri = explode(',', $dlist);
                         $count = 0;
                         // $arrlength=strlen($stri);


                      foreach ($stri as $s){

                          $getDetail_Query = "SELECT * FROM books where book_id ='".$s."' ";
                          $getResult = mysqli_query($con,$getDetail_Query);

                          $getDetail_Query1 = "SELECT * FROM books_backup where book_id ='".$s."' ";
                          $getResult1 = mysqli_query($con,$getDetail_Query1);

                          if($row4 = mysqli_fetch_assoc($getResult)){ 
                          $image = $row4['image'];
                          $image_src = "upload/book/".$image;

                          ?>
                          <div class="row">
                            <div class="col-md-6">
                              <p><?php echo $row4['book_title']; ?></p>
                            </div>
                            <div class="col-md-6 mt-3">
                              <img width="100%" src="<?php echo $image_src; ?>" >
                            </div>
                          </div>

                        <?php }else if($row5 = mysqli_fetch_assoc($getResult1)){
                          $image = $row5['image'];
                          $image_src = "upload/book/".$image;

                          ?>
                          <div class="row">
                            <div class="col-md-6">
                              <p><?php echo $row5['book_title']; ?></p>
                            </div>
                            <div class="col-md-6 mt-3">
                              <img width="100%" src="<?php echo $image_src; ?>" >
                            </div>
                            
                          </div>
                        <?php } ?>
                           
                      <?php   $count++; }?>
                    </div>
                    <div class="col-sm-1">
                      <p>Rs. <?php echo $row1['amount']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <p><?php echo $row1['payment_type']; ?></p>
                    </div>
                    <div class="col-sm-2">
                      <p><?php echo $row1['address']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <p style="color: red">Accepting Order</p>
                      <p><?php echo $row1['accept']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <p style="color: red">Shipping Order</p>
                      <p><?php echo $row1['shipped']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <p style="color: red">Delivering Order</p>
                      <p><?php echo $row1['deliver']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <p style="color: red">Payments Order</p>
                      <p><?php echo $row1['paid']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <p><?php echo $row1['trn_date']; ?></p>
                    </div>
                    <div class="col-sm-1">
                      <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Change
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="manageorder.php?accept=<?php echo $row1['order_id'];?>">Accept Order</a>
                              <a class="dropdown-item" href="manageorder.php?acceptshiped=<?php echo $row1['order_id']; ?>">Accept & Shipp Order</a>
                              <a class="dropdown-item" href="manageorder.php?shiped=<?php echo $row1['order_id']; ?>">Shipped Order</a>
                              <a class="dropdown-item" href="manageorder.php?diliverd=<?php echo $row1['order_id']; ?>">Diliver Order</a>
                              <a class="dropdown-item" href="manageorder.php?paided=<?php echo $row1['order_id']; ?>">Complete Order</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="manageorder.php?reject=<?php echo $row1['order_id']; ?>">Reject Order</a>
                              <a class="dropdown-item" href="manageorder.php?deletecomplete=<?php echo $row1['order_id']; ?>">Delete Order</a>
                            </div>
                          </div>
                    </div>

                  </div>
                  
                  <?php  $count++;
                    
                  
                }
             ?>

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
