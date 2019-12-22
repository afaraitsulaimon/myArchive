<?php 

    if (isset($_POST['delNonValidFileId'])) {
    	
    	$idOfNonValidFileToDel = $_POST['nonValidFileId'];

    	$delTheNonValidFile = "DELETE FROM storefile WHERE storeFile_id = $idOfNonValidFileToDel";

    	$queryDelTheNonValidFile = mysqli_query($db_connection,$delTheNonValidFile);


    	if (!$queryDelTheNonValidFile) {
    		
    		die("could not query DELTHE NON VALID FILE" .mysqli_error($db_connection));
    	}

    	header("Location:files.php?nonValidFileDeleteStatus=deleted");
    	exit();
    }
 ?>