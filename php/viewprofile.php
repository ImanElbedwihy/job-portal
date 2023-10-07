<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==2&& isset( $_SESSION['jobid']) ){

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
    <title>View Profile</title>
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


                    <form class="sign-in pt-4 " method="post" action="../includes/jobreq-inc.php"
                        style=" margin-top: -4%;">
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
                 mysqli_stmt_bind_param($stmt, "s", $_SESSION['jobseeker']);
                 mysqli_stmt_execute($stmt);
                 $result = mysqli_stmt_get_result($stmt);
                  
      }
    

            if (mysqli_num_rows($result) > 0)
   {
   
    echo "<div style='background-color:#c5d0e8;; margin-bottom:1%; margin-top:2%;padding:1%; border-radius:20px;'>
    ";

     if ($row = mysqli_fetch_assoc($result)) {


      if($row['IsUploaded']==1)
      {   $imageURL = '../includes/uploads/' . $_SESSION["jobseeker"].'.pdf';
   
       
     
                echo"     <a style='font-weight:bold;color:red;' href=' $imageURL '>View CV</a>";
     }
       echo "<br>";
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

       if ($row['currentDegree'] != null && $row['currentDegree'] != "") {

        echo "Current Degree :  ";




        echo $row['currentDegree'];
        echo " <br> ";
      }

      if ($row['university'] != null && $row['university'] != "") {

        echo "gratuded from   ";




        echo $row['university'];
               echo "<br>";
        if ($row['field'] != null && $row['field'] != "") {

            echo "  specialised in  ";
    
    
    
    
            echo $row['field'];
            echo " <br> ";
          }
      }

      

       echo "<hr>";
    

       $sql = "select * from jobseekerskills where UserName=? ";
       $stmt = mysqli_stmt_init($conn);
       
       
               if (!mysqli_stmt_prepare($stmt, $sql)) 
               {
               
                   exit();
               } else {
                   mysqli_stmt_bind_param($stmt, "s", $_SESSION['jobseeker']);
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
         echo "<b> Skills: </b>";

         foreach ($checked_arr as $s) {


           echo "<div> $s <br/></div>";

         }
       }




       $sql = "select * from experience where UserName=? ";
       $stmt = mysqli_stmt_init($conn);
       
       
               if (!mysqli_stmt_prepare($stmt, $sql)) 
               {
               
                   exit();
               } else {
                   mysqli_stmt_bind_param($stmt, "s", $_SESSION['jobseeker']);
                   mysqli_stmt_execute($stmt);
                   $result = mysqli_stmt_get_result($stmt);
               }

               if (mysqli_num_rows($result) > 0) {

               echo "<hr>";
               echo "<b>Experience</b>";
               while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<br>";
                    echo "worked as ";
                   echo $row['jobtitle'];
                   echo " in ";
                   echo $row['company'];

                  echo" for ";
                  echo $row['years'];
                   if ($row['years'] > 1) {
                       echo " years";
                   }
                   else 
                   echo " year";
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



    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
   

</body>

</html>