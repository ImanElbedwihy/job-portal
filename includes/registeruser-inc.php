<?php

if (isset($_POST['submit'])) {
    //Add database connection
    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['repeatedpassword'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $radioVal = $_POST["inlineRadioOptions"];
    $email=$_POST["email"];
$flag=1;
if($radioVal == "option1")
{
    $gender="male";
}
else if ($radioVal == "option2")
{
    $gender="female";
}

    if (empty($username) || empty($password) || empty($confirmPass)) {
        header("Location: ../php/user_signup.php?error=emptyfields&username=".$username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        header("Location: ../php/user_signup.php?error=invalidusername&username=".$username);
        exit();
    } elseif($password !== $confirmPass) {
        header("Location: ../php/user_signup.php?error=passwordsdonotmatch&username=".$username);
        exit();
    }

    else {
        $sql = "SELECT UserName FROM user WHERE UserName = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/user_signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: ../php/user_signup.php?error=usernametaken");
                exit();
            } else {
                $sql = "INSERT INTO user (UserName,pass,email,flag) VALUES (?, ?,?,?)";
                $sql1 = "INSERT INTO jobseeker (UserName, Fname ,Lname,age,gender) VALUES (?, ?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                //||!mysqli_stmt_prepare($stmt, $sql1)
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../php/user_signup.php?error=sqlerror");
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
                    header("Location: ../php/user_signup.php?error=sqlerror");
                    exit();
                } else {
                    /// $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    //  mysqli_stmt_bind_param($stmt, "sss", $username, $password,$email);
                    mysqli_stmt_bind_param($stmt, "sssis", $username, $fname, $lname, $age, $gender);
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
                                $_SESSION['type'] = 1;

                                $_SESSION['sessionUser'] = $row['UserName'];
                                $_SESSION['sessionpassword'] = $row['pass'];
                                header("Location: ../php/profile.php?succes=registered");
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