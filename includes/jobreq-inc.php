<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit1'])) {

        require 'database.php';
        $_SESSION['jobseeker'] = $_POST['submit1'];
        header("Location:../php/viewprofile.php");
        exit();


    }

    if (isset($_POST['submit'])) {

        require 'database.php';
        $user = $_POST['submit'];
        $_SESSION['jobseeker'] = $_POST['submit'];
        $sql = "UPDATE  applyforjob set IsAccepted=? where JobSeekerUserName=? and JobId =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/jobrequests.php?error=sqlerror");
            exit();
        } else {
            $r = 1;
            mysqli_stmt_bind_param($stmt, "iss", $r,$user,$_SESSION['jobid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/setinterview.php?succes");
            exit();

        }
    }


     if (isset($_POST['submit2'])) {

        require 'database.php';
        $user = $_POST['submit2'];
        $_SESSION['jobseeker'] = $_POST['submit2'];
        $sql = "UPDATE  applyforjob set IsAccepted=? where JobSeekerUserName=? and JobId =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/jobrequests.php?error=sqlerror");
            exit();
        } else {
            $r = -1;
            mysqli_stmt_bind_param($stmt, "iss", $r,$user,$_SESSION['jobid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/feedback.php?succes");
            exit();

        }
    }

    if (isset($_POST['submit11111']))

    {
        require 'database.php';
        $user = $_POST['submit11111'];
        $_SESSION['jobseeker'] = $_POST['submit11111'];
        $sql = "UPDATE  applyforintern set IsAccepted=? where JobSeekerUserName=? and internId =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/internrequest.php?error=sqlerror");
            exit();
        } else {
            $r = 1;
            mysqli_stmt_bind_param($stmt, "iss", $r,$user,$_SESSION['internid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/internrequest.php?succes");
            exit();

        }



    }

    if (isset($_POST['submit222222'])){



        require 'database.php';
        $user = $_POST['submit222222'];
        $_SESSION['jobseeker'] = $_POST['submit222222'];
        $sql = "UPDATE  applyforintern set IsAccepted=? where JobSeekerUserName=? and internId =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/internrequest.php?error=sqlerror");
            exit();
        } else {
            $r = -1;
            mysqli_stmt_bind_param($stmt, "iss", $r,$user,$_SESSION['internid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/internrequest.php?succes");
            exit();

        }


    }

    if (isset($_POST['submitl']))
    {

        require 'database.php';
        $user = $_POST['submitl'];
        $_SESSION['jobseeker'] = $_POST['submitl'];
        $sql = "UPDATE  applyforfreelance set IsAccepted=? where JobSeekerUserName=? and freelanceID =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/freelancerequest.php?error=sqlerror");
            exit();
        } else {
            $r = 1;
            mysqli_stmt_bind_param($stmt, "iss", $r,$user,$_SESSION['freeid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/contract.php?succes");
            exit();

        }

    }


    if (isset($_POST['submip']))
    {
        require 'database.php';
        $user = $_POST['submip'];
        $_SESSION['jobseeker'] = $_POST['submip'];
        $sql = "UPDATE  applyforfreelance set IsAccepted=? where JobSeekerUserName=? and freelanceID =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/freelancerequest.php?error=sqlerror");
            exit();
        } else {
            $r = -1;
            mysqli_stmt_bind_param($stmt, "iss", $r,$user,$_SESSION['freeid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/freelancerequest.php?succes");
            exit();

        }


    }

    if (isset($_POST['offer']))
    {
        require 'database.php';
        $user = $_POST['offer'];
        $_SESSION['jobseeker'] = $_POST['offer'];
        header("Location: ../php/offer.php?succes");
            exit();

    }

}
?>