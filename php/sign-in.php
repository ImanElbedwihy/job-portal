<?php
    
    require_once '../includes/database.php';
?>
<!DOCTYPE html>
<html lang="en" style="
overflow: scroll;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/mdb.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Jomhuria&family=Open+Sans:ital,wght@1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
</head>

<body>
  <form class="sign-in pt-4 " method="post" action="../includes/signin-inc.php" style="margin-top: 4%;">

    <a href="home.php"><img src="../img/logo.png" alt=""></a>
    <P class="fw-bold fs-4 text-center welcome">Welcome Back</P>

     <div class="form-floating mb-3 ">
        <input type="text" class="form-control mt-4  " id="floatingInput"  placeholder="username"   name="username" required>
        <label for="floatingInput">User Name</label>
      </div>

    

      <div class="form-floating mb-3 ">
        <input type="password" class="form-control mt-4  " id="floatingInput" placeholder="password"  name="password" required>
        <label for="floatingInput"  style=" margin-bottom: 15%;" >Password</label>
    </div>

      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary" name="submit"    style=" margin: auto;">Login</button>
      </div>

      <a href="forgot_password.php" class="forgot">Forgot password?</a>
      <p class="join">New to MY JOB PORTAL?  <a href="user_signup.php" style="margin-bottom:10%;"> join now</a></p>
      

      
      
      
</form>

</body>

</html>