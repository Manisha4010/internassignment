<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql books";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE books SET author_email='Doe@gmail.com' WHERE book_id=101";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>