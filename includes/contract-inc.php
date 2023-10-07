<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {








    if (isset($_POST['submit'])) {

        require 'database.php';
        $date = $_POST['dead'];
        $m=$_POST['money'];
        $radioVal = $_POST["inlineRadioOptions"];
        if($radioVal == "option1")
    {
        $g="per hour";
    }
    else if ($radioVal == "option2")
    {
        $g="per week";
    }

    else if ($radioVal == "option3")
    {
        $g="per month";
    }

    else if ($radioVal == "option4")
    {
        $g="per year";
    }
        $sql = "DELETE FROM contract where JobseekerUserName=? and FreelanceId=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/contract.php?error=sqlerror");
            exit();
        } else {
         
            mysqli_stmt_bind_param($stmt, "si",$_SESSION['jobseeker'], $_SESSION['freeid']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            $sql = "INSERT INTO contract ( JobseekerUserName,FreelanceId ,deadline,money,IsAccepted,paymentInterval	) values (?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../php/contract.php?error=sqlerror");
                exit();
            } else {
                $r = 0;
                mysqli_stmt_bind_param($stmt, "sisiis",$_SESSION['jobseeker'], $_SESSION['freeid'],$date,$m,$r,$g);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../php/contract.php?succes");
                exit();

            }
        }
    }
}
?>