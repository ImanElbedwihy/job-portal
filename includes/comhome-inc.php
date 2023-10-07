<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {




    require 'database.php';

    if (isset($_POST['submit1'])) {


        $id = $_POST['job'];
        $sql = "UPDATE  job  set deleted=1 where id=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/homecompany.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/homecompany.php?success=saved");

        }
    }

    if (isset($_POST['submit2'])) {


        $id = $_POST['intern'];
        $sql = "UPDATE intern set deleted=1 where id=? ";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/homecompany.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/homecompany.php?success=saved");

        }
    }
}
if (isset($_POST['submit3'])) {


    $id = $_POST['free'];
    $sql = "UPDATE freelance set deleted=1 where id=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/homecompany.php?error=sqlerror");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header("Location: ../php/homecompany.php?success=saved");

    }
}



///////////////////////////view job requests

if (isset($_POST['submit11'])) {


    $id = $_POST['job'];
    $_SESSION['jobid'] = $id;

    header("Location: ../php/jobrequests.php?success=saved");
    exit();

}
////////////////////

if (isset($_POST['submit12'])) {


    $id = $_POST['intern'];
    $_SESSION['internid'] = $id;

    header("Location: ../php/internrequest.php?success=saved");
    exit();

}

if (isset($_POST['submit13'])) {


    $id = $_POST['free'];
    $_SESSION['freeid'] = $id;

    header("Location: ../php/freelancerequest.php?success=saved");
    exit();

}

if (isset($_POST['submit21'])) {


    $id = $_POST['job'];
    $_SESSION['jobid'] = $id;

    header("Location: ../php/viewpotentialemployess.php");
    exit();

}



?>