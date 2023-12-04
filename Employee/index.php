
<!DOCTYPE html>
<html>
    <head>
        <style>

        body {
          color:rgb(121, 173, 207);
          background-color: rgb(191, 165, 212);
          text-align: center;
        }
        a{
            text-decoration: none;
            
            color:blue;
        }
        a:hover{
            width:120%;
            text-decoration: underline;
            color:red;
        }
      
        div.content{
            border-radius:40px;      
            box-shadow: 10px 10px rgba(142, 195, 216,0.5);
            background-color:rgba(0,0,40,0.7);
            margin-bottom:15%;
            margin-right:20%;
            margin-left:20%;
        
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
    </head>
    <body>
        <div class="back-vid">
            <video src="vid-1st.mp4" loop autoplay muted></video>
        <div class="content">
            <h1>ADMIN PAGE</h1><br><br><br><br>
            <h3><a href="http://localhost/tour and travel website/package/index.php">ADD PACKAGES</a></h3>
            <h3><a href="http://localhost/tour and travel website/employee/package.php"> MANAGE PACKAGESs</a></h3>
            <h3><a href="http://localhost/tour and travel website/categories/index.php">ADD PLACES</a></h3>
            <h3><a href="http://localhost/tour and travel website/employee/destinations.php">MANAGE DESTINATIONS</a></h3>
            <h3><a href="http://localhost/tour and travel website/employee/booking.php">MANAGE BOOKING</a></h3>
         
        </div>
        </div>


    </body>
</html>