<?php

    if (isset($_POST['expDelBut'])) {
    	
    	$theExportIdNo = sanitize($_POST['expUserId']);


    	$delExportUser = "DELETE FROM users WHERE user_id = $theExportIdNo";

    	$queryDelExportUser = mysqli_query($db_connection, $delExportUser);

    	if (!$queryDelExportUser) {
    		
    		die("could not query QUERY DEL EXPORT USER" .mysqli_error($db_cconnection));
    	}


         header("Location:admin-users.php?deleteExport=correct");
         exit();
    }
?>