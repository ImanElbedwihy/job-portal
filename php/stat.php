<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser']) && $_SESSION['type'] == 0) {

} else {
    header("location:home.php");
    exit();
}

$sql = "SELECT * FROM company  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $comp = mysqli_num_rows($result);

}

$sql = "SELECT * FROM jobseeker  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: viewcompany.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_num_rows($result);
}

$sql = "SELECT * FROM admin  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: viewcompany.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $admin = mysqli_num_rows($result);
}
$sql = "SELECT * FROM job  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $job = mysqli_num_rows($result);

}
$sql = "SELECT * FROM freelance  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $free = mysqli_num_rows($result);

}
$sql = "SELECT * FROM intern  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $intern = mysqli_num_rows($result);

}
$sql = "SELECT * FROM applyforintern where IsAccepted=1  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $appinter = mysqli_num_rows($result);

}

$sql = "SELECT * FROM applyforjob where IsAccepted=1  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $appjob = mysqli_num_rows($result);

}

$sql = "SELECT * FROM applyforfreelance where IsAccepted=1  ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $appfree = mysqli_num_rows($result);

}


$sql = "SELECT * FROM interview   ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $int = mysqli_num_rows($result);

}


$sql = "SELECT * FROM contract where IsAccepted=1";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $contract = mysqli_num_rows($result);

}

$sql = "SELECT * FROM offer where Isaccepted=1";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: stat.php?error=sqlerror");
    exit();
} else {

    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $offer = mysqli_num_rows($result);

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
    <title>Statistics</title>
    <!-- MDB icon -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link rel="stylesheet" href="../css/Profile.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var vr1 = parseInt('<?php echo $job; ?>');
            var vr2 = parseInt('<?php echo $free; ?>');
             var vr3 = parseInt('<?php echo $intern; ?>');
            var data = google.visualization.arrayToDataTable([
                ['catogry', 'count'],
                ['jobs ', vr1],
                ['freelance tasks', vr2],
                 ['internships', vr3]


            ]);

            var options = {
                title: 'Announcements percentage'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    var vr1 = parseInt('<?php echo $appjob; ?>');
            var vr2 = parseInt('<?php echo $appinter; ?>');
             var vr3 = parseInt('<?php echo $appfree; ?>');
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["people accepted in ", "number", { role: "style" } ],
        ["Jobs ", vr1, "#007bff"],
        ["Internships", vr2, "#ef5350"],
        ["Freelance tasks", vr3, "#66bb6a"]
       ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "number of people accepted ",
        width: 600,
        height: 400,
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
  
    
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
        .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
    </style>
    <!-- Start your project here-->
    <section style="background-color: #eee;">
        <?php require_once "adminnav.php"; ?>
        <?php require_once "adminsection.php"; ?>
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">




                    <form class="sign-in pt-4 " method="post" action="../includes/deletecompanies-inc.php"
                        style=" margin-top: -4%;">
                    
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa-solid fa-building"></i>
        <span class="count-numbers"><?php echo $comp ?></span>
        <span class="count-name">companies</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
     <i class="fa-regular fa-id-card"></i>
        <span class="count-numbers"><?php echo $user ?></span>
        <span class="count-name">job seekers</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
       <i class="fa-solid fa-user-gear"></i>
        <span class="count-numbers"><?php echo $admin ?></span>
        <span class="count-name">admins</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers"><?php echo $admin+$comp+$user ?></span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>
</div>
<hr>
                        <div id="piechart" style="width: 100%; height: 500px;"></div>
                        <hr>
                      <div id="barchart_values" style="width: 100%;margin-left:9%;"></div>
                      <hr>
  <div class="container" style ="margin-left:10%;">
   <div class="row">

   
    <div class="col-md-3">
      <div class="card-counter success">
   <i class="fa-brands fa-black-tie"></i>
        <span class="count-numbers"><?php echo $int ?></span>
        <span class="count-name">Interviews</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
       <i class="fa-solid fa-file-signature"></i>
        <span class="count-numbers"><?php echo $contract ?></span>
        <span class="count-name">Contracts</span>
      </div>
    </div>
    
     <div class="col-md-3">
      <div class="card-counter danger">
      <i class="fa-solid fa-money-check-dollar"></i>
        <span class="count-numbers"><?php echo $offer ?></span>
        <span class="count-name">Offers</span>
      </div>
    </div> 
  </div>
    </div>

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