<?php

    if (isset($_POST['delBillUserBut'])) {
    	
    	$theBillsIdNo = sanitize($_POST['billsUserId']);


    	$delBillsUser = "DELETE FROM users WHERE user_id = $theBillsIdNo";

    	$queryDelBillsUser = mysqli_query($db_connection, $delBillsUser);

    	if (!$queryDelBillsUser) {
    		
    		die("could not query QUERY DEL INV USER" .mysqli_error($db_cconnection));
    	}


         header("Location:admin-users.php?deleteBills=correct");
         exit();
    }
?>