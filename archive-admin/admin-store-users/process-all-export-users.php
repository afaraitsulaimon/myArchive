<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'exportUsers') {
   	   	


   	   	    $theExportUsers = "SELECT * FROM users WHERE users_department = 'Export' ";

   	   	    $queryExportUsers = mysqli_query($db_connection ,$theExportUsers);

   	   	    if (!$queryExportUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-Export-USERS" .mysqli_error($db_connection));
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

   	   	    while ($fetchExportUsers = mysqli_fetch_assoc($queryExportUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchExportUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchExportUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchExportUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchExportUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchExportUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchExportUsers['usersRegDate']}</td>";
                  
                  $table .= "<th><a href='edit-fileusers-admin.php?editUserId=$fetchExportUsers[user_id]'><button>Edit</button></a></th>";
                  $table .= "<form method='POST'>";
                  $table .= "<th><button onclick = 'return deleteUsers()' name='expDelBut'>Delete</button></th>";
                  $table .= "<input type='hidden' value='$fetchExportUsers[user_id]' name='expUserId'>";
                  $table .= "</form>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
                echo "<div class='bg bg-secondary text-center mt-4 mb-4'>Export Users</div>";
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