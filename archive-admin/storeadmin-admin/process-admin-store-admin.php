<?php
  if (isset($_POST['findButton'])) {
  	
  	  if (isset($_POST['storeAdminUsers']) && $_POST['storeAdminUsers'] == 'allStoreAdminUsers') {
  		
  		

  		$allStore_Admin = "SELECT * FROM store_admin";
  		 
  

  		 $queryAllStore_Admin = mysqli_query($db_connection, $allStore_Admin);




  		 if (!$queryAllStore_Admin) {
  		 	
  		 	die("could not query QUERYALLSTORE_ADMIN ".mysqli_error($db_connection));
  		 }


  	    $table = "<table class='table table-striped table-bordered'>";
  	    $table .= "<tr>";
  	    $table .= "<th>S/N</th>";
  	    $table .= "<th>Fullname</th>";
  	    $table .= "<th>Username</th>";
  	    $table .= "<th>Email</th>";
  	    $table .= "<th>Department</th>";
  	    $table .= "<th>Password</th>";
  	    $table .= "<th>Reg Date</th>";
  	   
  	    $table .= "</tr>";

  	    while ($countAll = mysqli_fetch_assoc($queryAllStore_Admin)) {
  	    	
  		$table .= "<tr>";
  		$table .= "<td></td>";
  		$table .= "<td>{$countAll['store_userFullName']}</td>";
  		$table .= "<td>{$countAll['store_username']}</td>";
  		$table .= "<td>{$countAll['store_user_email']}</td>";
  		$table .= "<td>{$countAll['store_user_dept']}</td>";
  		$table .= "<td>{$countAll['store_user_password']}</td>";
  		$table .= "<td>{$countAll['store_user_regDate']}</td>";
  		$table .= "</tr>";
  	    }
  	    $table .= "</table>";
  	    echo $table;



  	}

  }

      

?>