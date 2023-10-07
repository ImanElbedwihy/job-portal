<link rel="stylesheet" href="../css/Profile.css" />


<div class="container py-5">
  <div class="row">
    <div class="col" >
      <nav aria-label="breadcrumb" class="navbar-expand-lg navbar-light bg-light rounded-3 p-3 mb-4" style="width: 100%; justify-content: space-between;">
        <img src="../img/logo.png" alt="" style="    width: 94px;">



        <div class="search-container" style="width:85%;" >
    <form method="post" action="search.php">
  
      <input type="text" placeholder="Search for Jobs,internships or freelance jobs " name="search" style=   " width: 80%;
    margin-bottom: 0.5%;" >
      
      <button name ="submit"type="submit"><i class="fa fa-search"></i></button>

     

   
 <div style="display:flex;">
 
  <select style="
  
    height: 40%; " name="del">
              

                <option value="Job">
            Jobs
                </option>
                <option value="Internship">
               Internships
                </option>
                <option value="Freelance">
              Freelances
                </option>
              
             
              </select>

   <div style="margin-left:3%;"> <label for='loc' >filter by location:</label>
  <select id='loc' name='loc' >
               
    <option value= "all"> all </option>
<?php

      while ($row = mysqli_fetch_assoc($res)) {
  if ($row['location'] != "" || $row['location'] != null) {
?>        <option value="<?php echo $row['location']; ?>">
                  <?php echo $row['location']; ?>
                </option>

    <?php
  }
      }
?>
   </select>
   </div>
    </div>
   </form>
   </div>   
  
              
        <div class="links"  >
          <i class="fa-solid fa-bars"></i>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li><a href="profile.php">Home</a></li>
            <li><a href="editprofile.php">Profile</a></li>
            <li><a href="changepassword.php">change password</a></li>
            <li><a href="../includes/logout-inc.php">log out</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>