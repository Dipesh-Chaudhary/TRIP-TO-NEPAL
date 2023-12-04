<?php

    if(isset($_POST['submit'])) {
        // Inialize session
        session_start();

        // Include database connection settings
        $conn = mysqli_connect('localhost','root','','trip_to_nepal');
        
        // Retrieve email and password from database according to user's input
        $login = mysqli_query($conn,"SELECT * FROM user_tbl WHERE (email = '" . $_POST['email']. "') and (password = '" .$_POST['pass']. "')");
        
        


        // Check email and password match
        if (mysqli_num_rows($login) == 1) {
            // Set email session variable
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['packageId']=$_POST['packageId'];
            while($row = mysqli_fetch_array($login)) {
                $_SESSION['userId']=$row['user_id'];
            }

            // Jump to review page
            header("Location: http://localhost/tour and travel website/package/review.php");
        }
        // credential didnot matched
        else {

            
            echo "<h2>Login credentials was not found in database </h2>  <a href=\"http://localhost/tour and travel website/index.html\">   HOME</a>";

        }
    }

?>