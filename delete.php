<?php
require_once 'connection.php';

if(isset($_REQUEST['author_id']))
{
          $id = $_REQUEST['author_id'];

          $querygetcode="SELECT  * FROM author where author_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['author_id'];

          $querygetcode1="SELECT  * FROM books where author_id='".$a."'";
          $catresult1=mysqli_query($con,$querygetcode1);

          while($row=mysqli_fetch_assoc($catresult1)){

          $book_name = $row['book_title'];
          $description = $row['description'];
          $image = $row['image'];
          $book_id = $row['book_id'];


          $q1="INSERT INTO books_backup(book_title,description,image,book_id) values('$book_name','$description','$image','$book_id')";
          $res1=mysqli_query($con,$q1);

                if ($res1) {

                  $query1="DELETE FROM books WHERE book_id='$book_id'";
                  mysqli_query($con,$query1);

                }
            
          }

          $query1="DELETE FROM author WHERE author_id='$a '";
          mysqli_query($con,$query1);

          header('location:author.php');
}
else if(isset($_REQUEST['cat_id']))
{
          $id = $_REQUEST['cat_id'];

          $querygetcode="SELECT  * FROM book_cat where cat_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['cat_id'];

          $querygetcode1="SELECT  * FROM books where cat_id='".$a."'";
          $catresult1=mysqli_query($con,$querygetcode1);

          while($row=mysqli_fetch_assoc($catresult1)){

          $book_name = $row['book_title'];
          $description = $row['description'];
          $image = $row['image'];
          $book_id = $row['book_id'];


          $q1="INSERT INTO books_backup(book_title,description,image,book_id) values('$book_name','$description','$image','$book_id')";
          $res1=mysqli_query($con,$q1);

                if ($res1) {

                  $query1="DELETE FROM books WHERE book_id='$book_id'";
                  mysqli_query($con,$query1);

                }
            
          }
                  $query1="DELETE FROM book_cat WHERE cat_id='$a '";
                  mysqli_query($con,$query1);
                  header('location:cat.php');

}  else if(isset($_REQUEST['book_id'])){
          $id = $_REQUEST['book_id'];

          $querygetcode="SELECT  * FROM books where book_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['book_id'];

          $book_name = $result_row['book_title'];
          $description = $result_row['description'];
          $image = $result_row['image'];
          $book_id = $result_row['book_id'];


          $q1="INSERT INTO books_backup(book_title,description,image,book_id) values('$book_name','$description','$image','$book_id')";
          $res1=mysqli_query($con,$q1);

          if ($res1) {
            $query1="DELETE FROM books WHERE book_id='$a '";
            mysqli_query($con,$query1);

            header('location:books.php');
          }
}
else if(isset($_REQUEST['editor_id']))
{
          $id = $_REQUEST['editor_id'];

          $querygetcode="SELECT  * FROM editor where editor_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['editor_id'];

          $query1="DELETE FROM editor WHERE editor_id='$a '";
          mysqli_query($con,$query1);
          header('location:worker.php'); 
}else{
  header('location:dashboard.php'); 
}
?>