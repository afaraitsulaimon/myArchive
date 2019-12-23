<?php

   if (isset($_POST['findButtonUsers'])) {
   	
   	   if (isset($_POST['usersOfFiles']) && $_POST['usersOfFiles'] == 'billsUsers') {
   	   	


   	   	    $theBillsUsers = "SELECT * FROM users WHERE users_department = 'Bills' ";

   	   	    $queryBillsUsers = mysqli_query($db_connection ,$theBillsUsers);

   	   	    if (!$queryBillsUsers) {
   	   	    	
   	   	    	die("could not query QUERYALL-BILLS-USERS" .mysqli_error($db_connection));
   	   	    }


   	   	    $table = "<table class='table table-striped table-bordered mt-4'>";
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
                  
                  $table .= "<td><a href='edit-fileusers-admin.php?editUserId=$fetchBillsUsers[user_id]'><button>Edit</button></a></td>";
                  $table .= "<form method='POST'>";
                  $table .= "<td><button name='delBillUserBut' onclick=' return deleteUsers()'>Delete</button></td>";
                  $table .= "<input type='hidden' name = 'billsUserId' value='$fetchBillsUsers[user_id]'>";
                  $table .= "</form>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
                echo "<div class='bg bg-secondary text-center mt-4 '>Bills Users</div>";
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