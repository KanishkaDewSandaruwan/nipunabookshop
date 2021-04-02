<?php
  require_once 'connection.php'; //insert connection to page
  session_start();
  
	if(isset($_POST['submit'])) {

		$email = stripslashes($_REQUEST['email']);
		$password = stripslashes($_REQUEST['password']);

		$signin = "SELECT * FROM customer WHERE email ='$email' AND password ='".md5($password)."'";
		$result3 = mysqli_query($con,$signin) or mysqli_errno();
		$rows4 = mysqli_num_rows($result3);
		
		if($rows4==1){
			if ($row1 = mysqli_fetch_assoc($result3)) {

				$id = $row1['customer_id'];
				$_SESSION['customer_id']=$id;
				echo "<script type=\"text/javascript\">window.location.href='index.php'; </script>";
			}
		}
		else{

			echo "<script>alert(\"Username or Password is incorrect.\");window.location.href=\"index.php\";</script>";
		}
	}

 ?>