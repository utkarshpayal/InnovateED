<?php

//Include essential functions file
include_once("includes/essentials.php");

//check if BigPP is configured
//if not then configure

if (!file_exists(ph_include('sql.php'))) {
  header("Location: PPinsert.php");
  die();
}



// Start the session
session_start();

###
## Set user email and password in server variables
###
if(!empty($_POST['userEmail'])){
  //Validating if the submitted input is an Email address
    if(filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION["userEmail"] = filter_var(trim($_POST['userEmail']), FILTER_SANITIZE_EMAIL);
  }
}elseif(!empty($_POST['userPassword'])){
  $_SESSION["userPassword"] = filter_var($_POST['userPassword'], FILTER_SANITIZE_STRING);
}

###
## Sets a server variable if user exist
###
if (isset($_SESSION['userEmail'])) {
            // Verify if the user already exist
            if(ph_userEmailVerify($_SESSION['userEmail'])){
              $_SESSION["userExist"] = True;
            }
        }

###
## This code verifies user login or creates account
###
if ($_SESSION['userEmail'] && $_SESSION['userPassword']) {
  //Check if user exists
  if ($_SESSION['userExist']) {
      // userData stores all info of the user
      $userData = ph_userData($_SESSION['userEmail']);
      //verifying password here
      if (password_verify($_SESSION['userPassword'], $userData['userPassword'])) {
        //Set userID, this will be used to verify login everywhere.
        $_SESSION["userID"] = $userData['userID'];
        $_SESSION["loggedIN"] = True;
        //Unset temporary variables now;
        unset($_SESSION['userEmail']);
        unset($_SESSION['userPassword']);
        unset($_SESSION['userExist']);
    header("Location: ../index.php");
    exit();
        
      }
  }else{
    //Or create an account
    ph_userCreate($_SESSION['userEmail'],$_SESSION['userPassword']);
    header("Location: ../index.php");
    exit();
  }

}
?>

<!DOCTYPE HTML>
<HTML>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/style/Untitled.css">
  <link rel="stylesheet" href="../assets/style/card-style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Bevan&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="includes/themeFiles/stylesheet.css">
  <style type="text/css">
    .overlay-class {
      background-image: linear-gradient(rgba(0, 0, 0, 0.49), rgba(0, 0, 0, 0.49)), url("assets/images/809883.jpg");
    }

    .searchbar {
      background-color: rgb(226 222 222 / 42%);
      border-color: #000 !important;
    }

    .searchbar form-control text-white {
      color: white;
    }

    .nav-item {
      font-family: Bevan;
    }
  </style>
</head>

<body style=" border-top-right-radius: 15px;  border-bottom-right-radius: 15px;">
  <div style="position: fixed;width: 100%;z-index: 99999;">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid"> <a class="navbar-brand p-0 mt-0 m-0" href="../index.php">
          <img src="../assets/images/logo_for_a_website_about_science_and_innovation_called_Innovation-removebg-preview.png" class="d-inline-block mx-0 m-0 p-0" alt="" width="64" height="64"><b>InnovateEd</b></a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar10">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style=""> <a class="nav-link text-white" href="../Our-mission.php">Our Mission</a> </li>
            <li class="nav-item" style=""> <a class="nav-link text-white" href="../latest-innovation.php">Latest Innovation</a> </li>
            <li class="nav-item" style=""> <a class="nav-link text-white" href="../Popular-innovation.php">Popular Innovation&nbsp;</a> </li>
            <li class="nav-item" style=""> <a class="nav-link text-white" href="../AI-innovation.php">AI Innovation</a> </li>
          </ul> <a class="btn navbar-btn ml-md-2 btn-light text-white" style="  border-top-left-radius: 5rem; border-top-right-radius: 5rem;  border-bottom-left-radius: 5rem;  border-bottom-right-radius: 5rem;background-color:#9d39a1; border-color:#9d39a1;" href="../account/login.php">Account</a>
        </div>
      </div>
    </nav>
  </div>
  <div class="py-5 text-center" style="">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5" style="">
          <?php if (isset($_SESSION['userEmail'])) {
            // Verify if the user already exist
            if($_SESSION['userExist'] === True){
              echo '<h1 class="mb-4">Log in</h1>';
            }else{
              echo '<h1 class="mb-4">Register</h1>';
            }
          }else{
            echo '<h1 class="mb-4">Log in / Register</h1>';
          }
          ?>

          <?php if (!isset($_SESSION['userEmail']) && !empty($_POST['userEmail'])) {
              // Display error if Email is invalid
           echo  '<p style="color: red;">Not a Valid Email Address</p>';
          }
                if (isset($_SESSION['userPassword']) && $_SESSION['userExist']) {
                  // Display error if password is incorrect
                  if (!password_verify($_SESSION['userPassword'], $userData['userPassword'])) {
                    echo  '<p style="color: red;">Password is Invalid</p>';
                  }

                }
          ?>

          <!-- Login Form -->
          <?php if(empty($_SESSION['userEmail'])){ ?>
           <form method="post" action="">
                      <div class="form-group"> <input type="email" class="form-control" placeholder="Enter email" id="form9" name="userEmail"> </div>
                      <input type="submit" class="btn btn-primary" value="Next" />
                    </form>
          <?php }else{?>
           <form method="post" action="">
                      <div class="form-group"> <input type="password" class="form-control" placeholder="Enter password" id="form9" name="userPassword"> </div>
                      <?php if($_SESSION['userExist'] === True){
                         echo  '<input type="submit" class="btn btn-primary" value="Submit" />';
                        }else{
                          echo  '<input type="submit" class="btn btn-primary" value="Create Account" />';
                        }
                      ?>
                    </form>
         <?php }?>

         <!-- End of Login Form-->
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
