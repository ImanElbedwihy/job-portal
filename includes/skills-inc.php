<?php
session_start();

if (isset( $_SESSION['sessionUser'])) 
{
if (isset($_POST['submit']) )
{

    require_once 'database.php';
    $sql1="DELETE FROM jobseekerskills WHERE UserName=?" ;
    $stmt1 = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt1, $sql1)) {
    header("Location: ../php/skills.php?error=sqlerror");
    exit();
} else {
  
    mysqli_stmt_bind_param($stmt1, "s",$_SESSION['sessionUser']);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_store_result($stmt1);
   

    $sql="INSERT INTO jobseekerskills ( UserName , Skill) VALUES (?,?)" ;
    $checkbox1 = $_POST['skills'] ; 
     if($checkbox1!=null)
    for ($i=0; $i<sizeof ($checkbox1);$i++)
     {  
    
    $stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../php/skills.php?error=sqlerror");
    exit();
} else {
  
    mysqli_stmt_bind_param($stmt, "ss",$_SESSION['sessionUser'],$checkbox1[$i]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
   

} 

   
    }
    
    $first=$_POST['first'] ; 
   
    $second=$_POST['second']; 
    $third=$_POST['third'] ; 
   

if (!mysqli_stmt_prepare($stmt1, $sql)||$first=="") {
    header("Location: ../php/skills.php?success=saved1");
    exit();
} else {
    str_replace(" ","/", $first);
    mysqli_stmt_bind_param($stmt1, "ss",$_SESSION['sessionUser'],$first);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_store_result($stmt1);
   

} 



if (!mysqli_stmt_prepare($stmt1, $sql)||$second==""||$second==$first) {
    header("Location: ../php/skills.php?success=saved2");
exit();
} else {
    str_replace(" ","/", $second);
mysqli_stmt_bind_param($stmt1, "ss",$_SESSION['sessionUser'],$second);
mysqli_stmt_execute($stmt1);
mysqli_stmt_store_result($stmt1);


}  


if (!mysqli_stmt_prepare($stmt1, $sql)||$third==""||$third==$first||$third==$second) {
    header("Location: ../php/skills.php?success=saved3");
exit();
} else {
    str_replace(" ","/", $third);
mysqli_stmt_bind_param($stmt1, "ss",$_SESSION['sessionUser'],$third);
mysqli_stmt_execute($stmt1);
mysqli_stmt_store_result($stmt1);


} 


    header("Location: ../php/skills.php?success=saved");
}
}}
?>
