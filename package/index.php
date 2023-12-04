<!DOCTYPE html>
<html>

<head>
	<title>Add Packages</title>
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

<body >
    <div class="back-vid">
        <video src="vid-1st.mp4" loop autoplay muted></video>
    </div>
        <div class="content" >
            <!-- form for adding destinations -->
            <form  action="index.php" method="POST" enctype="multipart/form-data">
                
                <h1 style="text-align:center;align-items:center;">Add Packages</h1>
               
                <b>Enter destination name</b><br>
                <input type="text" name="destination" required ><br><br><br>
                <b>Enter title</b><br>
                <input type="text" name="title" required ><br><br><br>
                <b>price</b><br>
                <input type="int" name="price" required ><br><br><br>
                <b><label for="Logo_name">Upload thumbnail for packages</label></b><br>
                
                <input type="file" name="Logo_name" accept="image/*" required><br><br>
                <b>Add details</b><br>
                
                <textarea  rows="20" cols="90" name="details"></textarea>
                
                
                <input type="submit" name="submit" class="btn" value="UPLOAD">
                


            </form>
        </div>

    <?php
    
        if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            
             // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');
            
            //initializing variable with fetched value from form
            $title=$_POST['title'];
            $destination=$_POST['destination'];
            $Logo_name = $_FILES['Logo_name']['name'];
            $price=$_POST['price'];
            $details=$_POST['details'];
            $upload_dir = "uploads/";
            $path = $upload_dir.$Logo_name;       
           
            $query = "INSERT INTO package_tbl VALUES ('','$destination','$title','$price','$details','$Logo_name')";
            $run= mysqli_query($conn,$query);

            if($run){
                
            move_uploaded_file($_FILES["Logo_name"]["tmp_name"], $path);
                
           ?><b style="color:red;"><?php echo "Data inserted successfully"; ?> </b>
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