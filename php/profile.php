<?php
session_start();
require_once '../includes/database.php';

    if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==1) {
       
    } else {
  header("location:home.php");
  exit();
    }


$sql = "select * from jobseeker where UserName=?";
$stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
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

<html lang="en" style="
    overflow: scroll;
">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Home</title>
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
 <?php require_once "navsearch.php";?>
 <?php require_once "requestsection.php";?>
 <div class="col">
          <div class="card mb-4">
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/experience-inc.php" style=" margin-top: -4%;">
  <?php if ($row = mysqli_fetch_assoc($result))
  
  {
    echo "<div style='margin:auto;'>";
if($row['gender']=="male")
{?>

<img src="../img/male.png" alt="">
<?php

}
else 
{?>
<img src="../img/female.png" alt="">
<?php
}
echo "<label style='display:inline;'>";
    $t = $row['Fname'];
    $t1 = $row['Lname'];
    $t2 = $t . " " . $t1;
    echo"<b style='font-size: xxx-large;margin-left:4%;'> $t2</b>";
   
    echo "</label>";
    echo "</div>";
  

  }
  
  
  ?>
   <?php
     $sql = "select * from jobseeker ,user where jobseeker.UserName=? and jobseeker.UserName=user.UserName";
     $stmt = mysqli_stmt_init($conn);
     
     
             if (!mysqli_stmt_prepare($stmt, $sql)) {
             
                 exit();
             } else {
                 mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
                 mysqli_stmt_execute($stmt);
                 $result = mysqli_stmt_get_result($stmt);
                  
      }
    

            if (mysqli_num_rows($result) > 0)
   {
   
    echo "<div style='background-color:#c5d0e8;; margin-bottom:1%; margin-top:2%;padding:1%; border-radius:20px;'>
    ";

     if ($row = mysqli_fetch_assoc($result)) {


       echo "<b>User Name : </b> ";



       echo $row['UserName'];
       echo "<hr>";
       echo "<b>Contact info: </b> ";

       echo " <br> ";

       echo "<i class='fa-regular fa-envelope'></i>";

       echo $row['email'];
       echo " <br> ";
       if ($row['mobile'] != null && $row['mobile'] != "") {
         echo " <i class='fa-solid fa-mobile-screen-button'></i>";
       }
       echo $row['mobile'];
       echo "<hr>";
       echo "<b>General info: </b> ";
       echo " <br> ";

       echo "age : ";

       echo $row['age'];
       echo " <br> ";
       if ($row['GraduationFlag'] != null && $row['GraduationFlag'] != "") {
         echo " eductional level : ";

         echo $row['GraduationFlag'];
         echo "<br>";



       }

       if ($row['WorkFlag'] != null && $row['WorkFlag'] != "") {
         echo "status :  ";

         echo $row['WorkFlag'];
         echo " <br> ";

       }
       if ($row['addres'] != null && $row['addres'] != "") {

         echo "address :  ";




         echo $row['addres'];
         echo " <br> ";
       }
       echo "<hr>";
    

       $sql = "select * from jobseekerskills where UserName=? ";
       $stmt = mysqli_stmt_init($conn);
       
       
               if (!mysqli_stmt_prepare($stmt, $sql)) 
               {
               
                   exit();
               } else {
                   mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
                   mysqli_stmt_execute($stmt);
                   $result = mysqli_stmt_get_result($stmt);
               }


       $checked_arr = array();


       if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
           array_push($checked_arr, $row['Skill']);

         }
       }
       if (count($checked_arr) > 0) {
         echo "<b> Your Skills: </b>";

         foreach ($checked_arr as $s) {


           echo "<div> $s <br/></div>";

         }
       }
       echo "</div>";


     }



             ?>
  

  
  <?php
  }
 
  ?>
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