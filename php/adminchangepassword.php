<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])) {
       
} else {
header("location:home.php");
exit();
}
?>
<!DOCTYPE html>
<!-- saved from url=(0112)file:///C:/Users/sggln/OneDrive/Desktop/MDB5-STANDARD-UI-KIT-Free-6.0.0/Material%20Design%20for%20Bootstrap.html -->
<html lang="en" style="
    overflow: scroll;
">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>change password</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../css/changepassword.css" />
  <link rel="stylesheet" href="../css/mdb.min.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>


  <!-- Start your project here-->
  
  <section style="background-color: #eee;">
   <?php require_once"adminnav.php"?>

<div class="mainDiv">
  <div class="cardStyle">
    <form action="../includes/adminchangepassword-inc.php" method="post" name="signupForm" id="signupForm">
      
      
      
      <div class="inputDiv">
    <label style="font-weight: bolder; ">Old Password</label>
      <input type="password" id="password" name="oldpassword" required style="margin-bottom:10%;">
    </div>
      
    <div class="inputDiv">
    <label style="font-weight: bolder;">New Password</label>
      <input type="password" id="password" name="newpassword" required style="margin-bottom:10%;">
    </div>
      
    <div class="inputDiv">
    <label style="font-weight: bolder;">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" style="margin-bottom:10%;">
    </div>
    
    <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px; position: relative;
    left: 39%;">Save</button>
      
  </form>
  </div>

</div>


</body>