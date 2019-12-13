<?php
session_start();
 require_once("process-reg-store-admin.php");
 require_once("process-login-store-admin.php")
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
                       <button> <a class="nav-link" href="#">Login as Store Admin <span class="sr-only">(current)</span></a></button>
                      </li>
                      <li class="nav-item">
                       <button> <a class="nav-link" href="../users/user-login-reg">Login As User</a></button>
                      </li>
                      <li class="nav-item">
                        <button><a class="nav-link" href="store-login-reg.php">Register as Store Admin</a></button>
                      </li>

                      <li class="nav-item">
                        <button><a class="nav-link" href="../users/user-login-reg">Register as User</a></button>
                      </li>

                    </ul>
                   
                  </div>
                </nav>
            
            </div>
        </div>
    </div>
        </header>

        <!-- MENU , WHERE WE HAVE LOGO AND OTHER MENU ENDS HERE -->





<!-- LOGIN - REGISTRATION DETAILS START FROM HERE-->
        
        <section class="logIn-RegStore">








<!-- -->




 <div class="container">
    <div class="row justify-content-around">
        <div class="col-lg-6 col-md-6 col-md-offset-3" style="width: 80%; height: 60%; background-color: rgba(38, 86, 241,0.8);
">

<h1 class="text-center">Store Login & Registration</h1>
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6" style="margin-left: 10px;">
                            <a href="#" class="active" id="login-form-link"><button>Login</button></a>
                        </div>
                        <div class="col-xs-6" style="margin-left: 10px;">
                            <a href="#" id="register-form-link"><button>Register</button></a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
    <!-- BEGINNING OF LOGIN FORM -->

    <?php

     if (isset($_GET['storeChangePassCode']) && $_GET['storeChangePassCode'] == 'success') {
       
       echo "<div class='alert alert-success'>Password Change SuccessFully</div>";
     }

    ?>

     <?php
     if (isset($storeLoginErrMessage)) {
    
     echo "<div class='alert alert-danger'>$storeLoginErrMessage </div>";
     }

    ?>

        <form id="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" role="form" style="display: block;" name="storeLoginForm">
            <div class="form-group">
                <input type="text" name="storeUserName" id="usernameStore" tabindex="1" class="form-control" placeholder="Username" required="required">
            </div>
              <div id="userStoreError" style="text-align: center; color: red; font-weight: bolder;">
                  
              </div>
            <div class="form-group">
                <input type="password" name="storeUserPw" id="passwordStore" tabindex="2" class="form-control" placeholder="Password" required="required">
            </div>
              <div id="passCodeStoreError" style="color: red; text-align: center; font-weight: bolder;">
                  
              </div>

            <div class="form-group text-center">
                <input type="checkbox" tabindex="3" class="" name="storeUserRem" id="remember">
                <label for="remember"> Remember Me</label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3">
                        <button type="submit" name="storeUserLoginButton" id="login-submit" tabindex="4" class="form-control">Log In</button> 
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="store-forgetpw.php" tabindex="5" class="forgot-password text-light">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>


<!-- END OF LOGIN FORM -->

<!--ECHO THE RESULT OF REGISTRATION HERE -->

<?php
  
  if (isset($_GET['status']) && $_GET['status']=='successfulReg') {
      
      echo "<div class='alert alert-success'>Successfully Registered</div>";
  }elseif (isset($storeMessageError)) {
    echo "<div class='alert alert-danger'>$storeMessageError</div>";
  }
?>

<!-- STORE REGISTRATION FORM STARTED FROM HERE -->

    <form id="register-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" role="form" style="display: none;" name="storeOwnRegForm">

        <div class="form-group">
            <input type="text" name="storeRegFullName" id="username-Registration" tabindex="1" class="form-control" placeholder="Fullname" required="required">
        </div>
        <div id="errorStoreRegName" style="padding-left: 170px; color: red;"></div>


        <div class="form-group">
            <input type="text" name="storeRegUserName" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="required">
        </div>
        <div id="errorStoreRegUser" style="padding-left: 170px; color: red;"></div>




        <div class="form-group">
            <input type="email" name="storeRegUserEmail" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required="required">
        </div>
        <div id="errorRegStoreEmail" style="padding-left: 170px; color: red;"></div>

        <div class="form-group" >
            <select class="form-control" name="storeAdminDept">
                <option value="null">Select department</option>
                <option value="Bills">Bills</option>
                <option value="LC">LC</option>
                <option value="Non-Valid">Non-Valid</option>
                <option value="Export">Export</option>
                <option value="Invisible">Invisble</option>
            </select>
        </div>


        <div class="form-group">
            <input type="password" name="storeRegUserPw" id="password" tabindex="2" class="form-control" placeholder="Password" required="required">
        </div>
        <div id="errorRegStorePass" style="padding-left: 170px; color: red;"></div>

        <div class="form-group">
            <input type="password" name="storeRegUserConfirmPw" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required="required">
        </div>
        <div id="errorRegStoreConPass" style="padding-left: 170px; color: red;"></div>


        <div class="form-group">
            <div class="row">
                <div class="offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3">
                    <button type="submit" name="storeUserRegisterButton" id="register-submit" tabindex="4" class="form-control">Register Now</button>
                    
                </div>
            </div>
        </div>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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

    <script type="text/javascript" src="../script/storeFormValidation.js"></script>

</body>
</html>`


<script type="text/javascript">
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });

</script>