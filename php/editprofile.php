<?php
session_start();
require_once '../includes/database.php';

    if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==1)
     {
       
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
  <title>Genral Info</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  
  <link rel="stylesheet" href="../css/mdb.min.css" />
  <link rel="stylesheet" href="../css/editProfile.css" />
 
</head>

<body>

  <!-- Start your project here-->
  <section style="background-color: #eee;">
 
  <?php  require_once"nav.php";?>
 <?php  require_once"section.php";?>

        <?php   
	if($row = mysqli_fetch_assoc($result)){
		
		?> 
	
		
	
        <div class="col-lg-9">
          <div class="card mb-4" >
            <div class="card-body">


              <form class="sign-in pt-4 " method="post" action="../includes/editprofile-inc.php"  style=" margin-top: -4%;">
                <div style="width: 50% ;display: -webkit-inline-box; margin-bottom: -8px">

                  <div class="form-floating ">
                    <div><label style="font-weight: bolder;">First Name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="fname" value="<?php  echo $row['Fname'] ?>">

                  </div>


                  <div class="form-floating " style=" margin-left: 6%;">
                    <div><label style="font-weight: bolder;">Last Name </label></div>
                    <input type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="lname" value="<?php  echo $row['Lname'] ?>">

                  </div>
                </div>


                <div class="form-outline" style=" height: 44px;  margin-bottom: -8px ">
                  <div><label style="font-weight: bolder;">Age </label></div>
                  <input type="number" id="typeNumber" class="form-control" name="age" required
                    style="width:37%;   border: 1px solid #bdbdbd;" name="age" value="<?php  echo $row['age'] ?>">
                </div>

                <div style="margin-bottom: 2%;  margin-bottom: 6px">
                  <div><label style="font-weight: bolder; margin-top: 10%;">Gender </label></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                      value="option1" required    <?php echo ($row['gender']=='male')?'checked':'' ?>>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>

                  <div class="form-check form-check-inline" style="margin-left: 25%;  margin-bottom: -8px">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                      value="option2" required <?php echo ($row['gender']=='female')?'checked':'' ?>>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
                </div>

                <div style="width: 50% ;display: -webkit-inline-box; margin-bottom: -8px">

                  <div class="form-floating ">
                    <div><label style="font-weight: bolder;">Address</label></div>
                    <input type="text" class="form-control" id="floatingInput" style="     width: 158%; height: 17%;" name="address" value="<?php  echo $row['addres'] ?>">

                  </div>





                </div>
                <div style="width: 50% ;display: -webkit-inline-box; margin-bottom: -8px">

                  <div class="form-floating ">
                    <div><label style="font-weight: bolder;">Mobile</label></div>
                    <input type="tel" class="form-control" id="floatingInput" style="     width: 158%; height: 17%;"
                      pattern="[0-9]{11}" name="moblile" value="<?php  echo $row['mobile'] ?>">
                    <small>Format: 01287643197</small>

                  </div>

                </div>
                <div style="margin-bottom: 2%;">
                  <div><label style="font-weight: bolder; margin-top: 6%;">What is your current education level? </label></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio11"
                      value="option1" <?php echo ($row['GraduationFlag']=='student')?'checked':'' ?> >
                    <label class="form-check-label" for="inlineRadio11">Student</label>
                  </div>

                  <div class="form-check form-check-inline" style="margin-left: 25%; ">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio22"
                      value="option2" <?php echo ($row['GraduationFlag']=='graduted')?'checked':'' ?> >
                    <label class="form-check-label" for="inlineRadio22">Graduated</label>
                  </div>
                </div>
                <div style="margin-bottom: 2%;">
                  <div><label style="font-weight: bolder; margin-top: 6%;">What is your current status? </label></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio111"
                      value="option1" <?php echo ($row['WorkFlag']=='employed')?'checked':'' ?>>
                    <label class="form-check-label" for="inlineRadio111">Employed</label>
                  </div>

                  <div class="form-check form-check-inline" style="margin-left:25%; ">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio222"
                      value="option2" <?php echo ($row['WorkFlag']=='unemployed')?'checked':'' ?> >
                    <label class="form-check-label" for="inlineRadio222">Unemployed</label>
                  </div>
                </div>

                <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px;">Save</button></div>



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
  <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
   <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</body>

</html>