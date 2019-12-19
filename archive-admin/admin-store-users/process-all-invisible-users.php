<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'invisibleUsers') {
   	   	


   	   	    $theInvisibleUsers = "SELECT * FROM users WHERE users_department = 'Invisible' ";

   	   	    $queryInvisibleUsers = mysqli_query($db_connection ,$theInvisibleUsers);

   	   	    if (!$queryInvisibleUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-Invisible-USERS" .mysqli_error($db_connection));
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

   	   	    while ($fetchInvisibleUsers = mysqli_fetch_assoc($queryInvisibleUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchInvisibleUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleUsers['usersRegDate']}</td>";
                  $table .= "<th><a href=''><button>Edit</button></a></th>";
                  $table .= "<th><button>Delete</button></th>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>