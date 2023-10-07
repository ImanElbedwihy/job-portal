<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';

        $title = $_POST['title'];
        $age = $_POST['age'];
        $exp = $_POST['exp'];
        $dep = $_POST['del'];
        $describ= $_POST['desc'];
        $radioVal = $_POST["inlineRadioOptions2"];
        if ($radioVal == "option1") {
            $door = "In-door";
        } else if ($radioVal == "option2") {
            $door = "Out-door";
        }
        ///
        $radioVal1 = $_POST["inlineRadioOptions1"];
        if ($radioVal1 == "option1") {
            $time = "Part time";
        } else if ($radioVal1 == "option2") {
            $time = "Full time";
        }
        $sql = "SELECT * from job  WHERE CompanyUserName=?  and YearsOfExperince =? and age=? and indoor_outdoor=? and full_partTime=? and title=? and department=? and describition=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/addjob.php?error=sqlerror");
            exit();
        } else {
            $d = date("Y-m-d");
            mysqli_stmt_bind_param($stmt, "ssssssss", $_SESSION['sessionUser'], $exp, $age, $door, $time, $title, $dep,$describ);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $rowCount = mysqli_stmt_num_rows($stmt);
            if ($rowCount == 0) {

                $sql = "INSERT INTO job  (CompanyUserName,AnnouncemnetDate,YearsOfExperince,age,indoor_outdoor,	full_partTime,title,	department,describition)  VALUES(?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../php/addjob.php?error=sqlerror");
                    exit();
                } else {
                    $d = date("Y-m-d");

                    mysqli_stmt_bind_param($stmt, "sssssssss", $_SESSION['sessionUser'], $d, $exp, $age, $door, $time, $title, $dep,$describ);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);




                    $sql = "SELECT id from job  where CompanyUserName=? and AnnouncemnetDate=? and YearsOfExperince=? and age=? and indoor_outdoor=? and full_partTime=? and title=? and	department=? and describition=?  ";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../php/addjob.php?error=sqlerror");
                        exit();
                    } else {
                        $d = date("Y-m-d");

                        mysqli_stmt_bind_param($stmt, "sssssssss", $_SESSION['sessionUser'], $d, $exp, $age, $door, $time, $title, $dep,$describ);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_assoc($result);

                        $id = $row['id'];

                        $sql = "INSERT into requirments (JobId,requirment) VALUES (?,?) ";
                        $stmt = mysqli_stmt_init($conn);
                        $r1 = $_POST['r1'];
                        $r2 = $_POST['r2'];
                        $r3 = $_POST['r3'];
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../php/addjob.php?error=sqlerror");
                            exit();
                        } else {


                            mysqli_stmt_bind_param($stmt, "is", $id, $r1);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            if ($r2 != "" && $r2 != $r1) {

                                $sql = "INSERT into requirments (JobId,requirment) VALUES (?,?) ";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: ../php/addjob.php?error=sqlerror");
                                    exit();
                                } else {


                                    mysqli_stmt_bind_param($stmt, "is", $id, $r2);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_store_result($stmt);

                                    if ($r3 != "" && $r3 != $r1 && $r3 != $r2) {

                                        $sql = "INSERT into requirments (JobId,requirment) VALUES (?,?) ";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            header("Location: ../php/addjob.php?error=sqlerror");
                                            exit();
                                        } else {


                                            mysqli_stmt_bind_param($stmt, "is", $id, $r3);
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_store_result($stmt);








                                        }




                                    }


                                }
                            }


                            $q1 = $_POST['q1'];
                            $q2 = $_POST['q2'];
                            $q3 = $_POST['q3'];

                            $sql = "INSERT into questionnaire (JobId,number,text) VALUES (?,?,?) ";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql) || $q1 == ""){
                                header("Location: ../php/addjob.php?");
                                exit();
                            } else {

                                $r = 0;
                                mysqli_stmt_bind_param($stmt, "iis", $id, $r, $q1);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_store_result($stmt);

                                if ($q2 != "" && $q2 != $q1) {

                                    $sql = "INSERT into questionnaire (JobId,number,text) VALUES (?,?,?) ";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("Location: ../php/addjob.php?");
                                        exit();
                                    } else {
                                        $r = 1;

                                        mysqli_stmt_bind_param($stmt, "iis", $id, $r, $q2);
                                        mysqli_stmt_execute($stmt);
                                        mysqli_stmt_store_result($stmt);

                                        if ($r3 != "" && $r3 != $r1 && $r3 != $r2) {

                                            $sql = "INSERT into questionnaire (JobId,number,text) VALUES (?,?,?) ";
                                            $stmt = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                header("Location: ../php/addjob.php?");
                                                exit();
                                            } else { $r = 2;


                                                mysqli_stmt_bind_param($stmt, "iis", $id, $r, $q3);
                                                mysqli_stmt_execute($stmt);
                                                mysqli_stmt_store_result($stmt);








                                            }


                                        }
                                        header("Location: ../php/addjob.php?");
                                        exit();
                                    }
                                   
                                }
                            }
                           header("Location: ../php/addjob.php?");
                            exit() ;

                        }
                      
                    }

                   
                }
               
            }
            header("Location: ../php/addjob.php?error=already-exits");
            exit() ;
        }
    }
    }

?>