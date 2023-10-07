<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {



    require_once "database.php";


    if (isset($_POST['submit1'])) {


        $JobId = $_POST['jobid'];


        $sql = "UPDATE offer set Isaccepted=1  WHERE JobSeekerUserName =? and JobId =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/contractsoffer.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "si", $_SESSION['sessionUser'], $JobId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            header("Location: ../php/contractsoffer.php?success");
            exit();

        }
    }

    if (isset($_POST['submit2'])) {


        $JobId = $_POST['jobid'];


        $sql1 = "UPDATE offer set Isaccepted=-1  WHERE JobSeekerUserName =? and JobId =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql1)) {
            header("Location: ../php/contractsoffer.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "si", $_SESSION['sessionUser'], $JobId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            header("Location: ../php/contractsoffer.php?success");
            exit();

        }
    }

    if (isset($_POST['submit3'])) {


        $id = $_POST['cid'];


        $sql3 = "UPDATE contract set Isaccepted=1  WHERE id =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql3)) {
            header("Location: ../php/contractsoffer.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            header("Location: ../php/contractsoffer.php?success");
            exit();

        }
    }

    if (isset($_POST['submit4'])) {


        $id = $_POST['cid'];


        $sql4 = "UPDATE contract set Isaccepted=-1  WHERE id =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql4)) {
            header("Location: ../php/contractsoffer.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            header("Location: ../php/contractsoffer.php?success");
            exit();

        }
    }


}

?>