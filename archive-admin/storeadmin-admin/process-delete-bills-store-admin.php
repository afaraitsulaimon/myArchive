<?php
   if (isset($_POST['deleteBillAdminDetails'])) {
   	
   	   //get the id of the clicked one

    $idToDeleteFromBills = $_POST['idOfBillsStoreAdmin'];

    $deleteBillsAdminDet = "DELETE FROM store_admin WHERE id = $idToDeleteFromBills";

    $queryDeleteBillsAdminDet = mysqli_query($db_connection,$deleteBillsAdminDet);

    if (!$queryDeleteBillsAdminDet) {
    	 die("could not query queryDeleteBillsAdminDet" .mysqli_error($db_connection));
    }

    header("Location:admin-store-admin.php?billsAdminDeleted=success");
    exit();

   }

?>