<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==2&& isset( $_SESSION['internid']) ){

} else {
    header("location:home.php");
    exit();
}

$sql = "select * from applyforintern,jobseeker,intern where internID=? and internID=id  and JobSeekerUserName=UserName and IsAccepted=0";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt, $sql)) {

    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['internid']);
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
    <title>view requests</title>
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
                       
                        <?php
                          $sql4 = "SELECT * FROM internskills where  id=?   ";
                          $stmt4 = mysqli_stmt_init($conn);
                        
                          if (!mysqli_stmt_prepare($stmt4, $sql4)) {
                            header("Location: ../php/search.php?error=sqlerror");
                            exit();
                        } else {

                            mysqli_stmt_bind_param($stmt4, "i", $_SESSION['internid']);
                            mysqli_stmt_execute($stmt4);
                            $r13 = mysqli_stmt_get_result($stmt4);
                            echo "<b>required skills: </b>";
                            $j = 0;
                            while ($row11 = mysqli_fetch_assoc($r13)) {

                                if ($j != 0) {
                                    echo ",";
                                }
                                echo " &nbsp;";
                                echo $row11['skill'];

                                $j++;
                            }
                        }
                        if (mysqli_num_rows($res) > 0)
   {

                         
    
                            $j = 0;

    while ($row = mysqli_fetch_assoc($res))
    
    {
        
          
          echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;border-radius:20px;'>";
          
          echo $row['Fname'];
                                echo "&nbsp;";
                                echo $row['Lname'];
                                echo " has applied for this internship";
                                echo " in ";
                                echo $row['date'];
                                
                                echo "<div>";
                                $u=$row['UserName'];
                                echo "<button type='submit' class='btn btn-primary   rounded-pill' name='submit1'
                                style='margin-top:1%;margin-right:4%;'value='$u'>view  profile  </button>";
                                echo "<button type='submit' class='btn btn-primary  rounded-pill' name='submit11111'
                                style='margin-top:1%; margin-right:4%;'  value='$u'>accept</button>";
                                echo "<button type='submit' class='btn btn-primary  rounded-pill' name='submit222222'
                                style='margin-top:1%; margin-right:4%;'  value='$u'>reject</button>";
                                echo "</div>";
                              
       echo"</div>";
    }}
  else
  {

   
    echo "<hr>";
    echo "<b>No pending requests</b> ";
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