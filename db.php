<?php

session_start();

define("DBHOST",'localhost');
define("DBUSER", 'root');
define("DBPASS", '');
define("DBNAME", 'crud_php');

$db = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

?>