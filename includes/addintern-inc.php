<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $title = $_POST['title'];
        $age = $_POST['age'];
        $per= $_POST['per'];
        $date=$_POST['stdate'];
        $sql = "SELECT * from intern  WHERE CompanyUserName=? AND AnnouncementDate=? and period =? and age=? and StartingDate=? and title=?  ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/addintern.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION['sessionUser'], $d, $per, $age, $date, $title);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $rowCount = mysqli_stmt_num_rows($stmt);
            if ($rowCount == 0)
             {
                $sql = "INSERT INTO intern  (CompanyUserName,AnnouncementDate,period,age,StartingDate,title)  VALUES(?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../php/addintern.php?error=sqlerror");
                    exit();
                } else {
                    $d = date("Y-m-d");

                    mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION['sessionUser'], $d, $per, $age, $date, $title);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $sql = "SELECT id from intern  where CompanyUserName=? and AnnouncementDate=? and period=? and age=? and StartingDate=?  and title=?  ";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../php/addintern.php?error=sqlerror");
                        exit();
                    } else {
                        $d = date("Y-m-d");

                        mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION['sessionUser'], $d, $per, $age, $date, $title);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_assoc($result);

                        $id = $row['id'];

                        $sql = "INSERT into internskills (id,skill) VALUES (?,?) ";
                        $stmt = mysqli_stmt_init($conn);
                        $r1 = $_POST['r1'];
                        $r2 = $_POST['r2'];
                        $r3 = $_POST['r3'];
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../php/addintern.php?error=sqlerror");
                            exit();
                        } else {


                            mysqli_stmt_bind_param($stmt, "is", $id, $r1);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            if ($r2 != "" && $r2 != $r1) {

                                $sql = "INSERT into internskills (id,skill) VALUES (?,?) ";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: ../php/addintern.php?error=sqlerror");
                                    exit();
                                } else {


                                    mysqli_stmt_bind_param($stmt, "is", $id, $r2);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_store_result($stmt);

                                    if ($r3 != "" && $r3 != $r1 && $r3 != $r2) {

                                        $sql = "INSERT into internskills (id,skill) VALUES (?,?) ";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            header("Location: ../php/addintern.php?error=sqlerror");
                                            exit();
                                        } else {


                                            mysqli_stmt_bind_param($stmt, "is", $id, $r3);
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_store_result($stmt);



                                            header("Location: ../php/addintern.php?success=saved");




                                        }




                                    }
                                    header("Location: ../php/addintern.php?success=saved");
                                    exit();

                                }
                            }
                            header("Location: ../php/addintern.php?success=saved");
                            exit();
                        }
                    }
                }
              
            }
            header("Location: ../php/addintern.php?error=already-exist");
            exit();
        }
    }
}
?>