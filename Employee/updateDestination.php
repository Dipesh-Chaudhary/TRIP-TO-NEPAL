<!DOCTYPE html>
<html>

<head>
	<title>Places</title>
    <style>
     body {
        
        background-color: rgb(191, 165, 212);
        text-align: center;
        }
        input,textarea{
            
        align:center;
        background-color:lightblue;
        text-decoration:bold;
        margin-left:10px;
        margin-right:5px;
        }
        input:hover,textarea:hover{
        background-color:white;
        }
        input.btn{
            color:blue;
            border-radius:40px;      
            box-shadow: 4px 1px rgb(0, 195, 216);
        }
        
        div.content{
            border-radius:40px;      
            box-shadow: 10px 10px rgba(142, 195, 216,0.3);
            background-color:rgba(0,0,40,0.2);
            margin-bottom:15%;
            margin-right:20%;
            margin-left:20%;
            padding-left:3%;
        
            }
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
<script type="text/javascript" src="textEditor.js"></script>
                <script type="text/javascript">
                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                </script>

</head>

<body style="text-align:center">
    <div class="back-vid">
        <video src="vid-1st.mp4" loop autoplay muted></video>
        <div class="content">
            <!-- form for adding destinations -->
            <form  action="updateDestination.php" method="POST" enctype="multipart/form-data">
                
                <h1>Update Travel Places</h1>
                <b>Select Category type</b><br>
                <input type="radio" name="category" value="Religious" >Religious
                <input type="radio" name="category" value="CLIMBING">CLIMBING
                <input type="radio" name="category" value="TREKKING">TREKKING
                <input type="radio" name="category" value="ADVENTURE">ADVENTURE 
                <input type="radio" name="category" value="CAMPING">CAMPING
                <input type="radio" name="category" value="LAKES">LAKES
                <input type="radio" name="category" value="WILDLIFE">WILDLIFE
                <br><br><br>
                <b>Enter destination name</b><br>
                <input type="text" name="Destination" required ><br><br><br>
                <b><label for="front_name">Upload Front photo of destination</label></b><br>
                
                <input type="file" name="front_name" accept="image/*" required><br><br>
                
                <b>Enter blogs<b><br>
                
                <textarea name="blogs" textarea  rows="20" cols="90"name="description" ></textarea><br><br><br>
                <input type="submit" name="submit" class="btn" value="UPLOAD">

            </form>
        </div>

    <?php
        if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');
            session_start();
            $Destination1=$_SESSION['Destination'];
            //initializing variable with fetched value from form
            $category=$_POST['category'];
            $Destination=$_POST['Destination'];
            $front_name = $_FILES['front_name']['name'];
            $blogs=$_POST['blogs'];
            //defining path for the uploaded photos
            $upload_dir = "../categories/uploads/";
            $path = $upload_dir.$front_name;
            $query = "UPDATE categories_tbl SET Category_type=\"".$category."\",Destination=\"".$Destination."\",Front_photo_name=\"".$front_name."\",Blogs=\"".$blogs."\" WHERE Destination=\"".$Destination1."\"";
       

            
            $run= mysqli_query($conn,$query);

            if($run){
                
                // moving photos to that particular path
                move_uploaded_file($_FILES["front_name"]["tmp_name"], $path);
                
            ?><b style="color:red;"><?php echo "Data inserted successfully"; ?> </b>
            <?php
            
            }  
            header("location: destinations.php ");
        
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