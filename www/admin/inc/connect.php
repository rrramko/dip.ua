<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="diplom";

mysql_connect("$dbhost", "$dbuser", "$dbpass") || die("Couldn't connect to MySQL");
  mysql_select_db("$dbname") || die("Couldn't open db: $dbname. Error if any was: ".mysql_error() );

?>