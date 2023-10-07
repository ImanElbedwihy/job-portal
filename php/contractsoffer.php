<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser']) && $_SESSION['type'] == 1) {

} else {
  header("location:home.php");
  exit();
}






$sql = "SELECT * FROM company  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("Location: contractsoffer.php?error=sqlerror");
  exit();
} else {

  mysqli_stmt_execute($stmt);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
}
$sql = "SELECT * from offer,job,company,user where JobId=id and CompanyUserName=company.UserName and user.UserName=company.UserName and  JobSeekerUserName=? and Isaccepted=0";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location:contractsoffer.php?eror");
  exit();
} else {
  mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
}

$sql1 = "SELECT *,contract.id as ci from contract,freelance,company,user where FreelanceId =freelance.id and CompanyUserName=company.UserName and  user.UserName=company.UserName and JobSeekerUserName=? and IsAccepted!=-1 ";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt, $sql1)) {
  header("location:contractsoffer.php?eror");
  exit();
} else {
  //   mysqli_stmt_bind_param($stmt);
  mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt);
  $result1 = mysqli_stmt_get_result($stmt);
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
    .list-group-item:nth-child(5)::before {

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
    <?php require_once "navsearch.php"; ?>
    <?php require_once "requestsection.php"; ?>
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">


          <form class="sign-in pt-4 " method="post" action="../includes/contractsoffer-inc.php"
            style=" margin-top: -4%;">
            <?php
            if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0) {
              if (mysqli_num_rows($result) > 0) {
                $j = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                  if ($j == 0) {

                    echo "<div style='
                  margin-bottom: 2%;
                  margin-top: 1%;
                  margin-left: 1%;
              
              '><b>MY Offers: </b></div>";


                  }
                  echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;;border-radius:20px;'>";

                  echo "You got an offer from ";
                  echo $row['Name'];

                  echo " company for job  ";
                  echo $row['title'];


                  echo " .<br>you were offered a salary  ";
                  echo $row['salary'];

                  echo " EGP <br>";
                  echo " contact Info:";
                  echo "<br>";
                  echo "Mobile: ";
                  echo $row['mobile'];
                  echo "<br>";
                  echo "Email: ";
                  echo $row['email'];



                  $JobId = $row['JobId'];



                  echo "<input name='jobid' value='$JobId' hidden></input>";


                  echo " <div style='margin-top: 2%;
                ;'>
                    <button type='submit' style='margin-right:4%;'class='btn btn-primary   rounded-pill' name='submit1'>accept</button>
                    <button type='submit' style='margin-right:4%;'class='btn btn-primary   rounded-pill' name='submit2'>reject</button>
                      </div>

                 </div>";


                }
              }


              if (mysqli_num_rows($result1) > 0) {
                $j = 0;

                while ($row = mysqli_fetch_assoc($result1)) {
                  if ($j == 0) {

                    echo "<div style='
                  margin-bottom: 2%;
                  margin-top: 2%;
                  margin-left: 1%;
              
              '><b>MY Contracts: </b></div>";


                  }
                  $j++;
                  echo "<div style='background-color:#c5d0e8; margin-bottom:1%; padding:1%;;border-radius:20px;'>";

                  echo "You got a contract from ";
                  echo $row['Name'];

                  echo " company <br>  task:  ";
                  echo $row['task'];


                  echo " .<br>you were offered  ";
                  echo $row['money'];

                  echo " EGP ";
                  echo $row['paymentInterval'];

                  echo "<br>";
                  echo " contact Info:";
                  echo "<br>";
                  echo "Mobile: ";
                  echo $row['mobile'];
                  echo "<br>";
                  echo "Email: ";
                  echo $row['email'];

                  if ($row['IsAccepted'] == 0) {


                    $id = $row['ci'];


                    echo "<input name='cid' value='$id' hidden></input>";

                    echo " <div style='margin-top: 2%;
                ;'>
                    <button type='submit' style='margin-right:4%;'class='btn btn-primary   rounded-pill' name='submit3'>accept</button>
                    <button type='submit' style='margin-right:4%;'class='btn btn-primary   rounded-pill' name='submit4'>reject</button>
                      </div>";

               

                

                  }
                  echo  "</div>";

                }
              }
            } else {
              echo "<b>You have no offers nor contracts</b> ";
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