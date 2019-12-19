<?php
   if (isset($_POST['deleteInvisibleAdminDetails'])) {
   	
   	   //get the id of the clicked one

    $idToDeleteFromInvisible = $_POST['idOfInvisibleStoreAdmin'];

    $deleteInvisibleAdminDet = "DELETE FROM store_admin WHERE id = $idToDeleteFromInvisible";

    $queryDeleteInvisibleAdminDet = mysqli_query($db_connection,$deleteInvisibleAdminDet);

    if (!$queryDeleteInvisibleAdminDet) {
    	 die("could not query queryDeleteInvisibleAdminDet" .mysqli_error($db_connection));
    }

    header("Location:admin-store-admin.php?invisibleAdminDeleted=success");
    exit();

   }

?>