<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
$packageId=$_GET['packageId'];
$sql = " delete FROM  package_tbl where package_id =\"".$packageId."\"";
mysqli_query($conn,$sql);




// SQL query to select data from database

header("location: package.php ")
?>