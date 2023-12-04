<html>
    <head>
        <form action="userCheck.php" method="POST">
            <h3>Hlo user</h3>
            <input type="email" name="Email" class="box" placeholder="enter your email">
            <input type="text" name="name" class="box" placeholder="enter your name">
            <input type="submit" name="submit" value="login now" class="btn">
        
        </form>
        </head>
        </html>
<?php
    if(isset($_POST['submit'])) {
        // Inialize session
        session_start();

        // Include database connection settings
        $conn = mysqli_connect('localhost','root','','trip_to_nepal');

        // Retrieve Email and password from database according to user's input
        $login = mysqli_query($conn,"SELECT * FROM booking_tbl WHERE (Email = '" . $_POST['Email']. "') and (name = '" .$_POST['name']. "')");




        // Check Email and password match
        if (mysqli_num_rows($login) == 1) {
            // Set Email session variable
            $_SESSION['Email'] = $_POST['Email'];
            $_SESSION['name'] = $_POST['name'];
            // Jump to admin page
            header('Location: http://localhost/tour and travel website/bookHistory.php');
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