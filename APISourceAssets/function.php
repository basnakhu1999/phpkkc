<?php
function queryDatabase($queryString, $params) {
    require_once 'connection.php';
    $statement = $connection->prepare($queryString);
    $statement->execute($params);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function sendResponse($code, $message) {
    http_response_code($code);
    header('Content-Type: application/json; charset=UTF-8');
    echo($message);
    exit();
}

function randomPassword($count) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < $count; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}