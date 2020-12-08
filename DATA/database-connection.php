<?php
       define('HOST_PARAM', 'localhost');
       define('DBNAME', 'database-2014181');
       define('USERNAME', "root");
       define('PASSWORD', "1234");
#Connect to database with PDO
    $connection=new PDO("mysql:host=".HOST_PARAM.";dbname=".DBNAME."",USERNAME,PASSWORD);
#make sure errors in the queries are also catched
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>