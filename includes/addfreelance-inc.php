<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $task = $_POST['task'];
        $field = $_POST['field'];
       
        $sql = "SELECT * from freelance  WHERE CompanyUserName=? AND AnnouncementDate=? and task =? and field=?   ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/addfreelance.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['sessionUser'], $d, $task, $field );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $rowCount = mysqli_stmt_num_rows($stmt);
            if ($rowCount == 0)
             {
                $sql = "INSERT INTO freelance  (CompanyUserName,AnnouncementDate,task,field)  VALUES(?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../php/addfreelance.php?error=sqlerror");
                    exit();
                } else {
                    $d = date("Y-m-d");

                    mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['sessionUser'], $d, $task, $field);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    header("Location: ../php/addfreelance.php?success=saved");




                }


            }
            header("Location: ../php/addfreelance.php?alreadyexists");
        }
    }
}
?>