<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'billsUsers') {
   	   	


   	   	    $theBillsUsers = "SELECT * FROM users WHERE users_department = 'Bills' ";

   	   	    $queryBillsUsers = mysqli_query($db_connection ,$theBillsUsers);

   	   	    if (!$queryBillsUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-BILLS-USERS" .mysqli_error($db_connection));
   	   	    }


   	   	    $table = "<table class='table table-striped table-bordered'>";
   	   	    $table .= "<tr>";
   	   	    $table .= "<th>S/N</th>";
   	   	    $table .= "<th>Fullname</th>";
   	   	    $table .= "<th>Username</th>";
   	   	    $table .= "<th>Email</th>";
   	   	    $table .= "<th>Department</th>";
   	   	    $table .= "<th>Password</th>";
   	   	    $table .= "<th>Registration Date</th>";
                $table .= "<th>Edit</th>";
                $table .= "<th>Delete</th>";
   	   	    $table .= "</tr>";

   	   	    while ($fetchBillsUsers = mysqli_fetch_assoc($queryBillsUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchBillsUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchBillsUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchBillsUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchBillsUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchBillsUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchBillsUsers['usersRegDate']}</td>";
                  $table .= "<th><a href=''><button>Edit</button></a></th>";
                  $table .= "<th><button>Delete</button></th>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>