<?php
 
//connection_database.php
 
$connect = new PDO('mysql:host=localhost;dbname=badminton', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ]);
 
?>