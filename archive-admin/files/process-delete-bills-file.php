<?php 

    if (isset($_POST['delBillsFileId'])) {
    	
    	$idOfBillsFileToDel = $_POST['billsFileId'];

    	$delTheBillsFile = "DELETE FROM storefile WHERE storeFile_id = $idOfBillsFileToDel";

    	$queryDelTheBillsFile = mysqli_query($db_connection,$delTheBillsFile);


    	if (!$queryDelTheBillsFile) {
    		
    		die("could not query DELTHEBILLSFILE" .mysqli_error($db_connection));
    	}

    	header("Location:files.php?billsFileDeleteStatus=deleted");
    	exit();
    }
 ?>