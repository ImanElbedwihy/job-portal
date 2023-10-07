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
    header("Location: ../php/jobapp.php?error=sqlerror");
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
  <title>jobs applications</title>
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
 <?php require_once "navsearch.php";?>
 <?php require_once "requestsection.php";?>
 <div class="col">
          <div class="card mb-4">
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/deletejob-inc.php" style=" margin-top: -4%;">
    <?php
      $sql = "SELECT * FROM applyforjob ,company ,job where JobSeekerUserName=? and JobId=id  and UserName= CompanyUserName ";
      $stmt = mysqli_stmt_init($conn);
    
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: jobapp.php?error=sqlerror");
        exit();
      } else {
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
      }
    

            if (mysqli_num_rows($res) > 0)
   {
   
   
 
    while ($row = mysqli_fetch_assoc($res)) {

      echo "<div style='background-color:#c5d0e8;; margin-bottom:1%; margin-top:2%;padding:1%; border-radius:20px;'>";
     
      echo "you applied for  ";
      echo$row['title'];
        echo " job";
      echo " in ";
      echo $row['Name'];
        echo " Company ";
     
      echo " in ";
      echo ($row['Date']);
        echo "<br>";
        $tt =$row['JobId'];
      if($row['IsAccepted']==1)

   {
          echo "<b>status: accepted</b>";
          $sql = "SELECT * FROM interview  where jobseekerusername=? and JobId=?    ";
          $stmt = mysqli_stmt_init($conn);
        
          if (!mysqli_stmt_prepare($stmt, $sql)) {
           
            exit();
          } else {
          mysqli_stmt_bind_param($stmt, "ss", $_SESSION['sessionUser'],$tt);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_execute($stmt);
            $res123 = mysqli_stmt_get_result($stmt);
          }
      
          if (mysqli_num_rows($res123) > 0)
          {
            if($row1 = mysqli_fetch_assoc($res123))
            {
                    echo "<br>";
              echo "your interview is set in ";
                    echo $row1['date'];
                    echo "<br>";
              echo "location: ";
              echo $row['location'];
            }
          }
          else{
            echo "your interview hasn't been set yet";
          }
   }
   else if($row['IsAccepted']==-1)
   {
    echo "<b>status: rejected</b>";
    $sql = "SELECT * FROM feedback  where jobseekerusername=? and JobId=?    ";
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     // header("Location: jobapp.php?error=sqlerror");
      exit();
    } else {
    mysqli_stmt_bind_param($stmt, "ss", $_SESSION['sessionUser'],$tt);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res123 = mysqli_stmt_get_result($stmt);
    }

    if (mysqli_num_rows($res123) > 0)
    {
      if($row1 = mysqli_fetch_assoc($res123))
      {
              echo "<br>";
              echo $row1['text'];
              echo " written in ";
              echo $row1['date'];
      }
    }

   }
   else
   {
    echo "<b>status: pending</b>";
   }
       

      echo "<div><button type='submit' class='btn btn-primary btn-lg  rounded-pill' name='submit'
                     style='margin-top:1%;' value='$tt' >Delete  </button></div>";
                    
                     echo "</div>";
                    
    }
  
             ?>
  
  <?php
  }
  else
  {
    echo "<b>You didn't apply for any jobs yet</b> ";
    echo "<div><img src='../img/notfound.jpg'></div>";
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