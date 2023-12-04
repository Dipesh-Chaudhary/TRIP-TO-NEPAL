<!DOCTYPE html>
<html>
    <head>
        <style>
            /* Popup container */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
        </style>
    </head>
<body>

<?php
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $packageId=$_SESSION['packageId'];
    // Include database connection settings
    $conn = mysqli_connect('localhost','root','','trip_to_nepal');
    
    //initializing variable with fetched value from form
    $name=$_POST['name'];
   
    $phnNmbr=$_POST['phnNmbr'];
    $email=$_POST['email'];
 
    $checkin=$_POST['checkin'];
    $message=$_POST['message'];
    $query = "INSERT INTO booking_tbl VALUES ('','$name','$email','$phnNmbr','$message','$checkin','$packageId','pending')";
    $run= mysqli_query($conn,$query);

    if($run){
    
        echo "<span class=\"popuptext\" id=\"myPopup\">booking done <a href=\"http://localhost/tour and travel website/\">GO TO HOME PAGE</a></span>";
    }       
}
    ?>
    <script>
        function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
    </script>
    </body>
    </html>