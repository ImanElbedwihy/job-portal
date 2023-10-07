<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $name = $_POST['name'];
        $location = $_POST['location'];
$m=$_POST['moblile'];
        $sql = "UPDATE  company SET  Name=?,location=?,mobile=? WHERE UserName = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/companyprofile.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ssss", $name, $location,$m, $_SESSION['sessionUser']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/companyprofile.php?success=saved");

        }
    }



    if (isset($_POST['submit2'])) {

        require 'database.php';

        $dep = $_POST['dep'];

        $sql = "SELECT * from  departments WHERE UserName=? AND department=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/companyprofile.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $_SESSION['sessionUser'], $dep);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount == 0&&$dep!="") {

                $sql = "INSERT INTO departments (UserName,department) VALUES(?,?) ";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../php/companyprofile.php?error=sqlerror");
                    exit();
                } else {

                    mysqli_stmt_bind_param($stmt, "ss", $_SESSION['sessionUser'], $dep);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header("Location: ../php/companyprofile.php?success=saved");

                }
            } else {
                header("Location: ../php/companyprofile.php?");
                exit();
            }
        }
       
    }




    if (isset($_POST['submit1'])) {

        require 'database.php';

        
        $del = $_POST['del'];

        $sql = "DELETE FROM   departments  WHERE UserName=? AND department=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/companyprofile.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $_SESSION['sessionUser'],$del);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/companyprofile.php?success=saved");

        }
    }
}
?>