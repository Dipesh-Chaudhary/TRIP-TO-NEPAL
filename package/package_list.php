<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>package lists</title>

   

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <style>.box-container{
  display: flex;
  flex-wrap: wrap;
  gap:1.5rem;
}

.box-container .box{
  overflow: hidden;
  box-shadow: 0 1rem 2rem rgba(0,0,0,.1);
  border:1rem solid #fff;
  border-radius: .5rem;
  flex:1 1 30rem;
  height: 25rem;
  position: relative;
}

.box-container .box img{
  height: 100%;
  width:100%;
  object-fit: cover;
}

/* to style content of the category which is initially hidden */
.box-container .box .content{
  position: absolute;
  top:-100%; left:0;
  height: 100%;
  width:100%;
  text-align: center;
  background:rgba(0,0,0,.7);
  padding:2rem;
  padding-top: 5rem;
}

.box-container .box .content h3{
  font-size: 2.5rem;
  color:var(--blue);
}

.box-container .box .content p{
  font-size: 1.5rem;
  color:#eee;
  padding:.5rem 0;
}

/* to show up the content of category while hovering*/
.box-container .box:hover .content{
  top:0;
}
</style>

</head>
<body>
    


    <!-- for background video -->
    <div class="back-vid">
        <video src="vid-1st.mp4" id="video-slider" loop autoplay muted></video>
            






        <h1 class="heading">
            <span>P</span>
            <span>A</span>
            <span>C</span>
            <span>K</span>
            <span>A</span>
            <span>G</span>
            <span>E</span>
            <span>S</span>
        </h1>
        <?php
            // Include database connection settings
            $conn = mysqli_connect('localhost','root','','trip_to_nepal');
            $destination="";
            $destination=$_POST["destination"];

            

            $query ="select * from package_tbl where destination = \"".$destination."\"";
            $run = mysqli_query($conn,$query);
            if (mysqli_num_rows($run) > 0){
                echo"<form action=\"http://localhost/tour and travel website/package/fetch.php\"  method=\"POST\" enctype=\"multipart/form-data\">";
                while($row = mysqli_fetch_array($run)) {

                    $package_id=$row["package_id"];
                    $query2 = "select *from  review_tbl where package_id=\"".$package_id."\"";
                      $run2 = mysqli_query($conn,$query2);
                      $row2 = mysqli_fetch_array($run2);
                    $query3 = "select AVG(rating)from  review_tbl where package_id=\"".$package_id."\"";
                    $run3 = mysqli_query($conn,$query3);
                    $row3 = mysqli_fetch_array($run3);
                    echo" 
                
                        <div class=\"box-container\">

                            <div class=\"box\">
                            <img src=\"uploads/$row[Logo_name]\"   frameborder='0' alt=\"Unable to see photo\">
                                <div class=\"content\">
                                   
                                    <h2 style=\"color:white;\">".$row["title"]."<br>
                                    <i class=\"fa fa-tag\" aria-hidden=\"true\">".$row['price']."</i><br></h2>
                                    <h2 style=\"color:white;\"> (".mysqli_num_rows($run2).")rating :  ".$row3[0]."</h2>
                                    

                                    <button type=\"submit\" name=\"destination\" class=\"btn\" formaction=\"http://localhost/tour and travel website/package/fetch.php\"><input type=\"radio\" name=\"packageId\" value=\"".$package_id."\"  >see more</button>
                                </div>
                            </div>
                        

                            

                        </div>
                      
                        ";
                                    }
                        echo"</form>";
                                   
                    }
                    echo "<a href=\" http://localhost/tour and travel website/index.html\" style =\"background-color: orange;border-radius:20px;padding:4px;text-decoration: none\"> GO home</a>";

            mysqli_close($conn);
        ?>


    <div style="width:100%;height:2px;background-color:antiquewhite;"></div>




    <!-- custom js file link  -->
    <script src="script.js"></script>

</body> 
</html>
