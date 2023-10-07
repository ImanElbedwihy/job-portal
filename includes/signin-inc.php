<?php

if (isset($_POST['submit'])) 
{

    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

 if (empty($username) || empty($password)) {
        header("Location: ../php/sign-in.php?error=emptyfields");
        exit();
    } else {
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
                if ($row['pass']!=$password) {
                    header("Location: ../php/sign-in.php?error=wrongpass12");
                    exit();
                } elseif ($row['pass']==$password) {
                    session_start();
                  
                    $_SESSION['sessionUser'] = $row['UserName'];
                    $_SESSION['sessionpassword'] = $row['pass'];
                    $_SESSION['type'] = $row['flag'];

                    if ($row['flag'] == 1)
                     {
                        header("Location: ../php/profile.php?success=loggedin");
                        exit();
                    }
                    elseif($row['flag'] == 2)
                    {
                       
                        header("Location: ../php/homecompany.php?success=loggedin");
                        exit();

                    }
                    elseif($row['flag'] == 0)
                    {
                       
                        header("Location: ../php/admin.php?success=loggedin");
                        exit();

                    }
                    
                } else {
                    header("Location: ../php/sign-in.php?error=wrongpass");
                    exit();
                }
            } else {
                header("Location: ../php/sign-in.php?error=nouser");
                exit();
            }
        }
    }}
    else    {
                header("Location: ../php/sign-in.php?error=accessforbidden");
                exit();
            }



?>