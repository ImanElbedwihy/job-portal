<?php
session_start();
require_once '../includes/database.php';
if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==1) {
       
} else {
header("location:home.php");
exit();
}
$sql = "select * from jobseeker where UserName=?";
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
  <title>Education</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->

  <link rel="stylesheet" href="../css/mdb.min.css" />
  <link rel="stylesheet" href="../css/education.css" />


</head>

<body>

  <!-- Start your project here-->
  <section style="background-color: #eee;">
  

<?php  require_once"nav.php";?>

<?php  require_once"section.php";?>

        <div class="col-lg-9">
          <div class="card mb-4">
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/education-inc.php">
                <p style="font-weight:bold ;color:#088cc8; margin-bottom: -4px;">What's your current educational level?</p>
                <p">If you are currently studying, select your expected degree.</p>
                <?php   
	if($row = mysqli_fetch_assoc($result)){
		
		?> 
                <div class="super" style="display:flex;     display: flex; 
    height: 54px ;margin-bottom:2.5%;">
                  <div class="left" style=" width:40%;
  text-align: center;      background-color:<?php echo($row['currentDegree']=='Bachelors Degree') ? 'rgb(204, 230, 239)': '#eee' ?> ;">
                    <button type="submit" style="border-color:transparent;   background-color: transparent;   line-height: 41px;
" name="submit1"> Bachelor's Degree</button>

                  </div>

                  <div class="right" style=" width:40%; text-align: center; margin-left:2.5%;   background-color:<?php echo($row['currentDegree']=='Masters Degree') ? 'rgb(204, 230, 239)': '#eee' ?> ;">

                    <button type="submit" name="submit2" style="border-color:transparent;    background-color: transparent;   line-height: 41px;
"> Master's Degree</button>
                  </div>
                </div>
                <div class="super" style="display:flex;     display: flex; 
    height: 54px ;margin-bottom:2.5%;"   >
                  <div class="left" style=" width:40%;
  text-align: center; background-color:<?php echo($row['currentDegree']=='Doctorate Degree') ? 'rgb(204, 230, 239)': '#eee' ?> ;">
                    <button type="submit" name="submit3" style="border-color:transparent;   background-color: transparent;    line-height: 41px;
"> Doctorate Degree</button>

                  </div>

                  <div class="right" style=" width:40%;
  text-align: center ;margin-left:2.5%;background-color:<?php echo($row['currentDegree']=='High School') ? 'rgb(204, 230, 239)': '#eee' ?> ;">

                    <button type="submit" name="submit4" style="border-color:transparent ;  background-color: transparent;     line-height: 41px;
"> High School</button>
                  </div>
                </div>

                <div class="super" style="display:flex;     display: flex; 
    height: 54px;margin-bottom:2.5%; ">
                  <div class="left" style=" width:40%;
  text-align: center; background-color:<?php echo($row['currentDegree']=='Vocational') ? 'rgb(204, 230, 239)': '#eee' ?> ;">
                    <button type="submit" name="submit5" style="border-color:transparent;   background-color: transparent;    line-height: 41px;
"> Vocational</button>

                  </div>

                  <div class="right" style=" width:40%;
  text-align: center;margin-left:2.5%;background-color:<?php echo($row['currentDegree']=='Diploma') ? 'rgb(204, 230, 239)': '#eee' ?> ;">

                    <button type="submit" name="submit6" style="border-color:transparent;   background-color: transparent;    line-height: 41px;
"> Diploma</button>
                  </div>
                </div>
                <p style="font-weight:bold ;color:#088cc8;;; margin-bottom: -4px;">Degree Details</p>
                <div class="form-floating ">
                    <div><label style="font-weight: bolder;">Field of Study</label></div>
                    <input type="text"  id="floatingInput" style="     width: 81%; height: 38px;" name="field" value="<?php  echo $row['field'] ?>" placeholder="e.g.,Computer Enginering,Accounting">

                  </div>

                  <div class="form-floating ">
                    <div><label style="font-weight: bolder;">University/Institution</label></div>
                    <input type="text"  id="floatingInput" style="     width: 81%; height:38px" name="uni" value="<?php  echo $row['university'] ?>"  placeholder="e.g.,Cairo University,National Institute of Technology">

                  </div>
                  <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit7"
                    style="margin-top:33px;">Save</button></div>
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