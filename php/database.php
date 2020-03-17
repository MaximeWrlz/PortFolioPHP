<?php 
$DB_DSN = "mysql:dbname=php;host=localhost";
$DB_USER = "php";
$DB_PASSWORD = "phpmmi14%";

try{
	$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
 	echo 'Echec de la connexion:' . $e->getMessage();
 }
?>