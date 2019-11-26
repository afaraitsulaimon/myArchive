<?php
     require_once('../database/db_connect.php');
     require_once('../handler/handler.php');



   if (isset($_POST['delete-storeFile'])) {
   	

   	// the id of the file you want to delete

   	$thefileIdToDelete = $_POST['theStoreFileId'];

   	$sqlFile = "SELECT * FROM storefile WHERE storeFile_id = $thefileIdToDelete";



    $queryFile = mysqli_query($db_connection, $sqlFile);



    if (!$queryFile) {
    	
    	die("could not query QUERYFILE" .mysqli_error($db_connection));

      }
    	//fetch the id and compare it
    	//Then delete the particular file

    	$fetchFile = mysqli_fetch_array($queryFile);
    	

    	$theFileId = $fetchFile['storeFile_id'];





    //THEN DELETE THE FILE
$fileToDelete = "DELETE FROM storefile WHERE storeFile_id = $theFileId";



    $fileToDelete_query = mysqli_query($db_connection, $fileToDelete);

    if (!$fileToDelete_query) {
    	
    	die("could not query FILETODELETE_QUERY" .mysqli_error($db_connection));
    }

    header("location:store-dashboard.php?deleteStatus=deleted");
    exit();

   }
?>