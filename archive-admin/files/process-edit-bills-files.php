<?php
   
   if (isset($_POST['editFileButton'])) {


   	$errEditBillFile = array();

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
   	
   	   $errEditBillFile[] = 'Enter File Number';
   }


   if (strlen($EditedFileNo) <= 6) {

   	$errEditBillFile[] = 'Too short, must be Longer than 6';

   }


   if (isset($_POST['filesDept']) && $_POST['filesDept'] == 'noFile') {
   	
   	$errEditBillFile[] = 'Select Department';

   }


    if (isset($_POST['userOfFile']) && $_POST['userOfFile'] == 'noUser') {
      

        $errEditBillFile[] = "Select File User";
   }
   
   


   if (isset($_POST['pickerOfFile']) && $_POST['pickerOfFile'] == 'noPicker') {
   	
   	$errEditBillFile[] = 'Select a File Picker';

   }



   if (empty($errEditBillFile)) {
   	
   	$updateBillsFiles = "UPDATE storefile SET storeFileNo = '$EditedFileNo', dept_StoreFile = '". $_POST['filesDept'] ."', assignedUsers = '". $_POST['userOfFile'] ."', storePickerId = '". $_POST['pickerOfFile'] ."', pickUpDate = NOW() WHERE storeFile_id = $theIdNoToEdit ";




   	  $queryUpdateBillsFile = mysqli_query($db_connection,$updateBillsFiles);

   	  if (!$queryUpdateBillsFile) {
   	  	
   	  	die("could not query QUERYUPDATEBILLSFILE" .mysqli_error($db_connection));
   	  }

   	  header("Location:edit-file.php?billsEditFileStatus=successful");
   	  exit();


   }else{

    $errEditBillsFileMess = "<ul>";

    foreach ($errEditBillFile as $errorEditBillFile) {
    	
    	$errEditBillsFileMess .= "<li>$errorEditBillFile</li>";
    }

    $errEditBillsFileMess .= "</ul>";

   }


   }

?>