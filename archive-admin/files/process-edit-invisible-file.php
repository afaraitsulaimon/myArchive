<?php
   
   if (isset($_POST['editFileButton'])) {


   	$errEditInvisibleFile = array();

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
   	
   	   $errEditInvisibleFile[] = 'Enter File Number';
   }


   if (strlen($EditedFileNo) <= 6) {

   	$errEditInvisibleFile[] = 'Too short, must be Longer than 6';

   }


   if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'noFile') {
   	
   	$errEditInvisibleFile[] = 'Select Department';

   }


    if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == 'noUser') {
      

        $errEditInvisibleFile[] = "Select File User";
   }
   
   


   if (isset($_POST['pickerOfFile']) && $_POST['pickerOfFile'] == 'noPicker') {
   	
   	$errEditInvisibleFile[] = 'Select a File Picker';

   }



   if (empty($errEditInvisibleFile)) {
   	
   	$updateInvisibleFiles = "UPDATE storefile SET storeFileNo = '$EditedFileNo', dept_StoreFile = '". $_POST['filesDept'] ."', assignedUsers = '". $_POST['userOfFile'] ."', storePickerId = '". $_POST['pickerOfFile'] ."', pickUpDate = NOW() WHERE storeFile_id = $theIdNoToEdit ";




   	  $queryUpdateInvisibleFile = mysqli_query($db_connection,$updateInvisibleFiles);

   	  if (!$queryUpdateInvisibleFile) {
   	  	
   	  	die("could not query QUERYUPDATEINVISIBLESFILE" .mysqli_error($db_connection));
   	  }

   	  header("Location:edit-file.php?InvisibleEditFileStatus=successful");
   	  exit();


   }else{

    $errEditInvisibleFileMess = "<ul>";

    foreach ($errEditInvisibleFile as $errorEditInvisibleFile) {
    	
    	$errEditInvisibleFileMess .= "<li>$errorEditInvisibleFile</li>";
    }

    $errEditInvisibleFileMess .= "</ul>";

   }


   }

?>