<?php
session_start();
require_once '../includes/database.php';
?>
<!DOCTYPE html>
<html lang="en" style="
    overflow: scroll;
">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My job portal</title>
  <!-- Main Template CSS File -->
  <link rel="stylesheet" href="../css/home.css" />
  <!-- Render All Elements Normally -->
  <link rel="stylesheet" href="../css/normalize.css" />
  <!-- Font Awesome Library -->
  <link rel="stylesheet" href="../css/all.min.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="header">
    <div class="container">
      <img class="logo" src="../img/logo.png" alt="" />
      <div class="links" style="display: flex;">
        <div> <a class="login" href="sign-in.php">login</a></div>
        <div> <a class="join" href="user_signup.php">Join_now</a></div>
        <div> <a class="employer" href="companysignup.php">Employer?</a></div>
      </div>
    </div>
  </div>
  <div class="landing">
    <div class="intro-text">
      <h1>Welcome</h1>
      <p>Search for a good opportunity and start your career now!</p>
    </div>
  </div>
  <!-- Start Footer -->


  <div class="footer">
    <p>&copy; 2022 MY JOB PORTAL All Right Reserved</p>
    <div class="followus">
      <p>Follow us</p>
      <div class="icons">
        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>
        <a href=""><i class="fa-brands fa-linkedin"></i></a>
      </div>
    </div>
  </div>
  <!-- End Footer -->
</body>

</html>