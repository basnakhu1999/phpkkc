<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/System.php';

if ($_SERVER['REQUEST_URI'] === $SYSTEM['ROOT_PATH']) {
	header('Location: ' . $SYSTEM['DefaultLanguage'] . '/');
}

if (!isset($_GET['lang'])) {
	$_GET['lang'] = $SYSTEM['DefaultLanguage'];
}

$MessageFilePath = __DIR__ . '/config/messages/' . $_GET['lang'] . '.php';

if (file_exists($MessageFilePath)) {
	require_once $MessageFilePath;
	include('components/homepage-led.php');
	exit();
}

header('Location: ' . $SYSTEM['DefaultLanguage'] . '/');