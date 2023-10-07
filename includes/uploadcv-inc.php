<?php
// Include the database configuration file
//include 'dbConfig.php';
session_start();
require_once 'database.php';


// File upload path
$targetDir = "uploads/";
$dbUsername = $_SESSION['sessionUser'];
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) 
{
    // Allow certain file formats
    $allowTypes = array( 'pdf');
    if (in_array($fileType, $allowTypes))
     {
        $newFileName = $dbUsername . "." . $fileType;
        $fileDestination = "uploads/" . $newFileName;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileDestination)) 
            {
               
                $sql="UPDATE jobseeker SET IsUploaded=1 where UserName=?";
                $stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../php/uploadcv.php?error=sqlerror");
    exit();
} else {
  
    mysqli_stmt_bind_param($stmt,"s",$dbUsername);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: ../php/uploadcv.php?succes");
  

}
            } else {
                header("Location: ../php/uploadcv.php?error=Sorry, there was an error uploading your file.");
        exit();
            }
        } else {
           
            header("Location: ../php/uploadcv.php?error=Sorry, PDF files are allowed to upload.");
            exit();
        }
    
}

?>