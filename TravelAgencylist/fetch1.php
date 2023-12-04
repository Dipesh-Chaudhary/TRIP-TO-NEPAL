<?php 
include 'fetch.php';
$conn1= mysqli_connect('localhost','root','','trip_to_nepal');
        
$query2="insert into review_details VALUES
('".$_POST["Email"]."','".$_POST["review"]." ',' ".$_POST["Name"]." ' )";
$run2 = mysqli_query($conn1,$query2);


// $sql="insert into tbl_ind(firstName,secondName,address) values
// ('".$fname."', '".$lname."','".$address."')";

?>