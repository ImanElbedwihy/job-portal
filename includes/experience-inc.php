<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $years = $_POST['year'];
        $comp = $_POST['company'];
        $field = $_POST['job'];


        $sql = "INSERT INTO  experience (UserName,jobtitle,company,years) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/experience.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "sssi", $_SESSION['sessionUser'], $field, $comp, $years);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/experience.php?success=saved");

        }
    }


    if (isset($_POST['submit1'])) {
        require 'database.php';

        $no = $_POST['number'];
        $no--;
        $sql = "select * from experience where UserName=?";
        $stmt = mysqli_stmt_init($conn);


        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/experience.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);


            $checked_arr = array(array(4));
            $j = 0;
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($j == $no)
                        break;

                    $j++;
                }



            }
            $sql1 = "DELETE FROM experience where UserName=? AND jobtitle=? AND company=? ";
            $stmt1 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                header("Location: ../php/experience.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt1, "sss", $_SESSION['sessionUser'], $row['jobtitle'], $row['company']);
                mysqli_stmt_execute($stmt1);
                $result = mysqli_stmt_get_result($stmt1);
                header("Location: ../php/experience.php?success=saved");
            }




        }
    }
}


?>