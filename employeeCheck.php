<?php
    if(isset($_POST['submit'])) {
        // Inialize session
        session_start();

        // Include database connection settings
        $conn = mysqli_connect('localhost','root','','trip_to_nepal');

        // Retrieve Email and password from database according to user's input
        $login = mysqli_query($conn,"SELECT * FROM employeeTbl WHERE (Email = '" . $_POST['Email']. "') and (pass = '" .$_POST['pass']. "')");




        // Check Email and password match
        if (mysqli_num_rows($login) == 1) {
            // Set Email session variable
            $_SESSION['Email'] = $_POST['Email'];
            // Jump to admin page
            header('Location: http://localhost/tour and travel website/Employee/index.php');
        }
        // credential didnot matched
        else {

            
            echo "<h2>Login credentials was not found in database </h2>  <a href=\"http://localhost/tour and travel website/index.html\">Back</a>";

        }
    }
    else
    {
        echo"plz click submit to continue";
    }
?>