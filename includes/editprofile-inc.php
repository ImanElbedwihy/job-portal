<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) 
{






if (isset($_POST['submit'])) 
{

    require 'database.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age =$_POST['age'];
    $addres=$_POST['address'];
    $mobile=$_POST['moblile'];
    $radioVal = $_POST["inlineRadioOptions"];
    if($radioVal == "option1")
{
    $gender="male";
}
else if ($radioVal == "option2")
{
    $gender="female";
}
///
$radioVal1 = $_POST["inlineRadioOptions1"];
if($radioVal1 == "option1")
{
$grad="student";
}
else if ($radioVal1 == "option2")
{
$grad="graduted";
}
//
$radioVal2 = $_POST["inlineRadioOptions2"];
if($radioVal2 == "option1")
{
$work="employed";
}
else if ($radioVal2 == "option2")
{
$work="unemployed";

}

$sql = "UPDATE  jobseeker SET  Fname=?,Lname=?,age=?,addres=?,mobile=?,gender=?,GraduationFlag=?,WorkFlag=? WHERE UserName = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../php/profileedit.php?error=sqlerror");
    exit();
} else {
  
    mysqli_stmt_bind_param($stmt, "ssissssss", $fname,$lname,$age,$addres,$mobile,$gender,$grad,$work,$_SESSION['sessionUser']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: ../php/editprofile.php?success=saved");

}
}
}
?>