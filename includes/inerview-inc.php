<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {








    if (isset($_POST['submit'])) {

        require 'database.php';
        $date = $_POST['interview'];
        $sql = "DELETE FROM interview where JobseekerUserName=? and JobId=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/setinterview.php?error=sqlerror");
            exit();
        } else {
         
            mysqli_stmt_bind_param($stmt, "si",$_SESSION['jobseeker'], $_SESSION['jobid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            $sql = "INSERT INTO interview ( JobseekerUserName,JobId ,date) values (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/setinterview.php?error=sqlerror");
                exit();
            } else {
                $r = 1;
                mysqli_stmt_bind_param($stmt, "sis",$_SESSION['jobseeker'], $_SESSION['jobid'],$date);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/setinterview.php?succes");
                exit();

            }
        }
    }
}
?>