<?php
    session_start();
    require_once '../includes/database.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0112)file:///C:/Users/sggln/OneDrive/Desktop/MDB5-STANDARD-UI-KIT-Free-6.0.0/Material%20Design%20for%20Bootstrap.html -->
<html lang="en" style="
    overflow: scroll;
"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Company sign up</title>
    <!-- MDB icon -->
    <link rel="icon" href="file:///C:/Users/sggln/OneDrive/Desktop/MDB5-STANDARD-UI-KIT-Free-6.0.0/img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="../css/companysignup.css">
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css">

 
</head>
  <body>


    <!-- Start your project here-->
    <section>
    <div class="col-lg-5" style=" margin: auto; margin-top:3%;">
          <div class="card mb-4" >
            <div class="card-body">
              <a href="home.php" class="logo">
                <img src="../img/logo.png" alt="Logo" style="
    height: 60px;
    display: block;
    margin-left: auto;
    margin-right: auto;
">
              </a>
              <h2 class="text-uppercase text-center mb-5">Create a Company Account to Start Hiring Now</h2>

              <form method="post"  class="sign-in pt-4 " action="../includes/registercompany-inc.php">

              <div class="form-floating mb-3 ">
                  <input type="text" id="form3Example1cg"  class="form-control mt-4  " name="name" required placeholder="Comapny Name">
                  <label class="form-label" for="form3Example1cg" style="margin-left: 0px;">Comapny Name</label>
</div>
                <div class="form-floating mb-3 ">
                  <input type="text" id="form3Example1cg"  class="form-control mt-4  " name="username" required  placeholder="UserName">
                  <label class="form-label" for="form3Example1cg" style="margin-left: 0px;">UserName</label>
                  </div>
             
                <div class="form-floating mb-3 ">
                  <input type="email" id="form3Example3cg"  class="form-control mt-4  " name="email" required placeholder="Business Email">
                  <label class="form-label" for="form3Example3cg" style="margin-left: 0px;">Business Email</label>
              
                  </div>
                  <div class="form-floating ">
                   
                    <input type="tel" class="form-control" id="floatingInput" placeholder="Mobile"
                      pattern="[0-9]{11}" name="moblile" required>
                      <label style="margin-left: 0px;">Mobile</label>
                    <small>Format: 01287643197</small>

                  </div>

                
                <div class="form-floating mb-3 ">
                  <input type="password" id="form3Example4cg"  class="form-control mt-4  " name="password" required placeholder="Create your Password">
                  <label class="form-label" for="form3Example4cg" style="margin-left: 0px;">Create your Password</label>
               
                  </div>
                

               

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary" name="submit">Craete Comapny Account</button>
                </div>

                

              </form>

</section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  
   
</body></html>