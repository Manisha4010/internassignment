<?php
$link = mysqli_connect("localhost", "root", "", "mysql books"); 
  
if($link === false){ 
    die("ERROR: Could not connect. " . mysqli_connect_error()); 
} 
  
$sql = "DELETE FROM books WHERE book_id=102"; 
if(mysqli_query($link, $sql)){ 
    echo "Record was deleted successfully."; 
}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($link); 
} 
mysqli_close($link); 

function function_alert($message) { 
echo "<script>alert('$message');</script>"; 
}
function_alert("are you sure you want to delete?"); 
?> 


