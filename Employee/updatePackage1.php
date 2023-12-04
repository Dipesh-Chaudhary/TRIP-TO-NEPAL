<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
$packageId=$_GET['packageId'];
session_start();
$_SESSION['packageId']=$packageId;




// SQL query to select data from database

header("location: updatePackage.php ")
?>