<?php
   require_once('../database/db_connect.php');
   require_once('../handler/handler.php');

   if (isset($_POST['storeTheFile'])) {
   	


    //store the error message in an array

    $storeAddError = array();

    // store all the input details in a variable
     $theFileNumber = sanitize($_POST['fileToRetrive']);

    if (isset($_POST['storeFileDept']) && $_POST['storeFileDept'] == '$rowsDept[store_user_dept]') {

      $addStoreDept = $_POST['storeFileDept'];


    }




   if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == '$row[users_FullName]') {


      $fileUsers = $_POST['userOfFile'];
   }


   




    //check if empty input on none was selected
   //also if the lenght of the value for the file num

    if (isset($_POST['storeFileDept']) && $_POST['storeFileDept'] == 'noDept' ){
        
         $storeAddError[] = "Select a Department";

    }


    if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == 'noUser') {


        $storeAddError[] = "Select a User";
    }


    if (empty($theFileNumber)) {
      
      $storeAddError[] = "Enter a file number";
    }


    if (!empty($theFileNumber) && strlen($theFileNumber) > 18) {
      
      $storeAddError[] = "File number must not be more than 18";
    }

  

  // to get the picker id
   //select all from the store admin, where the user is logged in

        $logOnUserId = loggedInStore();

        $sqlPicker = "SELECT * FROM store_admin WHERE id = '$logOnUserId' ";


         $pickerQuery = mysqli_query($db_connection,$sqlPicker);


         if (!$pickerQuery) {
          
             die("could not query PICKERQUERY" .mysqli_error($db_connection));
         }

      $fetchPicker = mysqli_fetch_assoc($pickerQuery);

       $thePickerId = $fetchPicker['id'];


  
    // then insert into the database


    if (empty($storeAddError)) {
      
   
        $file_retrived =  "INSERT INTO storefile (storeFileNo,dept_StoreFile,assignedUsers,storePickerId,pickUpDate) VALUES('$theFileNumber', '". $_POST['storeFileDept'] ."', '". $_POST['userOfFile'] ."', $thePickerId , NOW())";

       

       $queryFile_retrived = mysqli_query($db_connection, $file_retrived);

          
if (!$queryFile_retrived) {
  
  die("couldnot query QUERYFILE_RETRIVED" .mysqli_error($db_connection));
}

         header("location:store-dashboard.php?retrieveStatus=successful");
         exit();

    }else{

      $errorMessageFromAdd = "<ul>";

      foreach ($storeAddError as $storeAddErrors) {
        
        $errorMessageFromAdd .= "<li> $storeAddErrors </li>";
      }

      $errorMessageFromAdd .= "</ul>";
    }








}
?>