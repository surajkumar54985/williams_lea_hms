<?php
    include '../../views/header.php';
    include '../../model/connection.php'; 
    require_once '../../auth/config.php';
    require_once '../../vendor/autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    if (!isset($_SESSION['admin'])) {
        header("Location: ../../views/admin/adminlogin.php");
        exit();
    }
    else
    {
        $key = new Key('suraj12345678kumar', 'HS256');
        $token = $_SESSION['admin'];
        $decoded = JWT::decode($token, $key, ['HS256']);

        if (!isset($decoded->iss, $decoded->aud, $decoded->iat, $decoded->exp, $decoded->data)) {
            header("Location: ../../views/admin/adminlogin.php");
            exit();
        }
    }
?>