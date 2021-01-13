<?php

include "dbconn.php"; 

$book_id = $_GET['book_id']; 

$del = mysqli_query($db,"delete from books where book_id = '$book_id'"); 

if($del)
{
    mysqli_close($db); 
    header("location:records.php");
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>