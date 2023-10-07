<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==2&& isset( $_SESSION['jobid']) &&isset( $_SESSION['jobseeker'])){

} else {
    header("location:home.php");
    exit();
}

$sql = "select * from applyforjob,jobseeker,job where JobId=? and JobId=id  and JobSeekerUserName=UserName";
$stmt = mysqli_stmt_init($conn);


$sql = "select * from jobseeker where UserName=?";
$stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['jobseeker']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }

        $sql = "select * from company ";
$stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
            exit();
        } else {
         //   mysqli_stmt_bind_param($stmt);
            mysqli_stmt_execute($stmt);
            $result1 = mysqli_stmt_get_result($stmt);
        }

        $sql = "SELECT * FROM company  ";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../php/search.php?error=sqlerror");
    exit();
  } else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
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
    <title>offer a job</title>
    <!-- MDB icon -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->

    <link rel="stylesheet" href="../css/mdb.min.css" />


</head>

<body>
<style>
.list-group-item:first-child::before{

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
    <?php  require_once"compnav.php";?>
    <?php require_once "companysection.php"; ?>
    <div class="col-lg-9">
          <div class="card mb-4" >
            <div class="card-body">


                    <form class="sign-in pt-4 " method="post" action="../includes/offer-inc.php">
                       <img src="../img/offer.png" style="width:150px">
    
                       <div class="form-outline" style="  ">
                  <div><label style="font-weight: bolder;">enter the salary you're offering </label></div>
                  <input type="number" id="typeNumber" class="form-control" name="money" required
                    style="width:37%;     margin-bottom: 2%;  border: 1px solid #bdbdbd;" min="0" >
</div>
                       
                            
                        
                            <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                        style="margin-top:30px;">SET</button></div>
                       
                    </form>
                </div>
              
            </div>
        </div>



    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
   

</body>

</html>