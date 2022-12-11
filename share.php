<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/System.php';

if (!isset($_GET['lang'])) {
	$_GET['lang'] = $SYSTEM['DefaultLanguage'];
}

$MessageFilePath = __DIR__ . '/config/messages/' . $_GET['lang'] . '.php';

if (isset($_GET['share']) && file_exists($MessageFilePath)) {

	$sqlCommand = "	SELECT
					wishOwner AS owner,
					wishMessage AS message,
					krathong_type as type,
					krathong_topping as topping
				FROM
					loykrathong
				LEFT JOIN `krathong-detail` ON wishKrathong = krathong_Id";

	$response = queryDatabase("$sqlCommand WHERE wishId = ? LIMIT 1", [$_GET['share']]);

	if (!$response) {
		require_once $MessageFilePath;
		http_response_code(404);
		include('components/error.php');
		exit();
	}
	$response = $response[0];

	require_once $MessageFilePath;
	include('components/share.php');
	exit();
}




function queryDatabase($queryString, $params)
{
	include 'config/System.php';
	$DatabaseHost = $SYSTEM['DBHost'];
	$DatabaseName = $SYSTEM['DBName'];
	$DatabaseUsername = $SYSTEM['DBUsername'];
	$DatabasePassword = $SYSTEM['DBPassword'];
	try {
		$connection = new PDO("mysql:host=$DatabaseHost; dbname=$DatabaseName; charset=utf8;", $DatabaseUsername, $DatabasePassword);
	} catch (PDOException $error) {
		echo $error->getMessage();
	}

	$statement = $connection->prepare($queryString);
	$statement->execute($params);
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
