<?php
require_once 'function.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name']) || !isset($data['message']) || !isset($data['krathong']) || !isset($data['topping'])) http_response_code(404);

switch ($data['krathong'] . '-' . $data['topping']) {
	case 'lotus-coin':
		$krathong = 1;
		break;
	case 'lotus-flower':
		$krathong = 2;
		break;
}

$id = randomPassword(10);

$owner = trim($data['name']);
$message = trim($data['message']);

$json = json_encode(
	queryDatabase('INSERT INTO loykrathong (wishId, wishOwner, wishMessage, wishKrathong) VALUES(?, ?, ?, ?);', [ $id, $owner, $message, $krathong ])
);

sendResponse(200, json_encode(['id' => $id]));