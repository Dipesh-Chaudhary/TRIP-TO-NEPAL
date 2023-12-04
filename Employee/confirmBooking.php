<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;

session_start();
$bookingId=$_SESSION['bookingId'];
echo $bookingId;
$query = "UPDATE booking_tbl SET status=\"confirmed\" where booking_id=\"".$bookingId."\"";
       

            
mysqli_query($conn,$query);


session_destroy();
header("location: booking.php");

?>