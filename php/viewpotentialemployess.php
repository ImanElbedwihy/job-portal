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

$sql = "SELECT Fname,Lname,jobseeker.UserName,describition FROM job,jobseeker,jobseekerskills where jobseeker.UserName=jobseekerskills.UserName   
       and id=? 
        and skill IN 
       (

            select requirment from requirments where  JobId =id 
        )
        UNION 
        SELECT Fname,Lname,jobseeker.UserName,describition  FROM job,jobseeker,experience where jobseeker.UserName=experience.UserName   
       and id=? and jobtitle =title
         ";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../php/search.php?error=sqlerror");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ii",  $_SESSION['jobid'], $_SESSION['jobid']);

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
    <title>Serch for employees</title>
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

                  <form class="sign-in pt-4 " method="post" action="../includes/jobreq-inc.php">
                      
                    <?php
                        if (mysqli_num_rows($res) > 0)
   {

                         
    
                            $j = 0;

    while ($row = mysqli_fetch_assoc($res))
    
    {
        if($j==0)
        {
                                    echo "<b>Job describition :</b>";
                                 
         
            echo $row['describition'];;
                                  
                                  
            echo "<br>";
            $sql4 = "SELECT * FROM requirments where  JobId=?   ";
            $stmt4 = mysqli_stmt_init($conn);
          
            if (!mysqli_stmt_prepare($stmt4, $sql4)) {
              header("Location: ../php/search.php?error=sqlerror");
              exit();
                                    } else {

                                        mysqli_stmt_bind_param($stmt4, "i",  $_SESSION['jobid']);
                                        mysqli_stmt_execute($stmt4);
                                        $r13 = mysqli_stmt_get_result($stmt4);
                                        echo "<b>Requirements: </b>";
        $j = 0;
        while ($row11 = mysqli_fetch_assoc($r13)) 

{
         
  if($j!=0)
  {
    echo",";
  }
  echo " &nbsp;";
          echo $row11['requirment'];
        
  $j++;
}
                                    }


                                    echo "<br>";  echo "<br>";
                                  
        }
          $j++;    
          
          echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;border-radius:20px;'>";
          
          echo $row['Fname'];
                                echo "&nbsp;";
                                echo $row['Lname'];
                                echo " is qualifed for this job ";

                            
                                echo "<div>";
                                $u=$row['UserName'];
                                echo "<button type='submit' class='btn btn-primary   rounded-pill' name='submit1'
                                style='margin-top:1%;margin-right:4%;'value='$u'>view  profile  </button>";
                                echo "<button type='submit' class='btn btn-primary  rounded-pill' name='offer'
                                style='margin-top:1%; margin-right:4%;'  value='$u'>offer</button>";
                               
                                echo "</div>";
                              
       echo"</div>";
    }}
  else
  {

    $sql = "select * from job where id=? ";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt, $sql)) {

    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['jobid']);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
}
                            $row = mysqli_fetch_assoc($res);
    echo "<b>Job describition :</b>";
    echo "<br>";
         
    echo $row['describition'];;
    $sql4 = "SELECT * FROM requirments where  JobId=?   ";
    $stmt4 = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt4, $sql4)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
                            } else {

                                mysqli_stmt_bind_param($stmt4, "i", $_SESSION['jobid']);
                                mysqli_stmt_execute($stmt4);
                                $r13 = mysqli_stmt_get_result($stmt4);
                                echo "<br>";
                                echo "<b>Requirements: </b>";
                                $j = 0;
                                while ($row11 = mysqli_fetch_assoc($r13)) {

                                    if ($j != 0) {
                                        echo ",";
                                    }
                                    echo " &nbsp;";
                                    echo $row11['requirment'];

                                    $j++;
                                }
                            }
    echo "<hr>";
    echo "<b>there is no one qualified for this job</b> ";
    echo "<div><img src='../img/notfound.jpg'></div>";
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