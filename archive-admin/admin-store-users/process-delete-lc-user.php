<?php

    if (isset($_POST['delLcUserBut'])) {
    	
    	$theLcIdNo = sanitize($_POST['lcDelId']);

    	$delLcUser = "DELETE FROM users WHERE user_id = $theLcIdNo";

    	$queryDelLcUser = mysqli_query($db_connection, $delLcUser);

    	if (!$queryDelLcUser) {
    		
    		die("could not query QUERY DEL LC USER" .mysqli_error($db_cconnection));
    	}


         header("Location:admin-users.php?deleteLC=correct");
         exit();
    }
?>