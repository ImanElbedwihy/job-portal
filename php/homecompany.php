<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser']) && $_SESSION['type'] == 2) {

} else {
  header("location:home.php");
  exit();
}


$sql = "select * from company where UserName=?";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt, $sql)) {

  exit();
} else {
  mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
}





$sql1 = "select * from job where CompanyUserName =? and deleted=0";
$stmt1 = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt1, $sql1)) {


} else {
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt1);
  $result = mysqli_stmt_get_result($stmt1);
}

$sql1 = "select * from intern where CompanyUserName =? and deleted=0";
$stmt1 = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt1, $sql1)) {


} else {
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt1);
  $result1 = mysqli_stmt_get_result($stmt1);
}


/////
$sql1 = "select * from freelance where CompanyUserName =? and deleted=0";
$stmt1 = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt1, $sql1)) {


} else {
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt1);
  $result3 = mysqli_stmt_get_result($stmt1);
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
  <link rel="stylesheet" href="../css/comphome.css" />

</head>

<body>
  <style>
    .list-group-item:first-child::before {

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


    <?php {

    ?>


    <?php require_once "companysection.php"; ?>
    <div class="col-lg-9">
      <div class="card mb-4">
        <div class="card-body">

          <form class="sign-in pt-4 " method="post" action="../includes/comhome-inc.php" style=" margin-top: -4%;">





            <?php
      $checked_arr = array();
      $j = 0;
      if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0 || mysqli_num_rows($result3) > 0) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
            $checked_arr[$j][0] = $row['id'];
            $checked_arr[$j][1] = $row['title'];
            $checked_arr[$j][2] = $row['AnnouncemnetDate'];
            $checked_arr[$j][3] = $row['department'];
            $checked_arr[$j][4] = $row['full_partTime'];
            $checked_arr[$j][5] = $row['indoor_outdoor'];
            $checked_arr[$j][6] = $row['age'];
            $checked_arr[$j][7] = $row['YearsOfExperince'];

            $j++;
          }
            ?>
            <div><label style=" font-weight:bold;color:#088cc8;margin-top:3%;">Job announcements</label></div>
            <table style="   border: 1px solid black; width:100%">
              <tr>
                <th style=" text-align:center;border: 1px solid; ;"> Job id</th>

                <th style=" text-align:center;border: 1px solid; ;">Job title</th>
                <th style=" text-align:center;border: 1px solid;">Announcemnet Date</th>
                <th style="text-align:center; border: 1px solid; ">department</th>
                <th style="text-align:center; border: 1px solid;">full_partTime</th>
                <th style="text-align:center; border: 1px solid ;">indoor_outdoor</th>
                <th style="text-align:center; border: 1px solid ;">age</th>
                <th style="text-align:center; border: 1px solid ;">Years Of Experince</th>
              </tr>





              <?php
          $r = 1;

          foreach ($checked_arr as $subAray) {
              ?>

              <tr>

                <td style=" text-align:center;  border: 1px solid black; ">
                  <?php echo $subAray[0]; ?>
                </td>
                <td style="  text-align:center; border: 1px solid black; ">
                  <?php echo $subAray[1]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[2]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[3]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[4]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[5]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[6]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[7]; ?>
                </td>



              </tr>

              <?php
            $r++;
          }
              ?>
            </table>
            <div><label style=" font-weight:bold;margin-top:3%;">job id </label></div>
            <select style="
    margin-right: 80%;
   
    height: 40%;
   " name="job">
              <?php



          foreach ($checked_arr as $subAray) {

              ?>
              <option value="<?php echo $subAray[0]; ?>">
                <?php echo $subAray[0]; ?>
              </option>

              <?php
            // close while loop 
          }
              ?>
            </select>
            <div style="margin-left: 9%;
    margin-top: -4%;">
              <button type="submit" style="margin-right:4%;" class="btn btn-primary   rounded-pill" name="submit11">view
                requests</button>
              <button type="submit" style="margin-right:4%" class="btn btn-primary   rounded-pill"
                name="submit21">search for employees</button>
              <button type="submit" style="margin-right:4%" class="btn btn-primary   rounded-pill"
                name="submit1">Delete</button>
            </div>


            <?php
        }
            ?>


            <?php
        $checked_arr = array();
        $j = 0;
        if (mysqli_num_rows($result1) > 0) {

          while ($row = mysqli_fetch_assoc($result1)) {

            $checked_arr[$j][0] = $row['id'];
            $checked_arr[$j][1] = $row['title'];
            $checked_arr[$j][2] = $row['AnnouncementDate'];
            $checked_arr[$j][3] = $row['period'];
            $checked_arr[$j][4] = $row['age'];
            $checked_arr[$j][5] = $row['StartingDate'];


            $j++;
          }
            ?>
            <hr style='margin-top: 45px;'>
            <div><label style=" font-weight:bold;color:#088cc8;margin-top:3%;">Internships announcements</label></div>
            <table style="   border: 1px solid black; width:100% ">
              <tr>
                <th style=" text-align:center;border: 1px solid; ;"> Internship id</th>

                <th style=" text-align:center;border: 1px solid; ;">Internship title</th>
                <th style=" text-align:center;border: 1px solid;">Announcemnet Date</th>
                <th style="text-align:center; border: 1px solid; ">period</th>
                <th style="text-align:center; border: 1px solid;">age</th>
                <th style="text-align:center; border: 1px solid ">Starting Date</th>

              </tr>





              <?php
          $r = 1;

          foreach ($checked_arr as $subAray) {
              ?>

              <tr>

                <td style=" text-align:center;  border: 1px solid black; ">
                  <?php echo $subAray[0]; ?>
                </td>
                <td style="  text-align:center; border: 1px solid black; ">
                  <?php echo $subAray[1]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[2]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[3]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[4]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[5]; ?>
                </td>




              </tr>

              <?php
            $r++;
          }
              ?>
            </table>
            <div><label style=" font-weight:bold;margin-top:3%;">internship id</label></div>
            <select style="
    margin-right: 80%;
   
    height: 40%;
   " name="intern">
              <?php



          foreach ($checked_arr as $subAray) {

              ?>
              <option value="<?php echo $subAray[0]; ?>">
                <?php echo $subAray[0]; ?>
              </option>

              <?php
            // close while loop 
          }
              ?>
            </select>
            <div style="margin-left: 13%;
    margin-top: -4%;">
              <button type="submit" style="margin-right:4%;" class="btn btn-primary   rounded-pill" name="submit12">view
                requests</button>
              <button type="submit" style="margin-right:4%;" class="btn btn-primary   rounded-pill"
                name="submit2">Delete</button>
            </div>
            <?php
        }
            ?>


            <?php
        $checked_arr = array();
        $j = 0;
        if (mysqli_num_rows($result3) > 0) {

          while ($row = mysqli_fetch_assoc($result3)) {
            $checked_arr[$j][0] = $row['id'];
            $checked_arr[$j][1] = $row['task'];
            $checked_arr[$j][2] = $row['AnnouncementDate'];
            $checked_arr[$j][3] = $row['field'];



            $j++;
          }
            ?>
            <hr style='margin-top: 45px;'>
            <div><label style=" font-weight:bold;color:#088cc8;margin-top:3%;">Freelnace announcements</label></div>
            <table style="   border: 1px solid black; width:100%">
              <tr>
                <th style=" text-align:center;border: 1px solid; ;"> FreeLance id</th>

                <th style=" text-align:center;border: 1px solid; ;">task</th>
                <th style=" text-align:center;border: 1px solid;">Announcemnet Date</th>
                <th style="text-align:center; border: 1px solid; ">field</th>


              </tr>






              <?php
          $r = 1;

          foreach ($checked_arr as $subAray) {
              ?>

              <tr>

                <td style=" text-align:center;  border: 1px solid black; ">
                  <?php echo $subAray[0]; ?>
                </td>
                <td style="  text-align:center; border: 1px solid black; ">
                  <?php echo $subAray[1]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[2]; ?>
                </td>
                <td style=" text-align:center;  border: 1px solid black;">
                  <?php echo $subAray[3]; ?>
                </td>





              </tr>

              <?php
            $r++;
          }
              ?>
            </table>
            <div><label style=" font-weight:bold;margin-top:3%;">Freelnace id</label></div>
            <select style="
    margin-right: 80%;
   
    height: 40%;
   " name="free">
              <?php



          foreach ($checked_arr as $subAray) {

              ?>
              <option value="<?php echo $subAray[0]; ?>">
                <?php echo $subAray[0]; ?>
              </option>

              <?php
            // close while loop 
          }
              ?>
            </select>

            <div style="margin-left: 13%;
    margin-top: -4%;">
              <button type="submit" style="margin-right:4%;" class="btn btn-primary   rounded-pill" name="submit13">view
                requests</button>

              <button type="submit" style="margin-right:4%;" class="btn btn-primary   rounded-pill"
                name="submit3">Delete</button>
            </div>
            <?php
        }
      } else {
        echo "<div><img src='../img/comp.png'></div>";
      }
            ?>
          </form>

        </div>

      </div>
    </div>


    <?php
    }
    ?>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js.map"></script>

</body>

</html>