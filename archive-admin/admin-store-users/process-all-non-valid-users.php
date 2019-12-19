<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'nonValidUsers') {
   	   	


   	   	    $theNonValidUsers = "SELECT * FROM users WHERE users_department = 'Non-Valid' ";

   	   	    $queryNonValidUsers = mysqli_query($db_connection ,$theNonValidUsers);

   	   	    if (!$queryNonValidUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-NonValid-USERS" .mysqli_error($db_connection));
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

   	   	    while ($fetchNonValidUsers = mysqli_fetch_assoc($queryNonValidUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchNonValidUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidUsers['usersRegDate']}</td>";
                  $table .= "<th><a href=''><button>Edit</button></a></th>";
                  $table .= "<th><button>Delete</button></th>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>