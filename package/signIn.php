<?php
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Include database connection settings
    $conn = mysqli_connect('localhost','root','','trip_to_nepal');
    $packageId=$_POST['packageId'];
    //initializing variable with fetched value from form
    $name=$_POST['user_name'];
   
    $phnNmbr=$_POST['phnNmbr'];
    $email=$_POST['email'];
 
    $pass=$_POST['pass'];
    session_start();
    $_SESSION['packageId']=$_POST['packageId'];

    $query = "INSERT INTO user_tbl VALUES ('','$name','$email','$pass','$phnNmbr')";
    $run= mysqli_query($conn,$query);
    $d=mysqli_query($conn,"SELECT * FROM user_tbl WHERE (email = '" . $_POST['email']. "') and (password = '" .$_POST['pass']. "')");
    while($row = mysqli_fetch_array($d)) {
        $_SESSION['userId']=$row['user_id'];
    }
    
   header('location:http://localhost/tour and travel website/package/review.php');
       
}
    ?>
 