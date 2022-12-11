<?php
require_once 'function.php';

if (!isset($_GET['mode'])) renderErrorPage();

$sqlCommand = "	SELECT
					wishOwner AS owner,
					wishMessage AS message,
					krathong_type as type,
					krathong_topping as topping
				FROM
					loykrathong
				LEFT JOIN `krathong-detail` ON wishKrathong = krathong_Id";
switch ($_GET['mode']) {
	case 'random':
		$response = json_encode(queryDatabase("$sqlCommand ORDER BY RAND() LIMIT 1", []));
		sendResponse(200, $response);
		break;
		
	case 'latest':
		$response = json_encode(queryDatabase("$sqlCommand ORDER BY wishCreate DESC LIMIT 1", []));
		sendResponse(200, $response);
		break;
	
	default:
		renderErrorPage();
		break;
}