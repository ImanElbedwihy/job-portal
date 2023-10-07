<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {



    require_once "database.php";

  
    if (isset($_POST['submit'])) {
  $id = $_POST['submit'];
        $sql = "INSERT into applyforjob ( JobSeekerUserName, JobId ,Date) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/profile.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "sis", $_SESSION['sessionUser'] ,$id,$d);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);


            $sql = "SELECT * FROM questionnaire where  JobId=?   ";
            $stmt = mysqli_stmt_init($conn);
          
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../php/profile.php?error=sqlerror");
              exit();
            } else {

                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $r3 = mysqli_stmt_get_result($stmt);
                $i = 0;
                while ($row11 = mysqli_fetch_assoc($r3)) 
                {
                    $checkbox1 = $_POST['ques'] ; 
                    $s = "INSERT into  answers (JobSeekerUserName,JobId,number	,text)  values(?,?,?,?) ";
                    $st = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($st, $s)) {
                        header("Location: ../php/profile.php?error=sqlerror");
                        exit();
                    } else {
                      

                        mysqli_stmt_bind_param($st, "siis", $_SESSION['sessionUser'], $id, $i, $checkbox1[$i]);
                        mysqli_stmt_execute($st);
                        mysqli_stmt_store_result($st);
                        $i++;
                    }
                }
                header("Location: ../php/profile.php?succes1");
                exit();
            }


        }
    }

    if (isset($_POST['submit1'])) {
        $id = $_POST['submit1'];
        $sql = "INSERT into applyforintern ( JobSeekerUserName, internID ,date) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/profile.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "sis", $_SESSION['sessionUser'] ,$id,$d);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/profile.php?succes");
            exit();
        }
    }

    if (isset($_POST['submit2'])) {
        $id = $_POST['submit2'];
        $sql = "INSERT into applyforfreelance ( JobSeekerUserName, freelanceID ,date) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/profile.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "sis", $_SESSION['sessionUser'] ,$id,$d);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../php/profile.php?succes0");
            exit();
        }
    }
}

?>