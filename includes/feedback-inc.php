<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])&&isset($_SESSION['jobseeker'])&&isset( $_SESSION['jobid']))
 {




    if (isset($_POST['submit'])) {

        require 'database.php';
        $f = $_POST['feed'];
        $sql = "DELETE FROM feedback where JobseekerUserName=? and JobId=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/feedback.php?error=sqlerror");
            exit();
        } else {
         
            mysqli_stmt_bind_param($stmt, "si",$_SESSION['jobseeker'], $_SESSION['jobid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            $sql = "INSERT INTO feedback ( JobseekerUserName,JobId ,date,text) values (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/feedback.php?error=sqlerror");
                exit();
            } else {
                $d = date("Y-m-d");
                mysqli_stmt_bind_param($stmt, "siss",$_SESSION['jobseeker'], $_SESSION['jobid'],$d,$f);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/feedback.php?succes");
                exit();

            }
        }
    }
}
exit();
?>