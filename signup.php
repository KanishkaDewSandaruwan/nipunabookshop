<?php
  require_once 'connection.php'; //insert connection to page
?>

<?php 

if (isset($_POST['submit'])) {

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['address'];
	$phone = $_REQUEST['Phone'];
	$nic = $_REQUEST['nic1'];
	$psaaword = $_REQUEST['pw'];
	$conpw = $_REQUEST['confirmpw'];

	$query2="SELECT * FROM customer WHERE email='$email'";
    $sql2=mysqli_query($con,$query2);

    $query3="SELECT * FROM customer WHERE phone='$phone'";
    $sql3=mysqli_query($con,$query3);

    $query4="SELECT * FROM customer WHERE nic='$nic'";
    $sql4=mysqli_query($con,$query4);

	if (empty($name)) {

		echo "<script>alert(\"Plese Enter Your Name.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($email)) {
		
		echo "<script>alert(\"Plese Enter Your Email.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($address)) {
		
		echo "<script>alert(\"Plese Enter Your address.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($phone)) {
		
		echo "<script>alert(\"Plese Enter Your Phone Number.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($nic)) {
		
		echo "<script>alert(\"Plese Enter Your NIC Number.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($psaaword)) {
		
		echo "<script>alert(\"Plese Enter New Password.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($conpw)) {
		
		echo "<script>alert(\"Plese confirm Your Password.\");window.location.href=\"index.php\";</script>";
	
	}
	elseif (!preg_match("/^([0]([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)) {

		echo "<script>alert(\"Plese Enter Valid Phone Number.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif ($psaaword!=$conpw) {
		
		echo "<script>alert(\"Password is Not Match.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (mysqli_num_rows($sql2)>0) {
	
		echo "<script>alert(\"Email already Exsisted.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (mysqli_num_rows($sql3)>0) {
		
		echo "<script>alert(\"Phone Number already Exsisted.\");window.location.href=\"index.php\";</script>";
	}
	elseif (mysqli_num_rows($sql4)>0) {
	
		echo "<script>alert(\"NIC Number already Exsisted.\");window.location.href=\"index.php\";</script>";
		
	}
	elseif (empty($_POST['checkbox'])) {
		echo '<script>alert("Plese Accept the Terms and Conditions.");window.location.href="index.php";</script>';
	}
	else {

	 	$q1="INSERT INTO customer(name,phone,email,address,password,nic) values('$name','$phone','$email','$address','".md5($psaaword)."','$nic')";
     	$res1=mysqli_query($con,$q1);

     	if ( $res1){
     		echo "<script>alert(\"congratulations! your registration was successful.\");window.location.href=\"index.php\";</script>";
		}
		else{
			echo "<script>alert(\"Ohh Snap! your registration Fail. Plese Try Again!.\");window.location.href=\"index.php\";</script>";
		}
 	}
}

 ?>