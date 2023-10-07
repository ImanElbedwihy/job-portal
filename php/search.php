<?php
// Include the database configuration file
//include 'dbConfig.php';
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser']) && $_SESSION['type'] == 1) {

} else {
  header("location:home.php");
  exit();
}

// File upload path
if (isset($_POST['submit'])) {
  $title = $_POST['search'];


  $t = $_POST['del'];

  $title = $_POST['search'];
  $loc = $_POST['loc'];
  if ($loc == "all") {
    $sql = "SELECT * FROM job ,company  where UserName =CompanyUserName  and  title  LIKE '%{$title}%' and deleted=0 or describition  LIKE '%{$title}%' and UserName =CompanyUserName and deleted=0  ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
    }

    $sql = "SELECT * FROM intern ,company  where UserName =CompanyUserName  and  title  LIKE '%{$title}%' and deleted=0 ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res1 = mysqli_stmt_get_result($stmt);
    }


    $sql = "SELECT * FROM freelance ,company  where UserName =CompanyUserName  and  deleted=0 and  field  LIKE '%{$title}%' or task  LIKE '%{$title}%' and UserName =CompanyUserName   and deleted=0";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res2 = mysqli_stmt_get_result($stmt);
    }
  } else {
    $sql = "SELECT * FROM job ,company  where UserName =CompanyUserName  and  title  LIKE '%{$title}%' and location=?  and deleted=0";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $loc);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
    }

    $sql = "SELECT * FROM intern ,company  where UserName =CompanyUserName  and  title  LIKE '%{$title}%'  and location=? and deleted=0";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $loc);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res1 = mysqli_stmt_get_result($stmt);
    }


    $sql = "SELECT * FROM freelance ,company  where UserName =CompanyUserName  and  field  LIKE '%{$title}%'  and location=?  and deleted=0";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../php/search.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $loc);

      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      $res2 = mysqli_stmt_get_result($stmt);
    }


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
  <title>Home</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->

  <link rel="stylesheet" href="../css/mdb.min.css" />


</head>

<body>

  <!-- Start your project here-->
  <section style="background-color: #eee;">


    <?php require_once "nav.php"; ?>

    <?php require_once "requestsection.php"; ?>



    <div class="col-lg-9" style=" margin: auto;">
      <div class="card mb-4">
        <div class="card-body">



          <?php

  if (mysqli_num_rows($res) > 0 && $t == "Job") {


    while ($row = mysqli_fetch_assoc($res)) {
      echo " <form class='sign-in pt-4 '' method='post' action='../includes/apply-inc.php' style='height:100%;'>";
      echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;border-radius:20px;'>";

      $r = $row['title'];


      echo " <b> $r  </b><br>";
      echo "<b>Job Description: </b> ";
      echo "<br>";
      echo $row['describition'];
      echo "<br>";

      echo "<b>Company: </b>";
      echo $row['Name'];

      echo " &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;";
      echo "<b>Location:</b> ";
      echo $row['location'];
      echo "<br>";

      echo "<b>department :</b>";
      echo nl2br($row['department']);
      echo "<br>";
      echo nl2br($row['full_partTime']);
      echo " &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;";

      echo nl2br($row['indoor_outdoor']);
      echo "<br>";
      echo "<b>Required age:</b>";
      echo nl2br($row['age']);
      echo " &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;";
      echo "<b>Years Of Experince :</b>";
      echo nl2br($row['YearsOfExperince']);
      echo "<br>";
      echo "<b>Announcemnet Date:</b>";
      echo $row['AnnouncemnetDate'];
      echo "<br>";
      $tt = $row['id'];

      $sql4 = "SELECT * FROM requirments where  JobId=?   ";
      $stmt4 = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt4, $sql4)) {
        header("Location: ../php/search.php?error=sqlerror");
        exit();
      } else {

        mysqli_stmt_bind_param($stmt4, "i", $tt);
        mysqli_stmt_execute($stmt4);
        $r13 = mysqli_stmt_get_result($stmt4);
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






      $sql = "SELECT * FROM applyforjob where  JobSeekerUserName=? and  JobId =?   ";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/search.php?error=sqlerror");
        exit();
      } else {

        mysqli_stmt_bind_param($stmt, "si", $_SESSION['sessionUser'], $tt);
        mysqli_stmt_execute($stmt);
        $r1 = mysqli_stmt_get_result($stmt);
        $i = mysqli_num_rows($r1);
        if ($i == 0)
          $y = "";
        else
          $y = "disabled";
      }





      if ($i > 0) {
        echo "<div><button type='submit' class='btn btn-primary btn-lg  rounded-pill' name='submit'
                      style='margin-top:1%;' value='$tt' $y >Apply </button>";
        echo "<b style='margin-left:8%;'>you already applied for this job</b></div>";
      } else {
        $sql = "SELECT * FROM questionnaire where  JobId=?   ";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../php/search.php?error=sqlerror");
          exit();
        } else {

          mysqli_stmt_bind_param($stmt, "i", $tt);
          mysqli_stmt_execute($stmt);
          $r3 = mysqli_stmt_get_result($stmt);
          $i = 0;
          $ques = array('0', '1', '2');
          while ($row11 = mysqli_fetch_assoc($r3)) {
            $question = $row11['text'];

            echo " <div><label style='font-weight: bolder;margin-top:1%;'>$question</label></div>";
            echo "<input type='text' class='form-control' id='floatingInput'style='  height: 17%;' name='ques[]'  required>";
            $i++;
          }

          echo "<div><button type='submit' class='btn btn-primary btn-lg  rounded-pill' name='submit'
          style='margin-top:1%;' value='$tt' $y >Apply </button></div>";
        }
      }
      echo "</div>";
      echo " </form>";

    }
          ?>

          <?php
  } else if ($t == "Job") {
    echo "<b>sorry there are no jobs that match your serach</b> ";
    echo "<div><img src='../img/notfound.jpg'></div>";
  }
          ?>

          <?php

  if (mysqli_num_rows($res1) > 0 && $t == "Internship") {


    while ($row = mysqli_fetch_assoc($res1)) {
      echo " <form class='sign-in pt-4 '' method='post' action='../includes/apply-inc.php' style='height:100%;'>";
      echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;;border-radius:20px;'>";

      $r = $row['title'];


      echo " <p style='margin:auto;font-weight:bold;'> $r  </p>";
      echo "<b>Company:</b> ";
      echo $row['Name'];
      echo "<br>";
      echo "<b>Location: </b>";
      echo $row['location'];
      echo "<br>";


      echo "<b>Period(in weeks):</b>";
      echo nl2br($row['period']);
      echo "<br>";
      echo "<b>Starting date: </b>";
      echo nl2br($row['StartingDate']);
      echo "<br>";
      echo "<b>Required age:</b>";
      echo nl2br($row['age']);
      echo "<br>";
      echo "<b>Announcemnet Date:</b>";
      echo $row['AnnouncementDate'];
      echo "<br>";
      $tt = $row['id'];
      $sql4 = "SELECT * FROM internskills where  id=?   ";
      $stmt4 = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt4, $sql4)) {
        header("Location: ../php/search.php?error=sqlerror");
        exit();
      } else {

        mysqli_stmt_bind_param($stmt4, "i", $tt);
        mysqli_stmt_execute($stmt4);
        $r13 = mysqli_stmt_get_result($stmt4);
        echo "<b>Requirements: </b>";
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





      $sql = "SELECT * FROM applyforintern where  JobSeekerUserName=? and  internID  =?   ";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/search.php?error=sqlerror");
        exit();
      } else {

        mysqli_stmt_bind_param($stmt, "si", $_SESSION['sessionUser'], $tt);
        mysqli_stmt_execute($stmt);
        $r1 = mysqli_stmt_get_result($stmt);
        $i = mysqli_num_rows($r1);
        if ($i == 0)
          $y = "";
        else
          $y = "disabled";
      }

      echo "<div><button type='submit' class='btn btn-primary btn-lg  rounded-pill' name='submit1'
                    style=''value='$tt' $y>Apply</button></div>";
      if ($i > 0) {
        echo "<b style='margin-left:4%;'>you already applied for this internship</b>";
      }

      echo "</div>";
      echo "</form>";
    }
          ?>


          <?php
  } else if ($t == "Internship") {
    echo "<b>sorry there are no internships that match your serach</b> ";
    echo "<div><img src='../img/notfound.jpg'></div>";
  }
          ?>


          <?php

  if (mysqli_num_rows($res2) > 0 && $t == "Freelance") {

    while ($row = mysqli_fetch_assoc($res2)) {

      echo " <form class='sign-in pt-4 '' method='post' action='../includes/apply-inc.php' style='height:100%;'>";
      echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;;border-radius:20px;'>";

      $r = $row['field'];

      echo "<b>field: </b> ";
      echo " <b> $r  </b> <br>";
      echo "Company: ";
      echo $row['Name'];
      echo "<br>";
      echo "Location: ";
      echo $row['location'];
      echo "<br>";


      echo "task:";
      echo nl2br($row['task']);
      echo "<br>";


      echo "Announcemnet Date:";
      echo $row['AnnouncementDate'];
      echo "<br>";

      $tt = $row['id'];
      $sql = "SELECT * FROM applyforfreelance where  JobSeekerUserName=? and  freelanceID  =?   ";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/search.php?error=sqlerror");
        exit();
      } else {

        mysqli_stmt_bind_param($stmt, "si", $_SESSION['sessionUser'], $tt);
        mysqli_stmt_execute($stmt);
        $r1 = mysqli_stmt_get_result($stmt);
        $i = mysqli_num_rows($r1);
        if ($i == 0)
          $y = "";
        else
          $y = "disabled";
      }


      echo "<button type='submit' class='btn btn-primary btn-lg  rounded-pill' name='submit2'
                    style='' value='$tt' $y>Apply</button>";
      if ($i > 0) {
        echo "<b style='margin-left:4%;'>you already applied for this freelance</b>";
      }

      echo "</div>";

      echo " </form>";
    }
          ?>


          <?php
  } else if ($t == "Freelance") {
    echo "<b>sorry there are no freelance jobs that match your serach</b> ";
    echo "<div><img src='../img/notfound.jpg'></div>";
  }
}
          ?>





        </div>

      </div>
    </div>


    <?php
    // PHP program to pop an alert
// message box on the screen
    
    // Display the alert box 
    

    ?>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js.map"></script>

</body>

</html>