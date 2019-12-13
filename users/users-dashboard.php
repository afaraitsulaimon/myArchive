<?php
session_start();
   require_once("../database/db_connect.php");
 require_once("../handler/handler.php");
 require_once("process-users-login.php");
?>

<?php 
notLoggedInUser();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


<style type="text/css">

    input[type="text"]{

        margin-top: 50px;
    }

        


    .userFindFile button{

        width: 200px;
        height: 40px;
        background-color: grey;
        border: 2px solid white;
        border-radius: 10px;
        margin: 5px;
        font-size: 1.2em;
        font-weight: bold;
    }


    .userFindFile button:hover{

        background-color: red;
        border: 2px solid white;
        color: white;
    
        
    }


</style>
    <title>Users Dashboard</title>
</head>
<body>
    <!-- USER DASHBOARD HEADER STARTS FROM HERE  -->
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bg bg-info">


                <!-- STORE THE SESSION ID OF THE LOG IN USER-->
              <?php
                $theLogInUser = loggedInUser();
               
                //select all from where the login user is

                $usersDetails = "SELECT * FROM users WHERE user_id = $theLogInUser ";
                $queryUsersDetails = mysqli_query($db_connection, $usersDetails);
                if (!$queryUsersDetails) {
                    die('could not query QUERYUSERSDETAILS' .mysqli_error($db_connection));
                }
                //fetch the details and display the user full name
                $fetchUsersDetails = mysqli_fetch_assoc($queryUsersDetails);
                $fetchUsers_FullName = $fetchUsersDetails['users_FullName'];
                $fetchUsers_UserName = $fetchUsersDetails['usersUsername'];
                echo "<a href='users-dashboard.php'>$fetchUsers_FullName</a>";
                ?>
                
          </div>



            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bg-primary">
                    <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle = "dropdown" style="float: right;"><?php echo "$fetchUsers_UserName"; ?></a>
                   <ul class="dropdown-menu">
                     <li><a href="users-change-pw.php">Change Password</a></li>
                     <li><a href="user-edit-profile.php?profileEditId=$fetchUsersDetails['user_id']">Edit Profile</a></li>
                     <li><a href="users-logout.php">Log Out</a></li>

                   </ul>
            </div>  
       </div>
        
    </div>
    <!-- USER DASHBOARD ENDS HERE  -->

   <!-- search field and display field start from here-->

     <div class="container" style="margin-top: 200px;">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bg bg-secondary">

                <h1 class="text-center">Search For File</h1>
                
              <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
                <div class="form-group">
                    <input type="text" name="findFileField" class="form-control" >

                </div>

                <div class="form-group userFindFile" align="center">
                    <button type="submit" name="findFileButton">Find a File</button>
                    <button type="Reset">Reset</button>
                </div>




              </form>   


            
                
            </div>
        </div>
     </div>


   <!-- search field and display field ends here-->


          <!-- WHERE TO DISPLAYTHE SEARCH RESULT STARTS FROM HERE-->
          <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bg bg-secondary">
                      <?php

            if (isset($_POST['findFileButton'])) {

                
                
                $usersInputSearch = sanitize($_POST['findFileField']);
                

                if (empty($usersInputSearch)) {
                    
                    echo "<div class='alert alert-danger'>Enter a file number</div>";

                }

                


                if (!empty($usersInputSearch)) {
                    
                     $usersId = loggedInUser();

                     $usersAllDet = "SELECT * FROM users WHERE user_id = $usersId";

                     $queryUsersAllDet = mysqli_query($db_connection, $usersAllDet);

                     if (!$queryUsersAllDet) {
                        
                        die("could not query QUERYUSERSALLDET" .mysqli_error($db_connection));
                     }


                     $fetchAllUsersDet = mysqli_fetch_assoc($queryUsersAllDet);

                     $usersDepartment = $fetchAllUsersDet['users_department'];

                    // select all from the store to compare it with the same department with the user

                $getDept = "SELECT * FROM storefile WHERE storeFileNo LIKE '%$usersInputSearch%' AND dept_StoreFile = '$usersDepartment' ";

              
                  
     
                     $queryGetDept = mysqli_query($db_connection, $getDept);



                     if (!$queryGetDept) {
                        
                        die("could not query QUERYGETDEPT " .mysqli_error($db_connection));
                     }


                     //check the number of rows

                     $rows_getDept = mysqli_num_rows($queryGetDept);

                     if ($rows_getDept == 0) {
                        
                        echo "<div class='alert alert-danger'>Enter correct file number</div>";
                     }

                        
                        $table = "<table class='table-striped table-bordered'>";
                        $table .= "<tr>";
                        $table .= "<th>S/N</th>";
                        $table .= "<th>File Number</th>";
                        $table .= "<th>Department</th>";
                        $table .= "<th>User</th>";
                        $table .= "<th>Edit</th>";
                        $table .= "</tr>";

                 while ($fetch_getDept = mysqli_fetch_assoc($queryGetDept)) {

                    $table .= "<tr>";
                    $table .= "<td></td>";
                    $table .= "<td>{$fetch_getDept['storeFileNo']}</td>";
                    $table .= "<td>{$fetch_getDept['dept_StoreFile']}</td>";
                    $table .= "<td>{$fetch_getDept['assignedUsers']}</td>";
                    $table .= "<td><a href='edit-user-file.php?userEditId={$fetch_getDept['storeFile_id']}'>EDIT</a></td>";
                    $table .= "</tr>";

                       }
                        $table .= "<table>";
                        echo $table;
                }
                 


            }

                      ?>


                      
                </div>
            </div>
          </div>

          <!--WHERE TO DISPLAYTHE SEARCH RESULT ENDS HERE -->








    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>


    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript" src="../script/jquery.js"></script>
</body>
</html> 