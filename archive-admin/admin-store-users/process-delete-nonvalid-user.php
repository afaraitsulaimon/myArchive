<?php

    if (isset($_POST['nonValidDelUserBut'])) {
    	
    	$theNonValidIdNo = sanitize($_POST['nonValidDelId']);

    	$delNonValidUser = "DELETE FROM users WHERE user_id = $theNonValidIdNo";

    	$queryDelNonValidUser = mysqli_query($db_connection, $delNonValidUser);

    	if (!$queryDelNonValidUser) {
    		
    		die("could not query QUERY DEL Non Valid USER" .mysqli_error($db_cconnection));
    	}


         header("Location:admin-users.php?deleteNonValid=correct");
         exit();
    }
?>