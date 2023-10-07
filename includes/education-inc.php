<?php
session_start();

if (isset($_POST['submit1']) && isset($_SESSION['sessionUser']))
 {
    require_once 'database.php';
    $sql1 = "UPDATE  jobseeker SET currentDegree= ?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?error=sqlerror");
        exit();
    } else {

        $e = "Bachelors Degree";
        mysqli_stmt_bind_param($stmt1, "ss",$e, $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);
        header("Location: ../php/education.php?success=saved");
          

       
            }
    }


    elseif (isset($_POST['submit2']) && isset($_SESSION['sessionUser']))
 {
    require_once 'database.php';
    $sql1 = "UPDATE  jobseeker SET currentDegree= ?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?error=sqlerror");
        exit();
    } else {

        $e = "Masters Degree";
        mysqli_stmt_bind_param($stmt1, "ss",$e, $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);
        header("Location: ../php/education.php?success=saved");


       
            }
    }

    elseif (isset($_POST['submit3']) && isset($_SESSION['sessionUser']))
 {
    require_once 'database.php';
    $sql1 = "UPDATE  jobseeker SET currentDegree= ?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?error=sqlerror");
        exit();
    } else {

        $e = "Doctorate Degree";
        mysqli_stmt_bind_param($stmt1, "ss",$e, $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);
        header("Location: ../php/education.php?success=saved");


       
            }
    }
    elseif (isset($_POST['submit4']) && isset($_SESSION['sessionUser']))
 {
    require_once 'database.php';
    $sql1 = "UPDATE  jobseeker SET currentDegree= ?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?error=sqlerror");
        exit();
    } else {

        $e = "High School";
        mysqli_stmt_bind_param($stmt1, "ss",$e, $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);
        header("Location: ../php/education.php?success=saved");


       
            }
    }
   else  if (isset($_POST['submit5']) && isset($_SESSION['sessionUser']))
 {
    require_once 'database.php';
    $sql1 = "UPDATE  jobseeker SET currentDegree= ?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?error=sqlerror");
        exit();
    } else {

        $e = "Vocational";
        mysqli_stmt_bind_param($stmt1, "ss",$e, $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);
        header("Location: ../php/education.php?success=saved");


       
            }
    }
    else if (isset($_POST['submit6']) && isset($_SESSION['sessionUser']))
 {
    require_once 'database.php';
    $sql1 = "UPDATE  jobseeker SET currentDegree= ?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?error=sqlerror");
        exit();
    } else {

        $e = "Diploma";
        mysqli_stmt_bind_param($stmt1, "ss",$e, $_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);
        header("Location: ../php/education.php?success=saved");


       
            }
    }



if (isset($_POST['submit7']) && isset($_SESSION['sessionUser'])) {
    require_once 'database.php';
    $field = $_POST['field'];
    $uni = $_POST['uni'];

    $sql1 = "UPDATE  jobseeker SET university= ?,field=?  WHERE UserName = ?";
    $stmt1 = mysqli_stmt_init($conn);


    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../php/education.php?success=saved");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt1, "sss",$uni,$field ,$_SESSION['sessionUser']);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);

        header("Location: ../php/education.php?success=saved");
    }



}
?>
