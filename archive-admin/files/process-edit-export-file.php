<?php
   
   if (isset($_POST['editFileButton'])) {


   	$errEditExportFile = array();

   	$EditedFileNo = sanitize($_POST['editFileNo']);
   	$theIdNoToEdit = sanitize($_POST['idNoToEdit']);

   	if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'LC') {
   		
   		$theLcFileDept = $_POST['filesDept'];
   	}

   	if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'Bills') {
   		
   		$theBillsFileDept = $_POST['filesDept'];
   	}

   	if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'Invisible') {
   		
   		$theInvisibleFileDept = $_POST['filesDept'];
   	}

   	if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'Non-Valid') {
   		
   		$theNonValidFileDept = $_POST['filesDept'];
   	}


   	if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'Export') {
   		
   		$theExportFileDept = $_POST['filesDept'];
   	}


   if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == '$fetchEditUser[users_FullName]') {
   	

      $editedUserOfFile = $_POST['userOfFile'];
   }
   

   if (isset($_POST['pickerOfFile']) && $_POST['pickerOfFile'] == '$fetchEditPicker[id]') {
   	
   	$editedPickerOfFile = $_POST['pickerOfFile'];

   }

//check for errors

   if (empty($EditedFileNo)) {
   	
   	   $errEditExportFile[] = 'Enter File Number';
   }


   if (strlen($EditedFileNo) <= 6) {

   	$errEditExportFile[] = 'Too short, must be Longer than 6';

   }


   if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'noFile') {
   	
   	$errEditExportFile[] = 'Select Department';

   }


    if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == 'noUser') {
      

        $errEditExportFile[] = "Select File User";
   }
   
   


   if (isset($_POST['pickerOfFile']) && $_POST['pickerOfFile'] == 'noPicker') {
   	
   	$errEditExportFile[] = 'Select a File Picker';

   }



   if (empty($errEditExportFile)) {
   	
   	$updateExportFiles = "UPDATE storefile SET storeFileNo = '$EditedFileNo', dept_StoreFile = '". $_POST['filesDept'] ."', assignedUsers = '". $_POST['userOfFile'] ."', storePickerId = '". $_POST['pickerOfFile'] ."', pickUpDate = NOW() WHERE storeFile_id = $theIdNoToEdit ";




   	  $queryUpdateExportFile = mysqli_query($db_connection,$updateExportFiles);

   	  if (!$queryUpdateExportFile) {
   	  	
   	  	die("could not query QUERYUPDATE EXPORT FILE" .mysqli_error($db_connection));
   	  }

   	  header("Location:edit-file.php?exportEditFileStatus=successful");
   	  exit();


   }else{

    $errEditExportFileMess = "<ul>";

    foreach ($errEditExportFile as $errorEditExportFile) {
    	
    	$errEditExportFileMess .= "<li>$errorEditExportFile</li>";
    }

    $errEditExportFileMess .= "</ul>";

   }


   }

?>