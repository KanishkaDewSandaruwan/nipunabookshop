<?php 
  require_once 'connection.php'; //insert connection to page
  session_start();
  if(!isset($_SESSION['customer_id'])){
    header('location:index.php');
  }

if(isset($_REQUEST['customer_id']))
{
          $id = $_REQUEST['customer_id'];

          $querygetcode="SELECT * FROM customer where customer_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['customer_id'];
          $g=$result_row['email'];

          $cdate = date("Y/m/d m:H:s");

            $viewquery = " SELECT * FROM customer where email='".$g."'";
              $viewresult = mysqli_query($con,$viewquery);
              if ($row = mysqli_fetch_assoc($viewresult)) {

                $name = $row['name'];
                $cus_id = $row['customer_id'];
                $phone = $row['phone'];
                $email = $row['email'];


              $q1="INSERT INTO customer_backup(customer_id,name,phone,email,trn_date) values('$cus_id','$name','$phone','$email','$cdate')";
                $res1=mysqli_query($con,$q1);

                if ($res1) {


              $query1="DELETE FROM customer WHERE email='$g '";
                      mysqli_query($con,$query1);

                      header('location:customer.php');
                }
              }
}
else{
  header('location:dashboard.php'); 
} ?>