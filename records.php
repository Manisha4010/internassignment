<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Book Details</h2>

<table border="2">
  <tr>
    <td>Sr.No.</td>
    <td>Book Name</td>
    <td>author email</td>
    <td>Edit</td>
    
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from books"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['book_id']; ?></td>
    <td><?php echo $data['book_name']; ?></td>
    <td><?php echo $data['author_email']; ?></td>    
    <td><a href="edit1.php?book_id=<?php echo $data['book_id']; ?>">Edit</a></td>
    <td><a href="delete2.php?book_id=<?php echo $data['book_id']; ?>">Delete</a></td>
    
  </tr>	
<?php
}
?>
</table>

</body>
</html>