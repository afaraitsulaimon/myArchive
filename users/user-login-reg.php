<?php
   require_once('process-users-reg.php');
   require_once('process-users-login.php');
   require_once('process-users-change-pw.php');
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
                       <button> <a class="nav-link" href="#">Login As User</a></button>
                      </li>
                      <li class="nav-item">
                        <button><a class="nav-link" href="../store-admin/store-login-reg.php">Register as Store Admin</a></button>
                      </li>

                      <li class="nav-item">
                        <button><a class="nav-link" href="#">Register as User</a></button>
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

<h1 class="text-center">User Login & Registration</h1>
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

                <!-- successful message display for paassword change start here-->
                <?php
                    if (isset($_GET['userChangePassStatus']) && $_GET['userChangePassStatus'] == 'good') {


                      echo "<div class='alert alert-success'>Password Changed successfully</div>";
                    }
                ?>
                <!-- successful message display for paassword change ends here-->



    <!-- BEGINNING OF USER LOGIN FORM -->

    <?php
       if (isset($loginErrUserMessage)) {
           
           echo "<div class='alert alert-danger'>$loginErrUserMessage</div>";
       }

    ?>

        <form id="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" role="form" style="display: block;" name="userLoginForm">

            <div class="form-group">
                <input type="text" name="inputuserName" id="usernameLoginUser" tabindex="1" class="form-control" placeholder="Username">
            </div>
<!--display the error for login username start from here -->
            <div id="loginUserName_Errors" style="text-align: center;color: red; font-weight: bolder;">
              
            </div>
<!--display the error for login username ends from here -->




            <div class="form-group">
                <input type="password" name="users_Password" id="passwordLoginUser" tabindex="2" class="form-control" placeholder="Password">
            </div>
<!--display the error for login password start from here -->

            <div id="loginUserPass_Errors" style="text-align: center;color: red; font-weight: bolder;">
              
            </div>
<!--display the error for login password start from here -->


            <div class="form-group text-center">
                <input type="checkbox" tabindex="3" class="" name="userRemember" id="remember">
                <label for="remember"> Remember Me</label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3">
                        <button type="submit" name="UserLoginButton" id="login-submit" tabindex="4" class="form-control">Log In</button> 
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="user-forgetpw.php" tabindex="5" class="forgot-password text-light" name="userForgetPwButton">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>


<!-- END OF USER LOGIN FORM -->



<?php
  if(isset($_GET['feedback']) && $_GET['feedback'] == 'success'){

  echo "<div class='alert alert-success'>Successfully Registered</div>";
}elseif (isset($userErrorMessage)) {
    
    echo "<div class='alert alert-danger'>$userErrorMessage</div>";
}
?>

<!--BEGINNING OF REGISTRATION FORM -->

    <form id="register-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" role="form" style="display: none;" name="userRegistrationForm">

        <div class="form-group">
            <input type="text" name="usersFullName" id="username_Reg" tabindex="1" class="form-control" placeholder="Full name" value="" required="required">
        </div>

<!-- TO DISPLAY THE FULLNAME ERROR GOTTEN FROM THE JS VALIDATION SIDE STARTS HERE -->
        <div id="errorUserRegFullName" style="text-align: center; font-weight: bolder; color: red;">
          
        </div>
<!--TO DISPLAY THE FULLNAME ERROR GOTTEN FROM THE JS VALIDATION SIDE END HERE  -->




        <div class="form-group">
            <input type="text" name="usernameReg" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="required">
        </div>
<!-- TO DISPLAY THE USERNAME ERROR GOTTEN FROM THE JS VALIDATION SIDE STARTS HERE -->
       <div id="errorRegUserName" style="text-align: center; font-weight: bolder; color: red;">
         
       </div>
<!-- TO DISPLAY THE USERNAME ERROR GOTTEN FROM THE JS VALIDATION SIDE ENDS HERE -->



        <div class="form-group">
            <input type="email" name="userRegEmail" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required="required">
        </div>

<!-- TO DISPLAY THE EMAIL ERROR GOTTEN FROM THE JS VALIDATION SIDE STARTS HERE -->
        <div id="errorUserRegEmail" style="text-align: center; font-weight: bolder; color: red;">
          
        </div>
<!-- TO DISPLAY THE EMAIL ERROR GOTTEN FROM THE JS VALIDATION SIDE ENDS HERE -->

        <div class="form-group">
            <select class="form-control" name="usersDept">
                <option value="null">Select department</option>
                <option value="Bills">Bills</option>
                <option value="LC">LC</option>
                <option value="Non-Valid">Non-Valid</option>
                <option value="Export">Export</option>
                <option value="Invisible">Invisble</option>
                <option value="ADA-Scan">ADA</option>
            </select>
        </div>


<!-- TO DISPLAY THE DEPARTMENT ERROR GOTTEN FROM THE JS VALIDATION SIDE STARTS HERE -->
        <div id="errorUserRegDept" style="text-align: center; font-weight: bolder; color: red;">
          
        </div>
<!-- TO DISPLAY THE DEPARTMENT ERROR GOTTEN FROM THE JS VALIDATION SIDE ENDS HERE -->

        <div class="form-group">
            <input type="password" name="userRegPassCode" id="password_Reg" tabindex="2" class="form-control" placeholder="Password" required="required">
        </div>

<!-- TO DISPLAY THE PASSWORD ERROR GOTTEN FROM THE JS VALIDATION SIDE STARTS HERE -->
          <div id="errorUserRegPassWord" style="text-align: center; font-weight: bolder; color: red;">
            
          </div>
<!-- TO DISPLAY THE PASSWORD ERROR GOTTEN FROM THE JS VALIDATION SIDE ENDS HERE -->


        <div class="form-group">
            <input type="password" name="userRegConfPassCode" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required="required">
        </div>

<!-- TO DISPLAY THE CONFIRM PASSWORD ERROR GOTTEN FROM THE JS VALIDATION SIDE STARTS HERE -->
         <div id="errorUserRegConPassWord" style="text-align: center; font-weight: bolder; color: red;">
           
         </div>
<!-- TO DISPLAY THE CONFIRM PASSWORD ERROR GOTTEN FROM THE JS VALIDATION SIDE ENDS HERE -->


        <div class="form-group">
            <div class="row">
                <div class="offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3">
                    <button type="submit" name="userRegister-submit" id="userRegSubmitButton" tabindex="4" class="form-control">Register Now</button>
                    
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


<!--MY JS LINKING -->
<script type="text/javascript" src="../script/userFormValidation.js"></script>
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