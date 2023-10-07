<?php
session_start();
if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {
    if (isset($_POST['submit'])) {
        //Add database connection
        require 'database.php';

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $username = $_POST['username'];

        $flag = 0;



        if (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
            header("Location: ../php/addadmin.php?error=invalidusername");
            exit();
        } else {
            $sql = "SELECT UserName FROM user WHERE UserName = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/addadmin.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if ($rowCount > 0) {
                    header("Location: ../php/addadmin.php?error=usernametaken");
                    exit();
                } else {
                    $sql1 = "INSERT INTO user (UserName,pass,email,flag) VALUES (?, ?,?,?)";
                    $sql2 = "INSERT INTO admin (UserName,Fname,Lname) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    //||!mysqli_stmt_prepare($stmt, $sql1)
                    if (!mysqli_stmt_prepare($stmt, $sql1)) {
                        header("Location: ../php/addadmin.php?error=sqlerror1");
                        exit();
                    } else {
                        /// $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sssi", $username, $password, $email, $flag);
                        // mysqli_stmt_bind_param($stmt, "sssis", $username, $fname,$lname,$age,$gender);
                        mysqli_stmt_execute($stmt);
                        //  header("Location: ../php/profile.php?succes=registered");
                        // exit();
                    }
                    if (!mysqli_stmt_prepare($stmt, $sql2)) {
                        header("Location: ../php/addadmin.php?error=sqlerror2");
                        exit();
                    } else {
                        /// $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                        //  mysqli_stmt_bind_param($stmt, "sss", $username, $password,$email);
                        mysqli_stmt_bind_param($stmt, "sss", $username, $fname, $lname);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);

                        header("Location: ../php/addadmin.php?success");
                        exit();


                    }
                }
            }
        }
    }

}


?>