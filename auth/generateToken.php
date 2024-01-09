<?php

require_once 'config.php';
require_once __DIR__ . '/../vendor/autoload.php';


use Firebase\JWT\JWT;

function generateToken($userData) {
    $key = 'suraj12345678kumar';

    $payload = [
        'iss' => ISSUER,
        'aud' => AUDIENCE,
        'iat' => time(),
        'exp' => time() + 3600, // Token expiration time (1 hour)
        'data' => $userData,
    ];

    return JWT::encode($payload, $key, 'HS256');
}

?>