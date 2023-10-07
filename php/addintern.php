<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==2) {

} else {
    header("location:home.php");
    exit();
}




?>
<!DOCTYPE html>
<!-- saved from url=(0112)file:///C:/Users/sggln/OneDrive/Desktop/MDB5-STANDARD-UI-KIT-Free-6.0.0/Material%20Design%20for%20Bootstrap.html -->
<html lang="en" style="
    overflow: scroll;
">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>add internship</title>
    <!-- MDB icon -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->

    <link rel="stylesheet" href="../css/mdb.min.css" />


</head>

<body>
<style>
.list-group-item:nth-child(4)::before{

content:"" ;
height:100%;
width:1%;
background-color:#088cc8;;
position :absolute;
top:0;
left:0;


}
</style>
    <!-- Start your project here-->
    <section style="background-color: #eee;">
    <?php  require_once"compnav.php";?>
    <?php require_once "companysection.php"; ?>
         <div class="col-lg-9">
          <div class="card mb-4" >
            <div class="card-body">


                    <form class="sign-in pt-4 " method="post" action="../includes/addintern-inc.php"
                        style=" margin-top: -4%;">
                        <div class="form-floating ">
                            <div><label style="font-weight: bolder;">Intern title </label></div>
                            <input type="text" class="form-control" id="floatingInput"
                                style="width: 309px;   height:20px;margin-bottom:3%;" name="title" required>

                        </div>



                        <div class="form-outline" style=" height: 44px; margin-bottom:5%; ">
                            <div><label style="font-weight: bolder;">Required Age </label></div>
                            <input type="number" id="typeNumber" class="form-control" name="age"
                               required style="width: 309px; ;   border: 1px solid #bdbdbd;" name="age" min="15" max="80">
                        </div>


                        <div class="form-outline" style=" height: 44px;  ">
                            <div><label style="font-weight: bolder;">Period(weeks) </label>
                            </div>
                            <input type="number" id="typeNumber" class="form-control" name="per"
                                style="width: 309px;    border: 1px solid #bdbdbd;" required>
                        </div>
                        <div class="form-outline" style=" height: 44px;margin-top:5%;  ">
                            <div><label style="font-weight: bolder;" >Starting Date </label>
                            </div>
                            <input type="date" id="typeNumber" class="form-control" name="stdate"
                                style="width: 309px;    border: 1px solid #bdbdbd;"value= <?php echo date("Y-m-d"); ?> required>
                        </div>
                        <div>
                            <div> <label style="font-weight: bolder; margin-top: 5%; "> required skills </label></div>
                            <div class="form-floating ">
                         
                            <input type="text" class="form-control" id="floatingInput"
                                style="width: 309px;   height:20px;margin-bottom:3%;" name="r1" required>

                        </div>

                        <div class="form-floating ">
                           
                            <input type="text" class="form-control" id="floatingInput"
                                style="width: 309px;   height:20px;margin-bottom:3%;" name="r2" >

                        </div>

                        <div class="form-floating ">
                          
                            <input type="text" class="form-control" id="floatingInput"
                                style="width: 309px;   height:20px;margin-bottom:3%;" name="r3" >

                        </div>

                        
                        <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:30px;">ADD</button></div>
                    </form>
                </div>
             
            </div>
        </div>



    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="./Material Design for Bootstrap_files/mdb.min.js.download"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>

 
</body>

</html>