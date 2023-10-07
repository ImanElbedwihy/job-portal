<?php
session_start();
require_once '../includes/database.php';

    if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==0) {
       
    } else {
  header("location:home.php");
  exit();
    }


$sql = "select * from admin where UserName=?";
$stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
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
 <?php require_once "adminnav.php";?>
 <?php require_once "adminsection.php";?>
 <div class="col">
          <div class="card mb-4">
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/admin-inc.php" style=" margin-top: -4%;">
  <?php if ($row = mysqli_fetch_assoc($result))
  
  {
    echo "<div style='margin:auto;'>";
?>

<img src="../img/admin.png" alt="" style="   width: 17%;
">
<?php



echo "<label style='display:inline;'>";
    $t = $row['Fname'];
    $t1 = $row['Lname'];
    $t2 = $t . " " . $t1;
    echo"<b style='font-size: xx-large;margin-left:4%;'> $t2</b>";
   
    echo "</label>";
    echo "</div>";
  

  }
  
  
  ?>

<div class="form-floating" style="width:50%; margin-top:40px; ">
                    <div><label style="font-weight: bolder;">First Name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="fname" value="<?php  echo $row['Fname'] ?>">

                  </div>


                  <div class="form-floating " style=" width:50%;margin-top:20px">
                    <div><label style="font-weight: bolder;">Last Name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="lname" value="<?php  echo $row['Lname'] ?>">

                  </div>
                
                <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px;">Save </button></div>



   
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