<?php 

    if (isset($_POST['delLcFileId'])) {
    	
    	$idOfLcFileToDel = $_POST['lcFileId'];

    	$delTheLcFile = "DELETE FROM storefile WHERE storeFile_id = $idOfLcFileToDel";

    	$queryDelTheLcFile = mysqli_query($db_connection,$delTheLcFile);


    	if (!$queryDelTheLcFile) {
    		
    		die("could not query DELTHELCFILE" .mysqli_error($db_connection));
    	}

    	header("Location:files.php?lcFileDeleteStatus=deleted");
    	exit();
    }
 ?>