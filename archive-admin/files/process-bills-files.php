<?php

   if (isset($_POST['findButtonFiles'])) {
   	
   	   if (isset($_POST['filesDetails']) && $_POST['filesDetails'] == 'billsFiles') {
   	   	


   	   	    $theBillsFiles = "SELECT * FROM storefile WHERE dept_StoreFile = 'Bills' ";

   	   	    $queryTheBillsFiles = mysqli_query($db_connection ,$theBillsFiles);

   	   	    if (!$queryTheBillsFiles) {
   	   	    	
   	   	    	die("could not query QUERYTHEBILLSFILES " .mysqli_error($db_connection));
   	   	    }

              

   	   	    $table = "<table class='table table-striped table-bordered'>";
   	   	    $table .= "<tr>";
   	   	    $table .= "<th>S/N</th>";
   	   	    $table .= "<th>File Number</th>";
   	   	    $table .= "<th>Department</th>";
   	   	    $table .= "<th>Assigned User</th>";
   	   	    $table .= "<th>File Picker</th>";
   	   	    $table .= "<th>Pick-up Date</th>";
                $table .= "<th>Edit</th>";
                $table .= "<th>Delete</th>";
   	   	    $table .= "</tr>";

   	   	    while ($fetchTheBillsFiles = mysqli_fetch_assoc($queryTheBillsFiles)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchTheBillsFiles['storeFileNo']}</td>";
   	   	    	$table .= "<td>{$fetchTheBillsFiles['dept_StoreFile']}</td>";
   	   	    	$table .= "<td>{$fetchTheBillsFiles['assignedUsers']}</td>";

                  $theFilePicker = "SELECT * FROM store_admin WHERE id = '".$fetchTheBillsFiles['storePickerId']."' ";
                  $queryTheFilePicker = mysqli_query($db_connection,$theFilePicker);

                  if (!$queryTheFilePicker) {
                     die("could not query QUERY THE FILEPICKER" .mysqli_error($db_connection));
                  }

                  $fetchThePicker = mysqli_fetch_assoc($queryTheFilePicker);

   	   	    	$table .= "<td>{$fetchThePicker['store_userFullName']}</td>";

   	   	    	$table .= "<td>{$fetchTheBillsFiles['pickUpDate']}</td>";
                  $table .= "<td><a href='edit-file.php?FileId=$fetchTheBillsFiles[storeFile_id]'><button>Edit</button></a></td>";
                  $table .= "<form method ='POST'>";
                  $table .= "<td><button type='submit' name='delBillsFileId' onclick ='return deleteFile()'>Delete</button></td>";
                  $table .= "<input type='hidden' value='$fetchTheBillsFiles[storeFile_id]' name='billsFileId'>";
                  $table .= "</form>";
   	   	    	$table .= "</tr>";


   	   	    }

   	   	    $table .= "</table>";
   	   	    echo $table;
   	   }
   }
?>

<script type="text/javascript">
   function deleteFile() {
      var delFile = confirm("Are you sure you want to delete");

      if (delFile == true) {

          alert('Record Delete');
      } else {

          alert('Record Not deleted');
      }

      return delFile;
  }


</script>