<?php

    if (isset($_POST['invisibleDeletebutton'])) {
    	
    	$theInvIdNo = sanitize($_POST['invisibleIdNumber']);


    	$delInvisibleUser = "DELETE FROM users WHERE user_id = $theInvIdNo";

    	$queryDelInvUser = mysqli_query($db_connection, $delInvisibleUser);

    	if (!$queryDelInvUser) {
    		
    		die("could not query QUERY DEL INV USER" .mysqli_error($db_cconnection));
    	}


         header("Location:admin-users.php?deleteInv=correct");
         exit();
    }
?>