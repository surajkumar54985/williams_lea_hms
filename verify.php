<?php

use Firebase\JWT\JWT;

require 'vendor/autoload.php'; // Adjust the path as needed

// Your secret key for decoding the JWT token
$secretKey = 'your_secret_key'; // Replace with your actual secret key

// Get the token from the URL parameter
$token = $_GET['token'] ?? '';

try {
    // Decode the token
    $decoded = JWT::decode($token, $secretKey, ['HS256']);

    if (isset($decoded->iss, $decoded->aud, $decoded->iat, $decoded->exp, $decoded->data)) {
        echo 'Verification successful!';
    } else {
        echo 'Verification failed. Invalid token.';
        exit;
    }

} catch (Exception $e) {
    echo 'Verification failed. Invalid token.';
}
?>
