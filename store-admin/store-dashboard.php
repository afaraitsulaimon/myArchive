
<?php

  require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-login-store-admin.php");
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Store Dashboard</title>

  <style type="text/css">
    
    .theSubmit:hover{

      background-color: red;
      color: white;
      font-weight: bolder;
    }
  </style>
</head>
<body>


	<section class="newGround">

		<!--HEADER DASHBOARD FOR STORE START FROM HERE -->
           
          <div class="container-fluid" id="dashBoardHeader">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg bg-danger">

                <?php

       //store the logged in user id in a variable
                //by using the function loggedInStore() to check the session of the user that logged in
                // then fetch the name and display it

              
                   
                   $logOnUserId = loggedInStore();




                //select all from the store_admin table

                $loggedUserDet = "SELECT * FROM store_admin WHERE id = $logOnUserId ";
 

                $queryLoggedUser = mysqli_query($db_connection,$loggedUserDet);

   if (!$queryLoggedUser) {
     
     die("could not queru QUERYLOGGEDUSER" .mysqli_error($db_connection));
   }



                $fetchLogUserDet = mysqli_fetch_assoc($queryLoggedUser);


        $storeAdminFullName = $fetchLogUserDet['store_userFullName'];
        $storeAdminUserName = $fetchLogUserDet['store_username'];

                

                 echo "$storeAdminFullName";

                
                 

                
                 ?>
               </div>

               <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bg-primary">
                  <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle = "dropdown" style="float: right;"><?php echo "$storeAdminUserName"; ?></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Change Password</a></li>
                   <li><a href="#">Edit Profile</a></li>
                   <li><a href="#">Log Out</a></li>

                 </ul>
               </div>

            </div>

          </div>
         
    <!--HEADER DASHBOARD FOR STORE ENDS HERE -->


<!-- beginning of the content -->
       <div class="container-fluid">
         <div class="row d-flex justify-content-around" >
         
           <a href="#" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bg-info text-center pt-4 mt-4" style="height: 100px; text-decoration: none; font-size: 2em; font-weight: bolder; color: white;" id="addFile">
            
                 ADD FILE
           
           </a>


           <a href="#" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bg-danger pt-4 mt-4" style="height: 100px; text-align: center; text-decoration: none; font-size: 2em; font-weight: bolder; color: white; " id="viewFile">
            
                 VIEW FILE
           
           </a>


         </div>

       </div>


<!-- TO ADD FILE START FROM HERE-->

     <div class="container" id="theFormForInputFile">
       <div class="row d-flex justify-content-around">
         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bg-secondary mt-5">
            <div>

              <h2 class="text-center" style="font-weight: bolder; font-size: 3em;">ADD FILE</h2>
               <form>
                 <div class="form-group">
                  <!--THE LIST OF USERS WILL BE PULLED OUT FROM THE DATABASE -->
                  <!-- SO THAT THE STORE ADMIN CAN ASSIGN THE FILE TO THE PERSON HE IS GIVE IT TO -->
                  <label>Select User</label>
                   <select>
                     <option><?php ?></option>
                   </select>
                 </div>


                 <div class="form-group">
                   <label>File No</label>
                   <input type="text" name="" class="form-control" placeholder="Enter File No">
                 </div>

                 <div class="form-group">
                   <button type="submit" class="form-control theSubmit">Save</button>
                 </div>

               </form>
            </div>
         </div>
       </div>
     </div>
   <!-- TO ADD FILE ENDS HERE-->



<!-- TO VIEW FILE STARTS FROM HERE -->
    <div class="container" id="tableToDisplayFiles" style="display:none">
      <div class=" row d-flex justify-content-around">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bg-danger mt-5">
          
          <h2 class="text-center" style="font-weight: bolder; font-size: 3em;">FILES</h2>


          <table class="table table-striped table-bordered">
            <tr>
              <th>User Name</th>
              <th>File No</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
<!-- TO VIEW FILE ENDS HERE -->

	</section>





<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html>

<script type="text/javascript">
  
  $("#addFile") .click(function(){


    $("#theFormForInputFile").show();

    $("#tableToDisplayFiles").hide();



  });


  $("#viewFile") .click(function(){

    $("#tableToDisplayFiles").show();
    $("#theFormForInputFile").hide();

  });
</script>