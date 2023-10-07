<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $username = $_POST['submit'];
       
        $sql = "DELETE  from user  WHERE UserName=?   ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/viewcompanies.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "s", $username  );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/viewcompanies.php?sucess=deleted");

        }
    }

    if (isset($_POST['submit1']))
    {
        $_SESSION['company'] = $_POST['submit1'];
        header("Location: ../php/viewannouncements.php");
    }
      if (isset($_POST['submit2']))
    {
        $_SESSION['company'] = $_POST['submit2'];
        header("Location: ../php/compstat.php");
    }
    }

?>