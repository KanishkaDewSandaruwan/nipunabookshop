<?php 
  require_once 'connection.php'; //insert connection to page
  require_once 'admin.php'; //Check login 

  $delete_query = "DELETE FROM slider_banner";
  mysqli_query($con,$delete_query);
  header('location:custom.php'); 
 ?>