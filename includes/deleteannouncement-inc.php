<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {




    require 'database.php';

    if (isset($_POST['submit1'])) 
    {


        $id = $_POST['job'];
        $sql = "DELETE FROM job where id=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/viewannouncements.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "i",$id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/viewannouncements.php?success=saved");

        }
    }

        if (isset($_POST['submit2'])) {


            $id = $_POST['intern'];
            $sql = "DELETE FROM intern where id=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/viewannouncements.php?error=sqlerror");
                exit();
            } else {

                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/viewannouncements.php?success=saved");

            }
        }}
        if (isset($_POST['submit3']))   
         {


            $id = $_POST['free'];
            $sql = "DELETE FROM freelance where id=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/viewannouncements.php?error=sqlerror");
                exit();
            } else {

                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/viewannouncements.php?success=saved");

            }
        }




        
  
?>