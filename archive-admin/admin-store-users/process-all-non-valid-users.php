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
                 
                  $table .= "<th><a href='edit-fileusers-admin.php?editUserId=$fetchNonValidUsers[user_id]'><button>Edit</button></a></th>";
                    $table .= "<form method='POST'>";
                  $table .= "<th><button onclick=' return deleteUsers()' name='nonValidDelUserBut'>Delete</button></th>";
                  $table .= "<input type='hidden' name='nonValidDelId' value='$fetchNonValidUsers[user_id]'>";
                  $table .= "</form>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
                echo "<div class=' alert alert-secondary text-center mt-4 mb-4 text-primary'>Non-Valid Users</div>";
   	   	    echo $table;
   	   }
   }
?>

<script type="text/javascript">
   function deleteUsers() {
      var delUser = confirm("Are you sure you want to delete");

      if (delUser == true) {

          alert('Record Delete');
      } else {

          alert('Record Not deleted');
      }

      return delUser;
  }

</script>