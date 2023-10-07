<?php
session_start();

if (isset($_SESSION['sessionpassword']) && isset($_SESSION['sessionUser'])) {






    if (isset($_POST['submit'])) {

        require 'database.php';
        $_SESSION['jobseeker'] = $_POST['username'];
        $_SESSION['jobid'] = $_POST['id'];
        header("Location:../php/setinterview.php");
        exit();


    }

    if (isset($_POST['submit2'])) {

        require 'database.php';
        $_SESSION['jobseeker'] = $_POST['username'];
        $_SESSION['freeid'] = $_POST['id'];
        header("Location:../php/contract.php");
        exit();


    }


}
?>