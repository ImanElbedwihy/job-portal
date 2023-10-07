<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])&&(isset($_POST['submit'])) )
 {
    if ($_SESSION['sessionpassword'] == $_POST['oldpassword']) 
    {
        
        if( $_POST['newpassword']== $_POST['confirmPassword']){
            require 'database.php';
        $sql = "UPDATE  user SET  pass=? WHERE UserName = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/changepassword.php?error=sqlerror");
            exit();
            } else {

                mysqli_stmt_bind_param($stmt, "ss",  $_POST['newpassword'], $_SESSION['sessionUser']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/changepassword.php?success=saved");
              

            }

        }
        else 
        {
         //  echo ("confirm password must be equal to new password");
           header("Location: ../php/changepassword.php?confiromnotequalnew");
            exit();
        }
    } else {
        //  echo ("wrong password");
        header("Location: ../php/changepassword.php?error=oldpasswordnotcorrect");
        exit();

    }
}
?>