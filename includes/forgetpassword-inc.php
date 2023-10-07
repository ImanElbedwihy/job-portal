<?php


if ((isset($_POST['submit']))) {
    $email = $_POST['email'];
    $username = $_POST['username'];

    require 'database.php';
    $sql = "SELECT  * FROM  user WHERE UserName=? and email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/forgot_password.php?error=sqlerror");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {


            $pass = $row['pass'];


            $to = $email;
            $subject = "Password for job portal";
            $txt = "Your Password is $pass";
            $header = "from:jobportal@gmail.com";

            if(mail($email, $subject, $txt, $header))
            {
                header("Location: ../php/forgot_password.php?mailsent");
                exit();
            } else {
                header("Location: ../php/forgot_password.php?mailnotsent");
                exit();
            }



        } else {
            header("Location: ../php/forgot_password.php?error=nouser");
            exit();

        }





    }



}

?>