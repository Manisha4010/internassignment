<?php

include "dbConn.php"; // Using database connection file here

$book_id = $_GET['book_id']; // get id through query string

$qry = mysqli_query($db,"select * from books where book_id='$book_id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $book_name = $_POST['book_name'];
    $author_email = $_POST['author_email'];
	
    $edit = mysqli_query($db,"update books set book_name='$book_name', author_email='$author_email' where book_id='$book_id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:records.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="book_name" value="<?php echo $data['book_name'] ?>" placeholder="Enter book Name" Required>
  <input type="text" name="author_email" value="<?php echo $data['author_email'] ?>" placeholder="Enter email" Required>
  <input type="submit" name="update" value="Update">
</form>