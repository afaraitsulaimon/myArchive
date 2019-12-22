<?php
   
   if (isset($_POST['editFileButton'])) {


   	$errEditNonValidFile = array();

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
   	
   	   $errEditNonValidFile[] = 'Enter File Number';
   }


   if (strlen($EditedFileNo) <= 6) {

   	$errEditNonValidFile[] = 'Too short, must be Longer than 6';

   }


   if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'noFile') {
   	
   	$errEditNonValidFile[] = 'Select Department';

   }


    if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == 'noUser') {
      

        $errEditNonValidFile[] = "Select File User";
   }
   
   


   if (isset($_POST['pickerOfFile']) && $_POST['pickerOfFile'] == 'noPicker') {
   	
   	$errEditNonValidFile[] = 'Select a File Picker';

   }



   if (empty($errEditNonValidFile)) {
   	
   	$updateNonValidFiles = "UPDATE storefile SET storeFileNo = '$EditedFileNo', dept_StoreFile = '". $_POST['filesDept'] ."', assignedUsers = '". $_POST['userOfFile'] ."', storePickerId = '". $_POST['pickerOfFile'] ."', pickUpDate = NOW() WHERE storeFile_id = $theIdNoToEdit ";




   	  $queryUpdateNonValidFile = mysqli_query($db_connection,$updateNonValidFiles);

   	  if (!$queryUpdateNonValidFile) {
   	  	
   	  	die("could not query QUERYUPDATE NON VALID FILE" .mysqli_error($db_connection));
   	  }

   	  header("Location:edit-file.php?nonValidEditFileStatus=successful");
   	  exit();


   }else{

    $errEditNonValidFileMess = "<ul>";

    foreach ($errEditNonValidFile as $errorEditNonValidFile) {
    	
    	$errEditNonValidFileMess .= "<li>$errorEditNonValidFile</li>";
    }

    $errEditNonValidFileMess .= "</ul>";

   }


   }

?>