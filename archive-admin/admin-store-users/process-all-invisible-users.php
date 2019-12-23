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
                  
                  $table .= "<td><a href='edit-fileusers-admin.php?editUserId=$fetchInvisibleUsers[user_id]'><button>Edit</button></a></td>";
                  $table .= "<form method='POST'>";
                  $table .= "<td><button name='invisibleDeletebutton' onclick='return deleteUsers()'>Delete</button></td>";
                  $table .= "<input type='hidden' value ='$fetchInvisibleUsers[user_id]' name='invisibleIdNumber'>";
                  $table .= "</form>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
                echo "<div class='bg bg-secondary text-center mt-4 mb-4'>Invisible Users</div>";
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