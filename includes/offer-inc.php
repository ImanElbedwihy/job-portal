<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser']) && isset($_SESSION['jobseeker']) ) {


    if (isset($_POST['submit'])) {

        require 'database.php';
        $money = $_POST['money'];
        $sql = "DELETE FROM offer where JobseekerUserName=? and JobId=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/offer.php?error=sqlerror");
            exit();
        } else {
         
            mysqli_stmt_bind_param($stmt, "si",$_SESSION['jobseeker'], $_SESSION['jobid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            $sql = "INSERT INTO offer ( JobseekerUserName,JobId ,date,salary,Isaccepted) values (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/offer.php?error=sqlerror");
                exit();
            } else {
                $r = 0;
                $d = date("Y-m-d");
                mysqli_stmt_bind_param($stmt, "sisii",$_SESSION['jobseeker'], $_SESSION['jobid'],$d,$money,$r);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/offer.php?succes");
                exit();

            }
        }
    }
}
?>