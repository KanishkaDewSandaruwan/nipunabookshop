<?php 
	require_once 'connection.php'; //insert connection to page
	require_once 'user.php'; //insert connection to page
	
	$id = $_REQUEST['book_id'];
	$getID = $_SESSION['customer_id'];
	$cdate = date("Y/m/d m:H:s");

	echo $getID;
	$getDetail_Query = "SELECT * FROM books where book_id= '".$id."'";
	$getResult = mysqli_query($con,$getDetail_Query);

	$getCustomerDetail_Query = "SELECT * FROM customer where customer_id='".$getID."'";
	$getResult_Customer = mysqli_query($con,$getCustomerDetail_Query);

	$getCartDetail_Query = "SELECT * FROM cart where book_id= '".$id."'AND customer_id='".$getID."'";
	$getResult_Cart = mysqli_query($con,$getCartDetail_Query);

	if(mysqli_num_rows($getResult_Cart)>0){
	      echo "<script type=\"text/javascript\"> alert(\"This Book Alrady in Cart\"); window.location= \"index.php\";</script>";
	}else{
		if ($row = mysqli_fetch_assoc($getResult)) { 
			$price = $row['spc_price'];
			$book_id = $row['book_id'];
			if ($row1 = mysqli_fetch_assoc($getResult_Customer)) {

				$qnty = '1';
				$q1="INSERT INTO cart(book_id,customer_id,price,qty,trn_date) values('$book_id','$getID','$price','$qnty','$cdate')";
                $res1=mysqli_query($con,$q1);

                if ($res1) {
                	echo "<script type=\"text/javascript\"> alert(\"Book Added to Cart\"); window.location= \"index.php\";</script>";
                }else{
                	echo "<script type=\"text/javascript\"> alert(\"Cart Adding Fail\"); window.location= \"index.php\";</script>";
                }
			
			}
		}
	}
 ?>