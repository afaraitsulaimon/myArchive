<?php
  if (isset($_POST['findButton'])) {
  	
  	  if (isset($_POST['storeAdminUsers']) && $_POST['storeAdminUsers'] == 'billsStoreAdminUsers') {
  		
  		

  		$billsStore_Admin = "SELECT * FROM store_admin WHERE store_user_dept = 'Bills' ";
  		 
  

  		 $queryBillsStore_Admin = mysqli_query($db_connection, $billsStore_Admin);




  		 if (!$queryBillsStore_Admin) {
  		 	
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
  	    $table .= "<th>Edit</th>";
  	    $table .= "<th>Delete</th>";
  	    $table .= "</tr>";

  	    while ($fetchBillsStore_Admin = mysqli_fetch_assoc($queryBillsStore_Admin)) {
  	    	
  		$table .= "<tr>";
  		$table .= "<td></td>";
  		$table .= "<td>{$fetchBillsStore_Admin['store_userFullName']}</td>";
  		$table .= "<td>{$fetchBillsStore_Admin['store_username']}</td>";
  		$table .= "<td>{$fetchBillsStore_Admin['store_user_email']}</td>";
  		$table .= "<td>{$fetchBillsStore_Admin['store_user_dept']}</td>";
  		$table .= "<td>{$fetchBillsStore_Admin['store_user_password']}</td>";
  		$table .= "<td>{$fetchBillsStore_Admin['store_user_regDate']}</td>";
      $table.= "<form method='POST'>";
  		$table .= "<td><a href='edit-store-administrative.php?editAdminPerson=$fetchBillsStore_Admin[id]'><button>Edit</button></a></td>";
  		    $table .= "<td><button name='deleteBillAdminDetails' onclick = 'return deleteStoreAdmin()'>Delete</button></td>";
          $table .= "<input type='hidden' name= 'idOfBillsStoreAdmin' value = '$fetchBillsStore_Admin[id]' >";

          $table.= "</form>";
  		$table .= "</tr>";
  	    }
  	    $table .= "</table>";
  	    echo $table;



  	}

  }

      

?>


<script type="text/javascript">
   function deleteStoreAdmin() {
      var delAdmin = confirm("Are you sure you want to delete");

      if (delAdmin == true) {

          alert('Record Delete');
      } else {

          alert('Record Not deleted');
      }

      return delAdmin;
  }


</script>