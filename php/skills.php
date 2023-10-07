<?php
session_start();
require_once '../includes/database.php';

if (isset($_SESSION['sessionUser'])&& $_SESSION['type']==1) {
       
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
  <title>Skills</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="../css/skills.css" />
  <link rel="stylesheet" href="../css/mdb.min.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>


  <!-- Start your project here-->
  
  <section style="background-color: #eee;">
   
    <?php  require_once"nav.php";?>

<?php  require_once"section.php";?>

        <div class="col-lg-9">
          <div class="card mb-4" >
            <div class="card-body">


              <form class="sign-in pt-4 " method="Post" action="../includes/skills-inc.php">
              
              <p style="font-weight:bold ;color:#088cc8;;;">What skills,technologies and fields of expertise do you have?</p>

                <div class="super" >
                <div class="left">
              <?php 
             $sql = "select * from jobseekerskills where UserName=? ";
             $stmt = mysqli_stmt_init($conn);
             
             
                     if (!mysqli_stmt_prepare($stmt, $sql)) 
                     {
                     
                         exit();
                     } else {
                         mysqli_stmt_bind_param($stmt, "s", $_SESSION['sessionUser']);
                         mysqli_stmt_execute($stmt);
                         $result = mysqli_stmt_get_result($stmt);
                     }
              $checked_arr = array();


              if(mysqli_num_rows($result) > 0)
              {
                while ($row = mysqli_fetch_assoc($result)) {
                  array_push ($checked_arr,$row['Skill']);
                 
                }
              }

              $skills = array("Problem Solving skills", "Flexibility", " Communication Skills", "Marketing", " Web Development", "Prototyping", "Computer Skills", "Project Mangement", "Empathy", "Active listening", "Interpersonal skills", "Attention to Detail", "User Interface Design", "Business", "Persuasion", "Socail media", "Coding", "Decision-making");
    foreach($skills as $s){

      $checked = "";
      if(in_array($s,$checked_arr))
      {
        $checked = "checked";
                 
                  $key = array_search($s, $checked_arr);
          unset($checked_arr[$key]);
      }
      echo '<input type="checkbox" name="skills[]" value="'.$s.'" '.$checked.' > '.$s.' <br/>';

    }
  
        ?> 
        </div>


        <div class="right">
              <?php 
            
                $skills = array("Critical Thinking skills","Teamwork","Data Analysis","Leadership","Bookkeeping","SolidWorks","Microsoft Office","Accounting","Motivation","Writing","Organization","Collaboration","Conflict Mangement","Social Skills","Techenical Writing","Research","Adaptability","Negotiation");
    foreach($skills as $s){

      $checked = "";
      if(in_array($s,$checked_arr)){
        $checked = "checked";
        $key = array_search($s, $checked_arr);
          unset($checked_arr[$key]);
      }
      echo '<input type="checkbox" name="skills[]" value="'.$s.'" '.$checked.' > '.$s.' <br/>';

    }
  
        ?> 
        </div>
  </div>
             


                <p style="font-weight:bold ;color:#088cc8;;;margin-bottom: -2px;margin-top: 20px;">Other Skills (optional)</p>
                <p >Applicable only if you couldn't find relevant skills above.</p>


               
                <input style="margin-bottom: 12px ;width:70%;"type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="first"
                 value= "<?php if(sizeof($checked_arr)>0)
                {
                  $r = array_pop($checked_arr);
                   echo $r  ; }   ?> ">
                 

                <input style="margin-bottom:12px ;width:70%;"type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="second" value=" <?php if(sizeof($checked_arr)>0) {
                  $r = array_pop($checked_arr);
                  echo $r; } ?> ">
                <input style="margin-bottom:12px ;width:70%;"type="text" class="form-control" id="floatingInput" style="  height: 17%;" name="third" value=" <?php if(sizeof($checked_arr)>0) {
                  $r = array_pop($checked_arr);
                  echo $r; }?>">

                <div><button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit"
                    style="margin-top:33px;">Save</button></div>



                

              

            
  
               



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