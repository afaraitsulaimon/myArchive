<?php

   if (isset($_POST['findButtonFiles'])) {
   	
   	   if (isset($_POST['filesDetails']) && $_POST['filesDetails'] == 'invisibleFiles') {
   	   	


   	   	    $theInvisibleFiles = "SELECT * FROM storefile WHERE dept_StoreFile = 'Invisible' ";

   	   	    $queryInvisibleFiles = mysqli_query($db_connection ,$theInvisibleFiles);

   	   	    if (!$queryInvisibleFiles) {
   	   	    	
   	   	    	die("could not query queryInvisibleFiles " .mysqli_error($db_connection));
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

   	   	    while ($fetchInvisibleFiles = mysqli_fetch_assoc($queryInvisibleFiles)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchInvisibleFiles['storeFileNo']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleFiles['dept_StoreFile']}</td>";
   	   	    	$table .= "<td>{$fetchInvisibleFiles['assignedUsers']}</td>";

                  $theFilePicker = "SELECT * FROM store_admin WHERE id = '".$fetchInvisibleFiles['storePickerId']."' ";
                  $queryTheFilePicker = mysqli_query($db_connection,$theFilePicker);

                  if (!$queryTheFilePicker) {
                     die("could not query QUERY THE FILEPICKER" .mysqli_error($db_connection));
                  }

                  $fetchThePicker = mysqli_fetch_assoc($queryTheFilePicker);

   	   	    	$table .= "<td>{$fetchThePicker['store_userFullName']}</td>";

   	   	    	$table .= "<td>{$fetchInvisibleFiles['pickUpDate']}</td>";
                  $table .= "<td><a href='edit-file.php?FileId=$fetchInvisibleFiles[storeFile_id]'><button>Edit</button></a></td>";
                  $table .= "<form method ='POST'>";
                  $table .= "<td><button type='submit' name='delInvisibleFileId' onclick ='return deleteFile()'>Delete</button></td>";
                  $table .= "<input type='hidden' value='$fetchInvisibleFiles[storeFile_id]' name='invisibleFileId'>";
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