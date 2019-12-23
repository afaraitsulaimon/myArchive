<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'lcUsers') {
   	   	


   	   	    $theLcUsers = "SELECT * FROM users WHERE users_department = 'LC' ";

   	   	    $queryLcUsers = mysqli_query($db_connection ,$theLcUsers);

   	   	    if (!$queryLcUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-LC-USERS" .mysqli_error($db_connection));
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

   	   	    while ($fetchLcUsers = mysqli_fetch_assoc($queryLcUsers)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchLcUsers['users_FullName']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['usersUsername']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['users_email']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['users_department']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['usersPassword']}</td>";
   	   	    	$table .= "<td>{$fetchLcUsers['usersRegDate']}</td>";
                  $table .= "<td><a href='edit-fileusers-admin.php?editUserId=$fetchLcUsers[user_id]'><button>Edit</button></a></td>";
                  $table .= "<form method='POST'>";
                  $table .= "<td><button onclick='return deleteUsers()' name='delLcUserBut'>Delete</button></td>";
                  $table .= "<input type='hidden' name='lcDelId' value='$fetchLcUsers[user_id]'>";
                  $table .= "</form>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
                echo "<div class=' alert alert-secondary text-center mt-4 mb-4'>LC Users</div>";
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