
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    body {
      background-color: linen;
      text-align: center;
    }
    /* for blinking effect */
    blink {
      animation: 2s linear infinite condemned_blink_effect;
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
    div.logo,div.sort{
      position:fixed;
      align:center;
        
        color:white;
        background-color:rgba(0,0,0,0.5);
      
        padding:8px;
        border-radius:20px;
        box-shadow: 10px 10px lightblue;
        
      
    }
    div.sort{
      margin-left:80%;
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
    a:hover{
      text-decoration: underline;
      color:red;
    }
    h1{
      color: maroon;
    
    }
    /* styling image */
    img{
        border-radius:40px;
        box-shadow: 10px 10px lightblue;
        margin-right:10%;
        margin-left:10%;
        height:30%;
        width:35%;
        opacity:0.95;
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
        width:40%;
        height:70%;
        z-index=1000;

    }
    div.review_form,#review_content{
      background-color:rgba(255,255,255,0.8);
    }

  </style>

  <title>TRAVEL AGENTS LISTS </title>

</head>

<body class="center">
  
  <div class="back-vid">
    <!-- for background video -->
    <video src="vid-1st.mp4" id="video-slider" loop autoplay muted></video>
    <form action="#" method="post">

      <div class="logo">
         <span>Travel agencies<</span><i class="fas fa-plane"></i>
      </div>

      <div class ="sort">
        <label for="SORT_BY"><h2>SORT BY</h2></label>
        <select name="SORT_BY" id="SORT_BY">
        <option value="1" >RATINGS</option>
        <option value="2">LOWEST PRICE</option>
        <option value="3" >HIGHEST PRICE</option>

        </select>
        <!-- for sending destination name to the php every time it shorts -->
        <input type="radio" style ="display :none" name="Destination" value="<?php echo $_POST['Destination']?>" checked><br>
        <button id="submit">Get the Selected Value</button>
      </div>
    </form>
    <?php
        
        $Destination =$_POST['Destination'] ;
        // Include database connection settings
        $conn = mysqli_connect('localhost','root','','trip_to_nepal');
        
        $query ="select * from travel_agency_tbl  where Destination = \"$Destination\" order by Rating desc";
       
        
        // queries for sorting
        $choose = $_POST['SORT_BY'];

        if($choose==1){
            $query ="select * from travel_agency_tbl  where Destination=\"$Destination\" order by Rating desc"; 
            echo"<h1>Lists sorted by Ratings </h1>";
        }
        elseif($choose==2){
            $query ="select * from travel_agency_tbl   where Destination=\"$Destination\" order by Rates asc"; 
            echo"<h1>Lists sorted by lower rates </h1>";
        }
        elseif($choose==3){
            $query = "select * from travel_agency_tbl   where Destination=\"$Destination\" order by Rates desc";  
            echo"<h1>Lists sorted by Higher rates </h1>";
        }

        $run = mysqli_query($conn,$query);
        
       $i=0;
        if (mysqli_num_rows($run,) > 0){

             // displaying all the details of travel agents 
            while($row = mysqli_fetch_array($run,MYSQLI_ASSOC)) {
              

              // displaying logos of travelagents
              echo "
                <div style=\"width:100%;height:7px;background-color:antiquewhite;\"></div>
             
                <img src=\"uploads/$row[Logo_name]\"   frameborder='0' alt=\"Unable to see photo\">";

              echo"<br>";

              echo "<h2 style=\"color:white;\">RATING OUT OF 5:- </h2>";
              // for printing ratings in the star symbol
              for ($x = 0; $x <$row["Rating"] ; $x++) {
                  echo "<span style=\"color:white; font-size: 300%\">  *  </span>";
              }
              
              echo"<h2 style=\"color:white;\">RATES in us dollar:-  ".$row["Rates"]."</h2> ";
              echo"<blink><h3 style=\"color:red;\">↓↓Click on the link to visit their website↓↓</h3></blink>";
              echo "   <a style =\"background-color: orange;text-decoration: none;border-radius:20px; padding:4px;\" href=\"$row[Link]\">".$row["Name"]."</a>";
              echo"<br>";
              echo"<br>";
              


              // to add review feature
              // echo"
              

              //   <div class=\"review_form\">
              //       <form  action=\"fetch1.php\" method=\"POST\" enctype=\"multipart/form-data\">
              //       <label style=\"font-size:30px;\" >Enter your email </label>
              //       <input type=\"email\" name=\"Email\" ><br><br>
              //       <label style=\"font-size:30px;\" >Add review  </label>
              //       <textarea name=\"review\" ></textarea><br>
              //       <input type=\"submit\" name=\"submit\" class=\"btn\" value=\"ADD\">

              //       <input type=\"radio\" style =\"display :none\" name=\"Destination\" value=\"$Destination\" checked><br>
              //       <input type=\"radio\" style =\"display :none\" name=\"SORT_BY\" value=\"1\" checked>
              //       <input type=\"radio\" style =\"display :none\" name=\"Name\" value=\"".$row["Name"]."\" checked>
              //       </form>
              //   </div>  
                              
              // ";
              
             
              // $query1 ="select * from review_details  where Name = \"".$row["Name"]."\" ";
              
              // $run1 = mysqli_query($conn,$query1);
             
              // if (mysqli_num_rows($run1) > 0){

                
              //   while($row1 = mysqli_fetch_array($run1)) {

              //     echo "<div id=\"review_content\">".$row1['Email'];
              //     echo $row1['review_content']."</div>";

              //   }
              // }
              // else{
              //   echo "<div id=\"review_content\">No reviews added yet</div>";
              // }

              
              // for partitioning white line
              echo"<br>
              <div style=\"width:100%;height:2px;background-color:antiquewhite;\"></div>";
              echo"<br>";
                  
            }

        }
        
        // if no travel agents found for that destinations
        else {

          echo "<h5 style=\"color:red\">No travel agents found for this destination</h5>";
              
        }

        echo "<a href=\" http://localhost/tour and travel website/index.html\" style =\"background-color: orange;border-radius:20px;padding:4px;text-decoration: none\"> HOME</a>";

        mysqli_close($conn);
      ?>
  </div>
</body>
</html>
 
 

 