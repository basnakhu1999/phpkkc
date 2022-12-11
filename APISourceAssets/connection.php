<?php
require_once '../config/System.php';
$DatabaseHost = $SYSTEM['DBHost'];
$DatabaseName = $SYSTEM['DBName'];
$DatabaseUsername = $SYSTEM['DBUsername'];
$DatabasePassword = $SYSTEM['DBPassword'];
try {
	$connection = new PDO("mysql:host=$DatabaseHost; dbname=$DatabaseName; charset=utf8;", $DatabaseUsername, $DatabasePassword);
} 
catch (PDOException $error) {
	echo $error->getMessage();
}