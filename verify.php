<?php

use Firebase\JWT\JWT;

require 'vendor/autoload.php';

$secretKey = 'your_secret_key';

$token = $_GET['token'] ?? '';

try {
    $decoded = JWT::decode($token, $secretKey, ['HS256']);


} catch (Exception $e) {
    echo 'Verification failed. Invalid token.';
}
?>
