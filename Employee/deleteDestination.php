<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
$Destination=$_GET['Destination'];
$sql = " delete FROM  categories_tbl where Destination =\"".$Destination."\"";
mysqli_query($conn,$sql);




// SQL query to select data from database
$sql = " SELECT * FROM  categories_tbl";
$result = mysqli_query($conn,$sql);

header("location: destinations.php ")
?>