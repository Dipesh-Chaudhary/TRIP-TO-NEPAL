 <!DOCTYPE html>
<html lang="en">

<head>
    <title>LISTS OF PLACES </title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
        background-color: linen;
        text-align: center;
        z-index:-1;
        }
        /* for blinking effect */
        blink {
        animation: 3s linear infinite condemned_blink_effect;
        }

        @keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }
        50% {
            visibility: hidden;
        }
        100% {
            visibility: visible;
        }
        }
        /* <!-- for background video --> */
        .back-vid video{
        position: fixed;
        top:0; left: 0;
        z-index: -1;
        height: 100%;
        width:100%;
        object-fit:cover;
        opacity:0.9;

        }

        h1.tittle,h1.search_tittle{
            
            top:1%;
            align:center;
            background-color:rgba(0,0,0,0.5);        
            padding:8px;
            border-radius:20px;
            box-shadow: 10px 10px lightblue;
            color:white;
            background-color:rgba(0,0,0,0.5);        
            padding:8px;
        
        }
        /* to make category type display on a fixed place  */
        h1.tittle{
            position:fixed;
            
        }
        /* styling image */
        img{
            border-radius:20px;
            box-shadow: 10px 10px lightblue;
            height:30%;
            width:35%;
            opacity:0.95;
            z-index:-2;
        }
        button{
        background-color: orange;
        border-radius:20px;
        padding:4px;
        text-decoration: none;
        opacity:0.95;
        }
        /* styling for imag when hover and when buttons are clicked */
        img:hover,button:active{
            background-color: white;
            opacity:1;
            width:40%;
            height:70%;
            

        }

    </style>
</head>

<body>
    <div class="back-vid">
         <!-- for background video -->
        <video src="vid-1st.mp4" id="video-slider" loop autoplay muted></video>

        <?php
            // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');
            // different queries depeding upon categories type
            if(isset($_POST['RELIGIOUS'])) {
                $query ="select * from categories_tbl where Category_type	=\"RELIGIOUS\"";
                echo "<h1 class=\"tittle\"> RELIGIOUS</h1>";
            }
            else if(isset($_POST['CLIMBING'])) {
                $query ="select * from categories_tbl where Category_type	=\"CLIMBING\"";
                echo "<h1 class=\"tittle\"> CLIMBING</h1>";
            }
            else if(isset($_POST['TREKKING'])) {
                $query ="select * from categories_tbl where Category_type	=\"TREKKING\"";
                echo "<h1 class=\"tittle\">TREKKING</h1>";

            }
            else if(isset($_POST['ADVENTURE'])) {
                $query ="select * from categories_tbl where Category_type	=\"ADVENTURE\"";
                echo "<h1 class=\"tittle\"> ADVENTURE</h1>";
            }
            else if(isset($_POST['CAMPING'])) {
                $query ="select * from categories_tbl where Category_type	=\"CAMPING\"";
                echo "<h1 class=\"tittle\"> CAMPING</h1>";
            }
            else if(isset($_POST['LAKES'])) {
                $query ="select * from categories_tbl where Category_type	=\"LAKES\"";
                echo "<h1 class=\"tittle\"> LAKES</h1>";
            }
            else if(isset($_POST['WILDLIFE'])) {
                $query ="select * from categories_tbl where Category_type	=\"WILDLIFE\"";
                echo "<h1 class=\"tittle\"> WILDLIFE</h1>";
            }
            // if search button is pressed without search key
            elseif(($_POST['Destination'])==null){
            
                $query="select * from categories_tbl where Destination	=null";
                echo "<h1 class=\"search_tittle\"> please enter any valid search key</h1>";

            }
            // queries according to search key
            elseif(isset($_POST['qsearch'])){
                $search_key=$_POST['Destination'];
                $query="select * from categories_tbl where Destination	REGEXP '".$search_key."+' or blogs  REGEXP '".$search_key."+' or category_type REGEXP '".$search_key."+'";
                echo "<h1 class=\"search_tittle\"> Search results for\"".$search_key."\"</h1>";
            }
            // gets to home page if no category chosen
            else {
                echo "Choose a category";
                header('Location: http://localhost/tour and travel website/index.html');
            }

                $run = mysqli_query($conn,$query);
                if (mysqli_num_rows($run) > 0){

                    // from for clicking button to see lists of travel agents
                   echo"<form action=\"http://localhost/tour and travel website/package/package_list.php\"  method=\"POST\" enctype=\"multipart/form-data\">";
                    $Destination="";

                    // displaying all the details of destinations
                    while($row = mysqli_fetch_array($run)) {
                        
                        // displaying photos of destinations
                        echo "<div><img src=\"uploads/$row[Front_photo_name]\"  height='40%' width='40%' frameborder='0' alt=\"Unable to see photo\" ></div>";
                    
                        $Destination=$row["Destination"];
                        echo "<b><h1 style=\"color:brown\">".$Destination."</h1></b>";
                        
                        
                        echo "<i><h4 > ".$row["Blogs"]."</h3></i>";
                        echo"
                        <p>please click on the dot to select whose package you want to see</p><input type=\"radio\" name=\"destination\" value=\"".$Destination."\" ><br>

                        <button type=\"submit\" name=\"submit1\" class=\"btn\" formaction=\"http://localhost/tour and travel website/package/package_list.php\">See packages..</button>
                        ";
                        echo"<br>";
                        echo"<br>";
                        echo"<br>";
                        echo"<br><div style=\"width:100%;height:2px;background-color:antiquewhite;\"></div>";

                        //for dummy value of sort by when having first fetching of travel
                        echo"<input type=\"radio\" style =\"display :none\" name=\"SORT_BY\" value=\"1\" checked><br>";

                        
                    }
                    echo "</form>";
                
                }
                
                // if no destination is found on particular category type or the searched key
                else {
                echo "<h3 style=\"color:red\"><i>No resul found</i></h3> <br>";
            }
            echo "<a href=\" http://localhost/tour and travel website/index.html\" style =\"background-color: orange;border-radius:20px;padding:4px;text-decoration: none\"> GO BACK</a>";

            mysqli_close($conn);
    ?>
    </div>
</body>
</html>
 
 

 