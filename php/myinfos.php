<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser']) && $_SESSION['type'] == 2) {

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
  <title>add freelance</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->

  <link rel="stylesheet" href="../css/mdb.min.css" />


</head>

<body>
  <style>
    .list-group-item:nth-child(6)::before {

      content: "";
      height: 100%;
      width: 1%;
      background-color: #088cc8;
      ;
      position: absolute;
      top: 0;
      left: 0;


    }
  </style>
  <!-- Start your project here-->
  <section style="background-color: #eee;">
    <?php require_once "compnav.php"; ?>
    <?php require_once "companysection.php"; ?>
    <div class="col-lg-9">
      <div class="card mb-4">
        <div class="card-body">

          <form class='sign-in pt-4 ' method='post' action='../includes/interviewcontract-inc.php' style='height:100%;'>
            <?php
            $sql = "SELECT * from applyforjob,jobseeker,company,job where jobseeker.UserName=JobSeekerUserName and JobId=id and company.UserName=CompanyUserName and company.UserName=? and IsAccepted=1 ";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../php/myinfos.php?error=sqlerror");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);

              mysqli_stmt_execute($stmt);
              mysqli_stmt_execute($stmt);
              $res = mysqli_stmt_get_result($stmt);
            }
            $j = 0;


            $f1 = 1;
            $f2 = 1;
            $f3 = 1;
            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {

                if ($j == 0) {

                  echo "<div style='margin-bottom:1%;margin-left:2%;;'><b >Accepted job applicants : </b></div>";
                }
                echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;border-radius:20px;'>";

                echo $row['Fname'];
                echo " ";
                echo $row['Lname'];
                echo " is accepted in ";

                echo $row['title'];
                echo " job ";

                $j++;
                $sql = "SELECT * from interview  where JobSeekerUserName =? and JobId=? ";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../php/myinfos.php?error=sqlerror");
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "si", $row['JobSeekerUserName'], $row['id']);

                  mysqli_stmt_execute($stmt);
                  mysqli_stmt_execute($stmt);
                  $res1 = mysqli_stmt_get_result($stmt);
                }

                if (mysqli_num_rows($res1) > 0) {
                  while ($row1 = mysqli_fetch_assoc($res1)) {
                    echo "<br>";
                    echo "your interview in ";
                    echo $row1['date'];

                  }
                } else {

                  $usernamre = $row['JobSeekerUserName'];

                  $id = $row['JobId'];

                  echo "<input name='id' value='$id' hidden></input>";
                  echo "<input name='username' value='$usernamre 'hidden></input>";

                  echo "  <div><button type='submit'class='btn btn-primary btn-lg  rounded-pill' name='submit'
            style='margin-top:33px;'>set interview</button></div>";


                }
            ?>

            <?php
                echo "</div>";
              }
            } else {
              $f1 = 0;
            }
            ?>

            <?php
            $sql = "SELECT * from offer,jobseeker,company,job where jobseeker.UserName=JobSeekerUserName and JobId=id and company.UserName=CompanyUserName and company.UserName=? ";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../php/myinfos.php?error=sqlerror");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);

              mysqli_stmt_execute($stmt);
              mysqli_stmt_execute($stmt);
              $res = mysqli_stmt_get_result($stmt);
            }
            $j = 0;



            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {

                if ($j == 0) {
                  echo "  <hr>";
                  echo "<div style='margin-bottom:1%;margin-left:2%;;'><b >Offers : </b></div>";
                }
                echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;border-radius:20px;'>";
                echo " you offered ";
                echo $row['Fname'];
                echo " ";
                echo $row['Lname'];

                echo " a ";
                echo $row['title'];
                echo " job ";

                echo "<br>";
                echo "status: ";
                if ($row['Isaccepted'] == 1) {
                  echo "accepted";
                }
                if ($row['Isaccepted'] == -1) {
                  echo "rejected";
                }
                if ($row['Isaccepted'] == 0) {
                  echo "pending";
                }
            ?>

            <?php
                echo "</div>";
              }
            } else {
              $f2 = 0;
            }
            ?>

            <?php
            $sql = "SELECT * from applyforfreelance,jobseeker,company,freelance where jobseeker.UserName=JobSeekerUserName and id=freelanceID  and company.UserName=CompanyUserName and company.UserName=?  and IsAccepted=1 ";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../php/myinfos.php?error=sqlerror");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);

              mysqli_stmt_execute($stmt);
              mysqli_stmt_execute($stmt);
              $res = mysqli_stmt_get_result($stmt);
            }
            $j = 0;



            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {

                if ($j == 0) {
                  echo "  <hr>";
                  echo "<div style='margin-bottom:1%;margin-left:2%;;'><b >Accepted freelance applicants : </b></div>";
                }
                echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;border-radius:20px;'>";

                echo $row['Fname'];
                echo " ";
                echo $row['Lname'];
                echo " was accepted . ";

                echo "<br> the task is ";
                echo $row['task'];
                echo ".";

                $j++;
                $sql = "SELECT * from contract  where JobSeekerUserName =? and 	FreelanceId =? ";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: ../php/myinfos.php?error=sqlerror");
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "si", $row['JobSeekerUserName'], $row['id']);

                  mysqli_stmt_execute($stmt);
                  mysqli_stmt_execute($stmt);
                  $res1 = mysqli_stmt_get_result($stmt);
                }



                if (mysqli_num_rows($res1) > 0) {
                  while ($row1 = mysqli_fetch_assoc($res1)) {





                    echo "<br> contract : <br>";

                    echo "Deadline:  ";
                    echo $row1['deadline'];
                    echo ".";

                    echo "<br>";

                    echo " Money:  ";
                    echo $row1['money'];
                    echo " ";
                    echo $row1['paymentInterval'];
                    echo ".";


                    echo "<br>";
                    echo "status: ";
                    if ($row1['IsAccepted'] == 1) {
                      echo "accepted";
                    }
                    if ($row1['IsAccepted'] == -1) {
                      echo "rejected";
                    }
                    if ($row1['IsAccepted'] == 0) {
                      echo "pending";
                    }
                  }
                } else {

                  $usernamre = $row['JobSeekerUserName'];

                  $id = $row['freelanceID'];

                  echo "<input name='id' value='$id' hidden></input>";
                  echo "<input name='username' value='$usernamre 'hidden></input>";

                  echo "  <div><button type='submit'class='btn btn-primary btn-lg  rounded-pill' name='submit2'
              style='margin-top:33px;'>Make contract</button></div>";


                }

            ?>

            <?php
                echo "</div>";
              }
            } else {
              $f3 = 0;
            }

            if ($f1 == 0&&$f2 == 0&&$f3 == 0) {
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