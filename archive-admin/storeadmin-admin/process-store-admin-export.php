<?php
  if (isset($_POST['findButton'])) {
  	
  	  if (isset($_POST['storeAdminUsers']) && $_POST['storeAdminUsers'] == 'exportStoreAdminUsers') {
  		
  		

  		$exportStore_Admin = "SELECT * FROM store_admin WHERE store_user_dept = 'Export' ";
  		 
  

  		 $queryExportStore_Admin = mysqli_query($db_connection, $exportStore_Admin);




  		 if (!$queryExportStore_Admin ) {
  		 	
  		 	die("could not query queryExportStore_Admin  ".mysqli_error($db_connection));
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
  	    $table .= "<th>Edit</th>";
  	    $table .= "<th>Delete</th>";
  	    $table .= "</tr>";

  	    while ($fetchExportStore_Admin = mysqli_fetch_assoc($queryExportStore_Admin )) {
  	    	
  		$table .= "<tr>";
  		$table .= "<td></td>";
  		$table .= "<td>{$fetchExportStore_Admin['store_userFullName']}</td>";
  		$table .= "<td>{$fetchExportStore_Admin['store_username']}</td>";
  		$table .= "<td>{$fetchExportStore_Admin['store_user_email']}</td>";
  		$table .= "<td>{$fetchExportStore_Admin['store_user_dept']}</td>";
  		$table .= "<td>{$fetchExportStore_Admin['store_user_password']}</td>";
  		$table .= "<td>{$fetchExportStore_Admin['store_user_regDate']}</td>";
      $table.= "<form method='POST'>";
  		$table .= "<td><a href='edit-store-administrative.php?editAdminPerson=$fetchExportStore_Admin[id]'><button>Edit</button></a></td>";
  		$table .= "<td><button name='deleteExportAdminDetails' onclick = 'return deleteStoreAdmin()'>Delete</button></td>";
      $table .= "<input type='hidden' name= 'idOfExportStoreAdmin' value = '$fetchExportStore_Admin[id]' >";

      $table.= "</form>";
  		$table .= "</tr>";
  	    }
  	    $table .= "</table>";
  	    echo $table;



  	}

  }

      

?>