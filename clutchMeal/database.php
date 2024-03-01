<?php 
   define("db_server", "localhost");
   define("db_username", "Andrew");
   define("db_password", "Nhuductrang1234?");
   define("db_name", "clutch_meal");

   try{
        $connect = mysqli_connect(db_server, db_username, db_password, db_name);
   }
   catch(mysqli_sql_exception){
        echo "Connection to database failed";
   }

?>
