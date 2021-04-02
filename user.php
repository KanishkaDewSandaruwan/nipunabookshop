<?php
	require_once 'connection.php'; //insert connection to page
	session_start();

	if(!isset($_SESSION['customer_id'])){
		header('location:index.php');
	}else{
		$id = $_SESSION['customer_id'];
		$viewquery = " SELECT * FROM customer where customer_id = '$id'";
        $viewresult = mysqli_query($con,$viewquery); 
        $row1 = mysqli_fetch_assoc($viewresult);

        if (!isset($row1['name'])) {
        	header('location:index.php');
        }
	}
?>