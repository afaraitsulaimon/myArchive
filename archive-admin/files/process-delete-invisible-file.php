<?php 

    if (isset($_POST['delInvisibleFileId'])) {
    	
    	$idOfInvisibleFileToDel = $_POST['invisibleFileId'];

    	$delTheInvisibleFile = "DELETE FROM storefile WHERE storeFile_id = $idOfInvisibleFileToDel";

    	$queryDelTheInvisibleFile = mysqli_query($db_connection,$delTheInvisibleFile);


    	if (!$queryDelTheInvisibleFile) {
    		
    		die("could not query DELTHE INVISIBLE FILE" .mysqli_error($db_connection));
    	}

    	header("Location:files.php?invisibleFileDeleteStatus=deleted");
    	exit();
    }
 ?>