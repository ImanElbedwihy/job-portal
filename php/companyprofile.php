<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==2) {

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


$sql1 = "select * from departments where UserName=?";
$stmt1 = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt1, $sql1)) {


} else {
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['sessionUser']);
  mysqli_stmt_execute($stmt1);
  $dep = mysqli_stmt_get_result($stmt1);
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
  <title>profile</title>
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
    <?php require_once "compnav.php"; ?>
    <?php require_once "companysection.php"; ?>


    <?php
    if ($row = mysqli_fetch_assoc($result)) {

    ?>



<div class="col-lg-9">
          <div class="card mb-4" >
            <div class="card-body">


          <form class="sign-in pt-4 " method="post" action="../includes/comapnyedit-inc.php" style=" margin-top: -4%;">






            <div class="form-floating " style="width:70%;margin:auto;  margin-top:2%;margin-bottom:2%;">
              <div><label style="font-weight: bolder;">Company Name  &nbsp; &nbsp;&nbsp;  <img src="../img/name.png"  style="width:100px"alt="card-icon" class="css-1n3xte0"> </label></div>
              <input type="text" class="form-control" id="floatingInput" name="name" value="<?php echo $row['Name'] ?>">



            </div>





            <div class="form-floating " style="width:70%;margin:auto; margin-bottom:2%;">
           
              <div><label style="font-weight: bolder;">Location&nbsp; &nbsp;&nbsp;  <img src="../img/location.png"  style="width:100px"alt="card-icon" class="css-1n3xte0"></label></div>
              <input type="text" class="form-control" id="floatingInput" name="location"
                value="<?php echo $row['location'] ?>">

            </div>


            <div class="form-floating " style="width:70%;margin:auto; margin-bottom:2%;">
           
           <div><label style="font-weight: bolder;">Mobile&nbsp; &nbsp;&nbsp;  <img src="../img/mobile.png"  style="width:60px"alt="card-icon" class="css-1n3xte0"></label></div>
           <input type="tel" class="form-control" id="floatingInput" 
                      pattern="[0-9]{11}" name="moblile" value="<?php  echo $row['mobile'] ?>">
                    <small>Format: 01287643197</small>

         </div>

            <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
              style="margin-top:2%; display:block; margin-left:auto; margin-right:auto;">Save</button>

              <div class="form-floating " style="width:70%;margin:auto;  margin-top:2%;margin-bottom:2%;">
              <div><label style="font-weight: bolder;">Add Department &nbsp; &nbsp;&nbsp;  <img src="../img/dep.png"  style="width:120px"alt="card-icon" class="css-1n3xte0"> </label></div>
              <input type="text" class="form-control" id="floatingInput" name="dep">

            </div>

      <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit2"
              style="margin-top:2%; display:block; margin-left:auto; margin-right:auto;">ADD</button>
  



              <div style="margin-left:15%;"> <label style=" font-weight: bolder;">Delete Departement  &nbsp; &nbsp;&nbsp;  <img src="../img/del.png"  style="width:120px"alt="card-icon" class="css-1n3xte0"></label></div>
          
             <!-- <div style="margin-bottom: -29%;"><label style="font-weight:bold;">Departements</label></div> -->




              <select style="
    margin-right: 80%;
    margin-left:15%;
    height: 40%; " name="del">
                <?php



      while ($row = mysqli_fetch_assoc($dep)) {

                ?>
                <option value="<?php echo $row['department']; ?>">
                  <?php echo $row['department']; ?>
                </option>

                <?php
        // close while loop 
      }
                ?>
              </select>

              <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit1"
                style="margin-top:2%; display:block; margin-left:auto; margin-right:auto;">DELETE</button>

           







          </form>

        </div>
       

      </div>
    </div>


    <?php
    }
    ?>

  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>

</body>

</html>