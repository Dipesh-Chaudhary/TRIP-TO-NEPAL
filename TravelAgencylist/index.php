<!DOCTYPE html>
<html>

<head>
	<title>Add Travel Agency </title>
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
            <form  action="index.php" method="POST" enctype="multipart/form-data">
                
                <h1>Add Travel Agency list</h1>
                <b>Enter name of the Travel agency</b><br>
                <input type="text" name="Name" required><br><br><br>
                
                <b><label for="Logo_name">Upload logo/photo of Travel agency</label></b><br>

                <input type="file" name="Logo_name"  required><br><br>
                <b>Enter the link of the travel agent</b><br>
                <input type="text" name="Link" required ><br><br>
                <b>Choose Rating</b><br>
                <input type="radio" name="Rating" value="1" >* 
                <input type="radio" name="Rating" value="2">**
                <input type="radio" name="Rating" value="3">***
                <input type="radio" name="Rating" value="4">****
                <input type="radio" name="Rating" value="5">*****<br><br><br>
                <b>Enter Cost in dollar<b><br>
                <input type="int" name="rates" required><br><br>
                <b>Enter Destination<b><br>
                <input type="text" name="Destination" required><br><br><br>
                <b><input type="submit" name="submit" class="btn" value="UPLOAD"></b>

            </form>
        </div>


        <?php
        if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');

            //initializing variable with fetched value from form
            $name=$_POST['Name'];
            $Logo_name = $_FILES['Logo_name']['name'];
            $Link=$_POST['Link'];
            $rating=$_POST['Rating'];
            $rates=$_POST['rates'];
            //defining path for the uploaded photos
            $upload_dir = "uploads/";
            $path = $upload_dir.$Logo_name;
            $Destination=$_POST['Destination'];

            $query = "INSERT INTO travel_agency_tbl VALUES ('$name','$Logo_name','$Link','$rating','$Destination','$rates')";
            $run= mysqli_query($conn,$query);

            if($run){
            
            // moving photos to that particular path
            move_uploaded_file($_FILES["Logo_name"]["tmp_name"], $path);
                
            ?>
            <b style="color:red;"><?php echo "Data inserted successfully"; ?> </b>
            <?php

                    }  
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