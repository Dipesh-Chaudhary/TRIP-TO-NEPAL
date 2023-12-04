<?php
    session_start();
    $packageId=$_SESSION['packageId'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="BookingForm.css">
<script type=" BookingForm.js"></script>
</head>
<body>
<div class="back-vid">
  <!-- for background video -->
  <video src="vid-1st.mp4" id="video-slider" loop autoplay muted></video>
  <div class="content">
<form action="reservation.php" method="post">

  <div class="elem-group">
    <h1>fill up the booking details</h1>
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Your E-mail</label>
    <input type="email" id="email" name="email" placeholder="" required>
  </div>
  <div class="elem-group">
    <label for="phnNmbr">Your Phone</label>
    <input type="number" id="phnNmbr" name="phnNmbr" placeholder="" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
  </div>
  <hr>
  
  <div class="elem-group ">
    <label for="checkin-date">Check-in Date</label>
    <input type="date" id="checkin-date" name="checkin" required>
  </div>
  
  
  <hr>
  <div class="elem-group">
    <label for="message">Anything Else?</label>
    <textarea id="message" name="message" placeholder="Tell us anything else that might be important." required></textarea>
  </div>
  <button type="submit">Book now ! pay at office</button>
</form>
</div>
</div>
</body>
</html>
