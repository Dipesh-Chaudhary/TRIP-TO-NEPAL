<!DOCTYPE html>
<html>

<head>
	<title>FEED BACK page</title>
    <style>

        body {
        color:white;
        background-color: rgb(191, 165, 212);
        text-align: center;
        }
        input{
        background-color:lightblue;
        text-decoration:bold;
        }
        input:hover{
        background-color:white;
        }
        input.btn{
            color:blue;
            border-radius:40px;      
            box-shadow: 1px 1px rgb(142, 195, 216);
        }
        a{
            text-decoration: none;
            
            color:blue;
        }

       /* styling contents */
        div.content{
            border-radius:40px;      
            box-shadow: 10px 10px rgba(142, 195, 216,0.3);
            background-color:rgba(0,0,40,0.5);
            margin-bottom:15%;
            margin-right:20%;
            margin-left:20%;
        
        }
        /* styling background video */
        .back-vid video{
        position: fixed;
        top:0; left: 0;
        z-index: -1;
        height: 100%;
        width:100%;
        object-fit:cover;
        opacity:0.9;

        }
        </style>
</head>

<body style="text-align:center">
    <div class="back-vid">
        <video src="vid-1st.mp4" loop autoplay muted></video>
        <div class="content">
            <form  action="review.php" method="POST" enctype="multipart/form-data">
                
                <h1>RATE IT</h1>
                
                <input type="radio" name="rating" value="1" >* 
                <input type="radio" name="rating" value="2">**
                <input type="radio" name="rating" value="3">***
                <input type="radio" name="rating" value="4">****
                <input type="radio" name="rating" value="5">*****<br><br><br>
               

                <h1>ADD REVIEW</h1>
                <textarea  rows="20" cols="50" name="review">type here.....</textarea><br>
                <b><input type="submit" name="submit" class="btn" value="DONE"></b>

            </form>
        </div>


        <?php
        if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');
            session_start();
            //initializing variable with fetched value from form
            $userId=$_SESSION['userId'];
            $packageId=$_SESSION['packageId'];
            $rating=$_POST['rating'];
            $review=$_POST['review'];

            $query = "INSERT INTO review_tbl VALUES ('$userId','$packageId','$rating','$review')";
            $run= mysqli_query($conn,$query);
            
            echo "<a href=\" http://localhost/tour and travel website/index.html\" style =\"background-color: orange;border-radius:20px;padding:4px;text-decoration: none\"> GO home</a>";
            
 
        }
        ?>

    <script>
        // method modifies the current history entry, replacing it with the state object and URL passed in the method
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
    </div>
</body>
</html>