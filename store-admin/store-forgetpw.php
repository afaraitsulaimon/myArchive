<?php
   require_once("process-store-forget-pw.php");
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
                       <button> <a class="nav-link" href="store-login-reg.php">Login as Store Admin <span class="sr-only">(current)</span></a></button>
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








<!-- STORE ADMIN PERSON FORGET PASSWORD STARTS FROM HERE -->

<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top: 200px;">

          <?php
               if (isset($_GET['thestatus']) && $_GET['thestatus'] == 'successNewPw') {
                 
              echo "<div class='alert alert-success'>Password Sent to your mail</div>";

               }elseif(isset($messageErrFgtPw)) {
                  echo "<div class='alert alert-danger'>$messageErrFgtPw</div>";
               }

          ?>

            <h1 class="text-center text-center text-light pb-4">Store Recover Password</h1>

            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="storeForgetPwForm">
                <div class="form-group">
                 
                    <input type="text" name="storeForgetPcode" placeholder="Email Address" class="form-control" required="required">
                </div>
<!--TO DISPLAY ERROR FORGET PASSWORD START-->
                <div id="storeForgtPass" style="text-align:center; font-weight: bolder; color: red;">
                  
                </div>
<!--TO DISPLAY ERROR FORGET PASSWORD ENDS HERE-->


                <div class="form-group">
                    <button type="submit" name="pCodeRecoverButton" class="btn btn-lg btn-primary" style="margin-left: 30%;">Recover Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- STORE ADMIN PERSON FORGET PASSWORD ENDS HERE -->













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

<script type="text/javascript">
  


  //validation for forget password
  // if the input field is empty and if the email address is properly linked

  var storeForgetForm = document.forms.storeForgetPwForm;

  var forgetError = document.getElementById('storeForgtPass');

  function validateForgetPw(){

      if (storeForgetForm.storeForgetPcode.value === "" || store_forget_form.store_ForgetPcode.value === null || store_forget_form.store_ForgetPcode.value.indexOf('@') > store_forget_form.store_ForgetPcode.value.lastIndexOf('.')) {

    storeForgetForm.storeForgetPcode.style.borderColor = "red";
    forgetError.innerHTML = "Enter email address";

      }else{

          storeForgetForm.storeForgetPcode.style.borderColor = "green";
    forgetError.innerHTML = "";
      }
  }

  storeForgetForm.storeForgetPcode.addEventListener("blur", validateForgetPw, false);


</script>
</body>
</html>`
