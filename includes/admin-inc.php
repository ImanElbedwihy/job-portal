<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {



    require_once "database.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    if (isset($_POST['submit'])) {

        $sql = "UPDATE  admin SET  Fname=?,Lname=? WHERE UserName = ?";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/admin.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "sss", $fname, $lname, $_SESSION['sessionUser']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);




        }
        header("Location: ../php/admin.php?succes");
        exit();
    }


}


?>