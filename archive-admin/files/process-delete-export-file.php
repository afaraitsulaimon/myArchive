<?php 

    if (isset($_POST['delExportFileId'])) {
    	
    	$idOfExportFileToDel = $_POST['exportFileId'];

    	$delTheExportFile = "DELETE FROM storefile WHERE storeFile_id = $idOfExportFileToDel";

    	$queryDelTheExportFile = mysqli_query($db_connection,$delTheExportFile);


    	if (!$queryDelTheExportFile) {
    		
    		die("could not query DELTHE EXPORT FILE" .mysqli_error($db_connection));
    	}

    	header("Location:files.php?exportFileDeleteStatus=deleted");
    	exit();
    }
 ?>