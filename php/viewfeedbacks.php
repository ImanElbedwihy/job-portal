<?php
session_start();
require_once '../includes/database.php';

    if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==0&&isset($_SESSION['jobseeker'])) {
       
    } else {
  header("location:home.php");
  exit();
    }
$sql = "SELECT * FROM feedback,job,company,jobseeker WHERE feedback.jobid =job.id and job.CompanyUserName=company.UserName and jobseeker.UserName= jobseekerusername and jobseekerusername=?;";
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: viewfeedbacks.php?error=sqlerror");
      exit();
} else {

    mysqli_stmt_bind_param($stmt, "s", $_SESSION['jobseeker']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
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
.list-group-item:nth-child(4)::before{

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
            

              <form class="sign-in pt-4 " method="post" action="../includes/deletefeedback-inc.php" style=" margin-top: -4%;">
  
              <?php
              if (mysqli_num_rows($result) > 0)
   {



                  while ($row = mysqli_fetch_assoc($result)) {

                      echo "<div style='background-color:#c5d0e8;; margin-bottom:1%; margin-top:2%;padding:1%; border-radius:20px;'>";

                     
                      echo $row['Name'];
                      echo " wrote to  ";
                      echo $row['Fname'];
                      echo " ";
                      echo $row['Lname'];


                      echo " feedback: ";

                    
                      echo $row['text'];


                      $username=$row['UserName'];
                     $username= $row['jobseekerusername'];
                     $id=$row['jobid'];


                      
                      echo
                          "<div><button type='submit' class='btn btn-primary   rounded-pill' name='submit'
                     style='margin-top:1%;margin-right:4%'  >Delete  </button></div>";

                     echo"<input name=username value=$username hidden></input>";
                      echo "<input name=id value=$id hidden></input>";



                   
                     
                     

                      echo "</div>";
                  }
              } else {
                  echo "no feedbacks are written to this person";
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