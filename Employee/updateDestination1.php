<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
$Destination=$_GET['Destination'];
session_start();
$_SESSION['Destination']=$Destination;




// SQL query to select data from database

header("location: updateDestination.php ")
?>