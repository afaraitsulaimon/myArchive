<?php
    require_once("user-process-forget-pw.php");

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title></title>
</head>
<body style="background-image: url(../images/digitalArchiving.jpg); background-size: cover;">
    

    <!--TRANSPARENT BACKGROUND COLOR START FROM HERE -->
     <div class="newGround">
        <!-- MENU , WHERE WE HAVE LOGO AND OTHER MENU STARTS FROM HERE -->
        <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-menu">
                
                <nav class="navbar navbar-expand-lg ">
                  <a class="navbar-brand" href="../index.php" style="color: white;"><i class="fa fa-graduation-cap" style="font-size:30px; color: white;"></i><b>myArchive</b></a>
                  <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item active">
                       <button> <a class="nav-link" href="../store-admin/store-login-reg.php">Login as Store Admin <span class="sr-only">(current)</span></a></button>
                      </li>
                      <li class="nav-item">
                       <button> <a class="nav-link" href="user-login-reg.php">Login As User</a></button>
                      </li>
                      <li class="nav-item">
                        <button><a class="nav-link" href="../store-admin/store-login-reg.php">Register as Store Admin</a></button>
                      </li>

                      <li class="nav-item">
                        <button><a class="nav-link" href="user-login-reg.php">Register as User</a></button>
                      </li>

                    </ul>
                   
                  </div>
                </nav>
            
            </div>
        </div>
    </div>
        </header>

        <!-- MENU , WHERE WE HAVE LOGO AND OTHER MENU ENDS HERE -->




<!-- USER FORGET PASSWORD STARTS FROM HERE -->

<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top: 200px;">

          <?php

            if (isset($_GET['pwStatus']) && $_GET['pwStatus'] == 'theSuccess') {
              
              echo "<div class='alert alert-success'>Password Sent to your email, Login with the code and change your Password</div>";
            }elseif (isset($errorPwUserMessage)) {
              
              echo "<div class='alert alert-danger'>$errorPwUserMessage</div>";
            }
          ?>


            <h1 class="text-center text-light pb-4">User Recover Password</h1>

            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="userPassWordFgt">
                <div class="form-group">
                 
                    <input type="text" name="userForgetPcodeEmail" placeholder="Email Address" class="form-control">
                </div>

                <!--to show the error on the form for js validation -->

                <div id="fgtUserFormError" style="text-align: center; color: red; font-weight: bolder;">
                  
                </div>


                <div class="form-group ">
                    <button type="submit" name="userRecoverPwButton" class="btn-primary btn-lg" style="margin-left: 30%">Recover Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- USER FORGET PASSWORD ENDS HERE -->




<!-- -->
    <!-- FOOTER START FROM HERE-->
   <footer>
     <div class="container-fluid">
         <div class="row justify-content-around">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center text-light">
                  &copy myArchive <?php echo date("Y"); ?>
                  
             </div>
         </div>
        
     </div>



  </footer>
     <!-- FOOTER ENDS HERE-->

     </div>
        
       
     <!--TRANSPARENT BACKGROUND COLOR ENDS HERE -->

    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>`


<script type="text/javascript">
  
// getting the form stored into a variable
  var theUserInputEmailForm = document.forms.userPassWordFgt;

  var theErrorMessage = document.getElementById('fgtUserFormError');


  //create a function for the error

  function userFgtLoginCode(){

    if (theUserInputEmailForm.userForgetPcodeEmail.value === "" || theUserInputEmailForm.userForgetPcodeEmail.value === null) {

         theUserInputEmailForm.userForgetPcodeEmail.style.borderColor = "red";
         theErrorMessage.innerHTML = "Enter Email address";


    }else if (theUserInputEmailForm.userForgetPcodeEmail.value !== "" && theUserInputEmailForm.userForgetPcodeEmail.value !== null && theUserInputEmailForm.userForgetPcodeEmail.value.indexOf("@") > theUserInputEmailForm.userForgetPcodeEmail.value.lastIndexOf(".")) {

      theUserInputEmailForm.userForgetPcodeEmail.style.borderColor = "red";
      theErrorMessage.innerHTML = "Incorrect Email  Address";



    }else if (!theUserInputEmailForm.userForgetPcodeEmail.value.includes('@') && !theUserInputEmailForm.userForgetPcodeEmail.value.includes('.')) {

      theUserInputEmailForm.userForgetPcodeEmail.style.borderColor = "red";
      theErrorMessage.innerHTML = "Enter a proper Email";



    }else{

      theUserInputEmailForm.userForgetPcodeEmail.style.borderColor = "green";
      theErrorMessage.innerHTML = "";

    }


  }


 theUserInputEmailForm.userForgetPcodeEmail.addEventListener("blur", userFgtLoginCode, false);



</script>