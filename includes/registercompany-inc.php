<?php

if (isset($_POST['submit'])) {
    //Add database connection
    require 'database.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username=$_POST['username'];
    $flag=2;
  $mobile=  $_POST['moblile'];
    

    if (empty($name) || empty($email) || empty($password)) {
        header("Location: ../php/companysignup.php?error=emptyfields&username=".$username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $name)) {
        header("Location: ../php/companysignup.php?error=invalidusername&username=".$name);
        exit();
    } 
    

    else {
        $sql = "SELECT UserName FROM user WHERE UserName = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/companysignup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: ../php/companysignup.php?error=usernametaken");
                exit();
            } else {
                $sql = "INSERT INTO user (UserName,pass,email,flag) VALUES (?, ?,?,?)";
                $sql1 = "INSERT INTO company (UserName, Name,mobile ) VALUES (?, ?,?)";
                $stmt = mysqli_stmt_init($conn);
                //||!mysqli_stmt_prepare($stmt, $sql1)
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../php/companysignup.php?error=sqlerror");
                    exit();
                } else {
                    /// $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssi", $username, $password, $email, $flag);
                    // mysqli_stmt_bind_param($stmt, "sssis", $username, $fname,$lname,$age,$gender);
                    mysqli_stmt_execute($stmt);
                    //  header("Location: ../php/profile.php?succes=registered");
                    // exit();
                }
                if (!mysqli_stmt_prepare($stmt, $sql1)) {
                    header("Location: ../php/companysignup.php?error=sqlerror");
                    exit();
                } else {
                    /// $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    //  mysqli_stmt_bind_param($stmt, "sss", $username, $password,$email);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $name,$mobile);
                    mysqli_stmt_execute($stmt);
                    $sql = "SELECT * FROM user WHERE UserName = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../php/sign-in.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        if ($row = mysqli_fetch_assoc($result)) {
                            // $passCheck = password_verify($password, $row['Password']);
                            if ($row['pass'] != $password) {
                                header("Location: ../php/sign-in.php?error=wrongpass12");
                                exit();
                            } elseif ($row['pass'] == $password) {
                                session_start();
                                $_SESSION['type'] = 2;

                                $_SESSION['sessionUser'] = $row['UserName'];
                                $_SESSION['sessionpassword'] = $row['pass'];
                                header("Location: ../php/homecompany.php?succes=registered");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
  
}
?>