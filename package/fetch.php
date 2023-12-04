<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACKAGES</title>

   

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    
    <style>
        /* for styling login form container whuch is hidden initially */
.login-form-container,.signup-form-container{
  position: fixed;
  top:-120%; left: 0;
  z-index: 10000;
  min-height: 100vh;
  width:100%;
  background:rgba(0,0,0,.7);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* To make visible  while active */
.login-form-container.active,.signup-form-container.active{
  top:0;
}


.login-form-container form,.signup-form-container form{
  margin:2rem;
  padding:1.5rem 2rem;
  border-radius: .5rem;
  background:rgba(255, 255, 255, 0.3);
  width:50rem;
}

.login-form-container form h3,.signup-form-container form h3{
  font-size: 3rem;
  color:#444;
  text-transform: uppercase;
  text-align: center;
  padding:1rem 0;
}

.login-form-container form .box,.signup-container form .box{
  width:100%;
  padding:1rem;
  font-size: 1.7rem;
  color:#333;
  margin:.6rem 0;
  border:.1rem solid rgba(0,0,0,.3);
  text-transform: none;
}

/* to change color of input boxes while hovering on it */
.login-form-container form .box:focus,.signup-form-container form .box:focus{
  border-color: var(--blue);;
}

.login-form-container form .btn,.signup-form-container form .btn{
  display: block;
  width:100%;
}

.login-form-container #form-close1{
  position: absolute;
  top:2rem; right:3rem;
  font-size: 5rem;
  color:#fff;
  cursor: pointer;
}
.signup-form-container #form-close2{
  position: absolute;
  top:2rem; right:3rem;
  font-size: 5rem;
  color:#fff;
  cursor: pointer;
}
img,.minor_details{
 ;
    height:50%;
    width:50%;
    top:0px;
   
}

.minor_details{
    position:absolute;
    margin-left:50%;


}
.btn,#book-btn{
  background-color: orange;
        border-radius:20px;
        padding:4px;
        text-decoration: none;
        opacity:0.95;
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
    
    <!-- header section starts  -->

    <header>
        
    <?php
    
    
    
    $conn = mysqli_connect('localhost','root','','trip_to_nepal');
    $package_id=0;
    $package_id=$_POST["packageId"];
    $query = "select * from  package_tbl where package_id=\"".$package_id."\"";

    $query2 = "select *from  review_tbl where package_id=\"".$package_id."\"";
    $run2 = mysqli_query($conn,$query2);
    $row2 = mysqli_fetch_array($run2);

    $query3 = "select AVG(rating)from  review_tbl where package_id=\"".$package_id."\"";
    $run3 = mysqli_query($conn,$query3);
    $row3 = mysqli_fetch_array($run3);

    $run = mysqli_query($conn,$query);
        if (mysqli_num_rows($run) > 0){
        
    $row = mysqli_fetch_array($run);
    $package_id=$row["package_id"];
                echo"<img src=\"uploads/$row[Logo_name]\"   frameborder='0' alt=\"Unable to see photo\">";
                echo "<div class='minor_details'>
                        <b><h2 style=\"background-color:lightblue;height:50px;\">".$row["title"]."</h2></b>
                        <b><h1 style=\"color:brown\">".$row["destination"]."</h1></b><br>
                    
                        <i class=\"fa fa-tag\" aria-hidden=\"true\">".$row['price']."</i>
                        <h2> (".mysqli_num_rows($run2).")rating :  ".$row3[0]."</h2> <div class=\"icons\">
                        <form  action=\"http://localhost/tour and travel website/package/book_form.php\" method=\"POST\" enctype=\"multipart/form-data\">
                          <input type=\"radio\" style =\"display :none\" name=\"package_id\" value=\"".$package_id."\" checked>
                          <button type=\"submit\" name=\"submit1\" class=\"btn\" formaction=\"http://localhost/tour and travel website/package/BookingForm.php\">BOOK</button>
                        </form>
                        <i class=\"fas fa-user\" id=\"book-btn\">Give review/rating</i>
                        
                    </div>
                        </div><div class='details'>";
                echo $row["details"]."</div>";  
                
        }

        $query1 = "select * from  review_tbl,user_tbl where review_tbl.user_id=user_tbl.user_id and review_tbl.package_id=\"".$package_id."\"";
    
    $run1 = mysqli_query($conn,$query1);
        if (mysqli_num_rows($run1) > 0){
          echo"<div style =\"text-align:center;background-color:rgba(0,0,0,0.8);padding:30px;\"><h1 style =\"color:white;\" >REVIEWS (".mysqli_num_rows($run1).")</h1>";
          while($row1 = mysqli_fetch_array($run1)) {

    echo "<div style =\"text-align:center;background-color:lightblue;\" ><span style =\"font-size:70px;color:red\"> <i class=\"fas fa-user\" ></i>".$row1['name']."</span>          ";
    
    echo"<span style =\"    display: inline-block; border-radius:20px;padding:5px;
    margin-left: 60px;font-size:30px;background-color:rgba(255,255,255,0.6);\">".$row1['review']."</div><br>";
    
        }
        echo"</div>";
      }


   
 ?>
        


    </header>

    <!-- header section ends -->

    <!-- login form container  which is hidden until we click admin button-->
    <div class="back-vid">
    <!-- for background video -->
    <video src="vid-1st.mp4" id="video-slider" loop autoplay muted></video>
    <div class="login-form-container">
        <!-- for "x" logo to close form -->
        <i class="fas fa-times" id="form-close1"></i>
        <div id="login">
        <form action="http://localhost/tour and travel website/package/userCheck.php" method="POST">
            <h3>YOU HAVE TO LOGIN FIRST</h3>
            <input type="email" name="email" class="box" placeholder="enter your email">
            <input type="password" name="pass" class="box" placeholder="enter your password">
            <input type="radio" name="packageId" style="display:none;" checked value="<?php echo $_POST['packageId']?>" checked >
            <input type="submit" name="submit" value="login now" class="btn">
            <h4 id="signupBtn" class="btn">No account? Signup</h4>
           
         
        
        </form>
        </div>
    </div>
    
    <div class="signup-form-container">
        <!-- for "x" logo to close form -->
        <i class="fas fa-times" id="form-close2"></i>
        <div id="signup">
        <form action="http://localhost/tour and travel website/package/signIn.php" method="POST">
            <h3>signup</h3>
            <input type="text" name="user_name" class="box" placeholder="Enter you user name">
            <input type="number" name="phnNmbr" class="box" placeholder="enter your phn number">
            <input type="email" name="email" class="box" placeholder="enter your email">
            <input type="password" name="pass" class="box" placeholder="enter your password">
            <input type="radio" name="packageId" style="display:none;"  value="<?php echo $_POST['packageId']?>" checked >
            <input type="submit" name="submit" value="Sign UP" class="btn">
            
         
        
        </form>
        </div>
        
    </div>
    

    
 </div>
    <!-- custom js file link  -->
    <script >
        let formBtn = document.querySelector('#book-btn');
        let signupBtn = document.querySelector('#signupBtn');
        let loginForm = document.querySelector('.login-form-container');
        let signupForm = document.querySelector('.signup-form-container');
        let formClose1 = document.querySelector('#form-close1');
        let formClose2 = document.querySelector('#form-close2');

        signupBtn.addEventListener('click', () =>{  
        signupForm.classList.add('active');    //to show login form while clicking login/admin/form button
        loginForm.classList.remove('active');                                     
      });
        formBtn.addEventListener('click', () =>{  
        loginForm.classList.add('active');    //to show login form while clicking login/admin/form button
                                                });

         formClose1.addEventListener('click', () =>{
        loginForm.classList.remove('active'); //to close login form when clicking "X" logo
      
                                            });
                                            formClose2.addEventListener('click', () =>{
        
        signupForm.classList.remove('active');
                                            });

    </script>

</body>
</html>
