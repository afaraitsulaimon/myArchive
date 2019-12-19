<?php
   if (isset($_POST['deleteAdminDetails'])) {
   	
   	   //get the id of the clicked one

    $idToDeleteFromLc = $_POST['idOfLcStoreAdmin'];

    $adminDetailsToDelete = "DELETE FROM store_admin WHERE id = $idToDeleteFromLc";

    $queryDeleteLcAdmin = mysqli_query($db_connection,$adminDetailsToDelete);

    if (!$queryDeleteLcAdmin) {
    	 die("could not query QUERYDELETELCADMIN" .mysqli_error($db_connection));
    }

    header("Location:admin-store-admin.php?adminDeleted=success");
    exit();

   }

?>