<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser']) && $_SESSION['type'] == 2) {

} else {
    header("location:home.php");
    exit();
}


$sql = "select * from company where UserName=?";
$stmt = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt, $sql)) {

    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}


$sql1 = "select * from departments where UserName=?";
$stmt1 = mysqli_stmt_init($conn);


if (!mysqli_stmt_prepare($stmt1, $sql1)) {


} else {
    mysqli_stmt_bind_param($stmt1, "s", $_SESSION['sessionUser']);
    mysqli_stmt_execute($stmt1);
    $dep = mysqli_stmt_get_result($stmt1);
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
    <title>add job</title>
    <!-- MDB icon -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->

    <link rel="stylesheet" href="../css/mdb.min.css" />


</head>
<style>
    .img {
        opacity: 0.5;
    }
</style>

<body>

    <style>
        .list-group-item:nth-child(3)::before {

            content: "";
            height: 100%;
            width: 1%;
            background-color: #088cc8;
            ;
            position: absolute;
            top: 0;
            left: 0;


        }
    </style>
    <!-- Start your project here-->
    <section style="background-color: #eee;">
        <?php require_once "compnav.php"; ?>
        <?php require_once "companysection.php"; ?>
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-body">

                    <form class="sign-in pt-4 " method="post" action="../includes/addjob-inc.php"
                        style=" margin-top: -4%;">
                        <div class="form-floating ">
                            <div><label style="font-weight: bolder;">Job title </label></div>
                            <input type="text" class="form-control" id="floatingInput"
                                style="width: 309px;   height:20px;margin-bottom:3%;" name="title" required>

                        </div>
                        <div class="form-floating ">
                            <div><label style="font-weight: bolder;">Job description </label></div>
                            <textarea id="floatingInput" style="width: 309px;  height:150px;;margin-bottom:3%;"
                                name="desc" rows="5" cols="40" required></textarea>

                        </div>


                        <div class="form-outline" style=" height: 44px; margin-bottom:5%; ">
                            <div><label style="font-weight: bolder;">Required Age </label></div>
                            <input type="number" id="typeNumber" class="form-control" name="age" required
                                style="width: 309px;    border: 1px solid #bdbdbd;" name="age" min="20" max="80">
                        </div>


                        <div class="form-outline" style=" height: 44px;  ">
                            <div><label style="font-weight: bolder;">years of experience required (otional) </label>
                            </div>
                            <input type="number" id="typeNumber" class="form-control" name="exp"
                                style="width: 309px;    border: 1px solid #bdbdbd;">
                        </div>

                        <div style="margin-bottom: 2%;">
                            <div><label style="font-weight: bolder; margin-top: 6%;">Is the job indoor or outdoor?
                                </label></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                    id="inlineRadio1" value="option1" required>
                                <label class="form-check-label" for="inlineRadio1">In-door</label>
                            </div>

                            <div class="form-check form-check-inline" style="margin-left:25%; ">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                    id="inlineRadio2" value="option2" required>
                                <label class="form-check-label" for="inlineRadio2 ">Out-door</label>
                            </div>
                        </div>

                        <div style="margin-bottom: 1%;">
                            <div><label style="font-weight: bolder; margin-top: 1%;">Is the job part time or full time?
                                </label></div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions1"
                                    id="inlineRadio111" value="option1" required>
                                <label class="form-check-label" for="inlineRadio111">Part time</label>
                            </div>

                            <div class="form-check form-check-inline" style="margin-left:25%; ">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions1"
                                    id="inlineRadio222" value="option2" required>
                                <label class="form-check-label" for="inlineRadio222">Full time</label>
                            </div>
                        </div>



                        <div style="display:inline; width:100%;">
                            <div> <label style="font-weight: bolder; margin-top: 1%;">In which department
                                    is the job?</label></div>
                            <select style="
    margin-right: 80%;
    height: 40%;
   " name="del">
                                <?php



                                while ($row = mysqli_fetch_assoc($dep)) {

                                ?>
                                <option value="<?php echo $row['department']; ?>">
                                    <?php echo $row['department']; ?>
                                </option>

                                <?php
                                    // close while loop 
                                }
                                ?>
                            </select>

                            <div>
                                <div> <label style="font-weight: bolder; margin-top: 3%; ">requiremnts for
                                        the job</label></div>
                                <div class="form-floating ">

                                    <input type="text" class="form-control" id="floatingInput"
                                        style="width: 309px;  height:20px;margin-bottom:3%;" name="r1" required>

                                </div>

                                <div class="form-floating ">

                                    <input type="text" class="form-control" id="floatingInput"
                                        style="width: 309px;   height:20px;margin-bottom:3%;" name="r2">

                                </div>

                                <div class="form-floating ">

                                    <input type="text" class="form-control" id="floatingInput"
                                        style="width: 309px;   height:20px;margin-bottom:3%;" name="r3">

                                </div>


                            </div>
                        </div>
                        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
                        <div>

                            <div> <label style="font-weight: bolder; margin-top: 3%;"><i
                                        class="fa-solid fa-circle-question"></i> Add Questions</label></div>
                            <div class="form-floating ">

                                <input type="text" class="form-control" id="floatingInput"
                                    style="height:20px;margin-bottom:3%;" name="q1">

                            </div>

                            <div class="form-floating ">

                                <input type="text" class="form-control" id="floatingInput"
                                    style="   height:20px;margin-bottom:3%;" name="q2">

                            </div>

                            <div class="form-floating ">

                                <input type="text" class="form-control" id="floatingInput"
                                    style="  height:20px;margin-bottom:3%;" name="q3">

                            </div>


                        </div>



                        <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                                style="margin-top:33px;">ADD</button></div>


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