<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;

session_start();
$bookingId=$_SESSION['bookingId'];
$query = "UPDATE booking_tbl SET status=\"cancelled\" where booking_id =\"".$bookingId."\"" ;
       

            
mysqli_query($conn,$query);



// SQL query to select data from database
session_destroy();
header("location: booking.php")
?>