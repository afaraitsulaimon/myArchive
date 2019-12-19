<?php
   if (isset($_POST['deleteNonValidAdminDetails'])) {
   	
   	   //get the id of the clicked one

    $idToDeleteFromNonValid = $_POST['idOfNonValidStoreAdmin'];

    $deleteNonValidAdminDet = "DELETE FROM store_admin WHERE id = $idToDeleteFromNonValid";

    $queryDeleteNonValidAdminDet = mysqli_query($db_connection,$deleteNonValidAdminDet);

    if (!$queryDeleteNonValidAdminDet) {
    	 die("could not query queryDeleteNonValidAdminDet" .mysqli_error($db_connection));
    }

    header("Location:admin-store-admin.php?nonValidAdminDeleted=success");
    exit();

   }

?>