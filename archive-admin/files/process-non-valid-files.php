<?php

   if (isset($_POST['findButtonFiles'])) {
   	
   	   if (isset($_POST['filesDetails']) && $_POST['filesDetails'] == 'nonValidFiles') {
   	   	


   	   	    $theNonValidFiles = "SELECT * FROM storefile WHERE dept_StoreFile = 'Non-Valid' ";

   	   	    $queryNonValidFiles = mysqli_query($db_connection ,$theNonValidFiles);

   	   	    if (!$queryNonValidFiles) {
   	   	    	
   	   	    	die("could not query queryNonValidFiles " .mysqli_error($db_connection));
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

   	   	    while ($fetchNonValidFiles = mysqli_fetch_assoc($queryNonValidFiles)) {
   	   	    	
   	   	    	$table .= "<tr>";
   	   	    	$table .= "<td></td>";
   	   	    	$table .= "<td>{$fetchNonValidFiles['storeFileNo']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidFiles['dept_StoreFile']}</td>";
   	   	    	$table .= "<td>{$fetchNonValidFiles['assignedUsers']}</td>";

                  $theFilePicker = "SELECT * FROM store_admin WHERE id = '".$fetchNonValidFiles['storePickerId']."' ";
                  $queryTheFilePicker = mysqli_query($db_connection,$theFilePicker);

                  if (!$queryTheFilePicker) {
                     die("could not query QUERY THE FILEPICKER" .mysqli_error($db_connection));
                  }

                  $fetchThePicker = mysqli_fetch_assoc($queryTheFilePicker);

   	   	    	$table .= "<td>{$fetchThePicker['store_userFullName']}</td>";

   	   	    	$table .= "<td>{$fetchNonValidFiles['pickUpDate']}</td>";
                  $table .= "<td><a href='edit-file.php?FileId=$fetchNonValidFiles[storeFile_id]'><button>Edit</button></a></td>";
                  $table .= "<form method ='POST'>";
                  $table .= "<td><button type='submit' name='delNonValidFileId' onclick ='return deleteFile()'>Delete</button></td>";
                  $table .= "<input type='hidden' value='$fetchNonValidFiles[storeFile_id]' name='nonValidFileId'>";
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