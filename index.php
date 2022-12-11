<?php
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
	include('components/homepage.php');
	exit();
}

header('Location: ' . $SYSTEM['DefaultLanguage'] . '/');