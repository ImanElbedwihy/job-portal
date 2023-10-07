<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $arr = $_POST['submit'];


        $id = $_POST['id'];
        $username = $_POST['username'];

       
        $sql = "DELETE  from feedback  WHERE jobseekerusername =? and jobid =?   ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/viewfeedbacks.php?error=sqlerror");
            exit();
        } else {
            
            mysqli_stmt_bind_param($stmt, "si", $username, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/viewfeedbacks.php?sucess=deleted");

        }
    }

}

?>