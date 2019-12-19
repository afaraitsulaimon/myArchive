<?php
   if (isset($_POST['deleteExportAdminDetails'])) {
   	
   	   //get the id of the clicked one

    $idToDeleteFromExport = $_POST['idOfExportStoreAdmin'];

    $deleteExportAdminDet = "DELETE FROM store_admin WHERE id = $idToDeleteFromExport";

    $queryDeleteExportAdminDet = mysqli_query($db_connection,$deleteExportAdminDet);

    if (!$queryDeleteExportAdminDet) {
    	 die("could not query queryDeleteExportAdminDet" .mysqli_error($db_connection));
    }

    header("Location:admin-store-admin.php?exportAdminDeleted=success");
    exit();

   }

?>