<?php
session_start();
require_once '../includes/database.php';
?>
<!DOCTYPE html>
<html lang="en" style="
overflow: scroll;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password page</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/forgotpassword.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/mdb.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Jomhuria&family=Open+Sans:ital,wght@1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="forgot-pass" style="margin-top: 4%;">
        <div><a href="home.php"><img src="../img/logo.png" alt=""></a></div>
        <form action="../includes/forgetpassword-inc.php" method="post">
            <P class="fw-bold fs-4 text-left welcome" style="margin-top:8%;">Forgot your password?</P>
            <span class="text-black-50"> Recover your account. We will send your password to your email.</span>


            <div class="form-floating mb-3 ">
                <input type="email" class="form-control mt-4  " id="floatingInput" placeholder="name@example.com"
                    name="email" required>
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mb-3 ">
                <input type="text" class="form-control mt-4  " id="floatingInput" placeholder="user name"
                    name="username" required>
                <label for="floatingInput">User Name</label>
            </div>

            <div><button type="submit" class="btn btn-primary" style="margin-bottom:15%;" name="submit">Send
                    password</button></div>
        </form>
    </div>


</body>

</html>