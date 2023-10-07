<?php
session_start();
require_once '../includes/database.php';

    if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==0) {
       
    } else {
  header("location:home.php");
  exit();
    }



      
?>
<!DOCTYPE html>

<html lang="en" style="
    overflow: scroll;
">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Admin</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  
  <link rel="stylesheet" href="../css/mdb.min.css" />
  <link rel="stylesheet" href="../css/Profile.css" />

</head>

<body>
<style>
.list-group-item:nth-child(2)::before{

content:"" ;
height:100%;
width:1%;
background-color:#088cc8;;
position :absolute;
top:0;
left:0;


}
</style>
  <!-- Start your project here-->
  <section style="background-color: #eee;">
 <?php require_once "adminnav.php";?>
 <?php require_once "adminsection.php";?>
 <div class="col">
          <div class="card mb-4">
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/addadmin-inc.php" style=" margin-top: -4%;">
  

<div class="form-floating" style="width:50%; margin-top:40px; ">
                    <div><label style="font-weight: bolder;">User Name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="username" required>

                  </div>


                  <div class="form-floating " style=" width:50%;margin-top:20px">
                    <div><label style="font-weight: bolder;">Password </label></div>
                    <input type="password" class="form-control" id="floatingInput" style="  height: 17%;" name="pass" required>

                  </div>

                  <div class="form-floating " style=" width:50%;margin-top:20px">
                    <div><label style="font-weight: bolder;">First name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="fname" required>

                  </div>

                  <div class="form-floating " style=" width:50%;margin-top:20px">
                    <div><label style="font-weight: bolder;">Last name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="lname" required>

                  </div>

                  <div class="form-floating " style=" width:50%;margin-top:20px">
                    <div><label style="font-weight: bolder;">Email </label></div>
                    <input type="email" class="form-control" id="floatingInput" style="  height: 17%;" name="email" required>

                  </div>
                
                <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px;">Add</button></div>



   
              </form>
            </div>
           
    </div>
  
 </div>
  <!-- MDB -->
  <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
 

</body>

</html>