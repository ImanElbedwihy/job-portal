<?php
session_start();
require_once '../includes/database.php';
if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==1) {
       
} else {
header("location:home.php");
exit();
}
$sql = "select * from experience where UserName=?";
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
<!-- saved from url=(0112)file:///C:/Users/sggln/OneDrive/Desktop/MDB5-STANDARD-UI-KIT-Free-6.0.0/Material%20Design%20for%20Bootstrap.html -->
<html lang="en" style="
    overflow: scroll;
">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Experience</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../css/experience.css" />
  <link rel="stylesheet" href="../css/mdb.min.css" />

</head>

<body>

  <!-- Start your project here-->
  <section style="background-color: #eee;">
  <?php  require_once"nav.php";?>

<?php  require_once"section.php";?>


        <div class="col-lg-9">
          <div class="card mb-4">
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/experience-inc.php"
                style=" margin-top: -4%;">


                <div >

                  <div class="form-floating " style="margin-top:2%;">
                    <div><label style="font-weight: bolder;">Company</label></div>
                    <input type="text" id="floatingInput" 
                      name="company"style="width:70%;height:38px" value="" required>

                  </div>
                </div>
                <div>

                  <div class="form-floating "   style="margin-top:2%;">
                    <div><label style="font-weight: bolder;">Job Title</label></div>
                    <input type="text" id="floatingInput" 
                      name="job" value="" style="width:70%;height:38px" required>

                  </div>
                </div>

                <div class="form-floating "   style="margin-top:2%;">
                    <div><label style="font-weight: bolder;">Years</label></div>
                    <input type="number"  id="floatingInput" 
                      name="year"  min="0" style="width:70%;height:38px" required value="">
                      <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px;">ADD</button></div>

                  </div>
               

                <hr>
          
                </form>
         

      


              <form class="sign-in pt-4 " method="post" action="../includes/experience-inc.php"
                style=" margin-top: -4%;">

                <?php
                $checked_arr = array();
                $j=0;
        if(mysqli_num_rows($result) > 0)
        {

                  while ($row = mysqli_fetch_assoc($result)) {

                    $checked_arr[$j][0] = $row['jobtitle'];
                    $checked_arr[$j][1] = $row['company'];
                    $checked_arr[$j][2] = $row['years'];
                    $j++;
                  }
           ?>
        <table style="   border: 1px solid black; width:100%">
        <tr>
        <th style=" text-align:center;border: 1px solid; width:5%;" >Number</th>
          <th style=" text-align:center;border: 1px solid; width:40%;" >Job Title</th>
          <th style="text-align:center; border: 1px solid; width:40%;">Company</th>
          <th style="text-align:center; border: 1px solid ;width:15%;">Yaers of Experience</th>
        </tr>
      
        
     
      <?php 
    }
?>


<?php
$r = 1;

        foreach ($checked_arr as $subAray)
        {
            ?>

            <tr>
            <td style=" text-align:center;  border: 1px solid black; "><?php echo $r; ?></td>
                <td style=" text-align:center;  border: 1px solid black; "><?php echo $subAray[0]; ?></td>
                <td style="  text-align:center; border: 1px solid black; "><?php echo $subAray[1]; ?></td>
                <td style=" text-align:center;  border: 1px solid black;"><?php echo $subAray[2]; ?></td>
                

               
            </tr>
        
            <?php
  $r++;
        }
        ?>
 </table>
   
<div style="margin-top: 7%;">
                   <label style="font-weight: bolder; margin-top: 13px;" <?php   echo ($r==1) ? 'hidden':''?>>Number of experience to delete</label>
                    <input type="number"  id="floatingInput" 
                      name="number"  min="1"  max=<?php echo($r-1)?> style="width:20%;height:38px" value=""  <?php   echo ($r==1) ? 'hidden':''?>></div>
                      <button type="submit" class="btn btn-primary btn-lg  rounded-pill"  style="margin-top:9px;"name="submit1"
                    style="margin-top:33px;"  <?php   echo ($r==1) ? 'hidden':''?>>DELETE</button>

                  
              </form>
         

            </div>
          
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