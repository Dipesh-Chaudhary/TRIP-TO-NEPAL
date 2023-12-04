<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
$bookingId=$_GET['bookingId'];

session_start();
$_SESSION['bookingId']=$bookingId;


// SQL query to select data from database

header("location: confirmbooking.php ")
?>