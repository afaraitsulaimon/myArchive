<?php




 define('DBSERVER', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'myarchive');

//CONNECT TO THE SERVER USING THE SERVER,USER AND THE PASSWORD

   $db_connection = mysqli_connect(DBSERVER,DBUSER,DBPASS);

   if (!$db_connection) {
   	
   	die("could not connect to server" .mysqli_error($db_connection));
   }

   //CONNECT THE DATABASE

   $database = mysqli_select_db($db_connection, DBNAME);

   if (!$database) {
   	
   	die("could not connect to database" .mysqli_error($db_connection));
   }
?>