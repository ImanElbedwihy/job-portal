<!DOCTYPE html>
<html lang="en"  style="
     overflow: scroll;
     overflow-y: scroll;
">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>user sign up</title>
  <!-- MDB icon -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../css/usersignup.css" />
  <link rel="stylesheet" href="../css/mdb.min.css" />

</head>

<body>
  <!-- Start your project here-->
  <section>
   
  <div class="col-lg-5" style=" margin: auto;">
          <div class="card mb-4" >
            <div class="card-body">
                <a href="home.php" class="logo">
                  <img src="../img/logo.png" alt="Logo" style="
      height: 60px;
      display: block;
      margin-left: auto;
      margin-right: auto;
  ">
                </a>
                <h2 class="text-uppercase text-center " style="margin-bottom: -2rem!important;
}">Create an account</h2>

                <form class="sign-in pt-4 " method="post" action="../includes/registeruser-inc.php"  >


                <div class="form-floating mb-3 ">
                  <input type="email" class="form-control mt-4  " id="floatingInput"  placeholder="Your Email"   name="email" required  >
                    <label for="floatingInput" style="margin-left: 0px;">Your Email</label>
                   
                  </div>

                  <div class="form-floating mb-3 ">
                    <input type="password" id="form3Example4cg" class="form-control mt-4  " name="password"placeholder="Password"
                      required  >
                    <label  for="form3Example4cg" style="margin-left: 0px;">Password</label>
                   
                  </div>

                  <div class="form-floating mb-3 ">
                    <input type="password" id="form3Example4cdg" class="form-control mt-4  "placeholder="Repeat your
                      password"
                      name="repeatedpassword" required >
                    <label class="form-label" for="form3Example4cdg" style="margin-left: 0px;">Repeat your
                      password</label>
                  </div>

                  <div class="form-floating mb-3 ">
                      <input type="text" id="form3Example1cg" class="form-control mt-4  " name="username" placeholder="UserName"
                        required >
                      <label for="form3Example1cg" >UserName</label>

                  
                    </div>

                    <div class="form-floating mb-3 ">
                      <input type="text" id="form3Example1cg111"  class="form-control mt-4  " name="fname"
                        required placeholder="First Name">
                      <label class="form-label" for="form3Example1cg111"  >First Name</label>
                     
                    </div>


                    <div class="form-floating mb-3 ">
                      <input type="text" id="form3Example1cg12" class="form-control mt-4  " name="lname"
                        checked required  placeholder="Last Name" >
                      <label class="form-label" for="form3Example1cg12" >Last Name</label>
                     
                    </div>


                  
                    <div class="form-floating mb-3 ">
                      <input type="number" id="typeNumber" class="form-control mt-4  "  placeholde="Age"name="age" required    min="0" max="100"  >
                      <label class="form-label" for="typeNumber" >Age</label>
                    </div>

                  <div style="margin-bottom: 2%;">
                    <label style="font-weight: bolder;">Gender </label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" required>
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline" style="margin-left: 25%;">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2" required>
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                  </div>




                  <div class="d-flex justify-content-center">
                    <button type="submit"class="btn btn-primary btn-lg  rounded-pill"
                      name="submit">Register</button>
                  </div>

                  <p class="text-center text-muted mt-4 mb-0">Already have an account? <a href="sign-in.php"
                      class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

           
        </div>
     
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>