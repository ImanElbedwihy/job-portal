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
  <title>Upload CV</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../css/uploadcv.css" />
  <link rel="stylesheet" href="../css/mdb.min.css" />

</head>

<body>

  <!-- Start your project here-->
  <section style="background-color: #eee;">
   
    <?php  require_once"nav.php";?>

<?php  require_once"section.php";?>
<div class="col-lg-9">
          <div class="card mb-4" >
            <div class="card-body">


            <form action="../includes/uploadcv-inc.php" method="post" enctype="multipart/form-data">
            <p style="font-weight:bold ;"> Select CV File to Upload(pdf):</p>
    <input type="file" name="file" required>
    <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px;">Upload</button></div>


                    <?php

                    if ($row = mysqli_fetch_assoc($result)) {
                      if ($row['IsUploaded'] == 1) {
                       
                        echo "your cv is already uploaded";
                        $imageURL = '../includes/uploads/' . $row["UserName"].'.pdf';

                    ?>
                
                                <a href="<?php echo $imageURL ?>">Your CV</a>
               
<?php
              }



            }
            
            
            ?>
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