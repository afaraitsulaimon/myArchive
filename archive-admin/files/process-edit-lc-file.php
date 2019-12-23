<?php
   
   if (isset($_POST['editFileButton'])) {


   	$errEditFile = array();

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
   	
   	   $errEditFile[] = 'Enter File Number';
   }


   if (strlen($EditedFileNo) <= 6) {

   	$errEditFile[] = 'File Number should be longer than 6 letters';
   }


   if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'noFile') {
   	
   	$errEditFile[] = 'Select Department';

   }


   if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == 'noUser') {
   	

      $errEditFile[] = 'Select a User';
   }
   


   if (isset($_POST['pickerOfFile']) && $_POST['pickerOfFile'] == 'noPicker') {
   	
   	$errEditFile[] = 'Select a File Picker';

   }



   if (empty($errEditFile)) {
   	
   	$updateLcFiles = "UPDATE storefile SET storeFileNo = '$EditedFileNo', dept_StoreFile = '". $_POST['filesDept'] ."', assignedUsers = '". $_POST['userOfFile'] ."', storePickerId = '". $_POST['pickerOfFile'] ."', pickUpDate = NOW() WHERE storeFile_id = $theIdNoToEdit ";




   	  $queryUpdateLcFile = mysqli_query($db_connection,$updateLcFiles);

   	  if (!$queryUpdateLcFile) {
   	  	
   	  	die("could not query QUERYUPDATELCFILE" .mysqli_error($db_connection));
   	  }

   	  header("Location:edit-file.php?lcEditFileStatus=successful");
   	  exit();


   }else{

    $errEditFileMessage = "<ul>";

    foreach ($errEditFile as $errorEditFiles) {
    	
    	$errEditFileMessage .= "<li>$errorEditFiles</li>";
    }

    $errEditFileMessage .= "</ul>";

   }


   }

?>