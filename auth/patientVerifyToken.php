<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';
require_once '../vendor/autoload.php'; // Composer autoloader
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$token = $_GET['token'];

// echo $token;

function verifyToken($token) {
    include '../connection.php';

    try {
        $key = new Key('suraj12345678kumar', 'HS256');
        $decoded = JWT::decode($token, $key, ['HS256']);
        if (isset($decoded->iss, $decoded->aud, $decoded->iat, $decoded->exp, $decoded->data)) {
            $query = "SELECT username FROM token WHERE token = '$token'";
            $result = mysqli_query($connect, $query);
            if ($result->num_rows > 0) 
            {
                // Fetch the username
                $row = $result->fetch_assoc();
                $username = $row['username'];
    
                // Update the user_table to set status to 'approved'
                $updateQuery = "UPDATE patients SET status = 'approved' WHERE username = '$username'";
                if (mysqli_query($connect, $updateQuery) === TRUE) {
                    echo "User status updated successfully.";
					header("Location: ../patientlogin.php");
                } else {
                    echo "Error updating user status: " . $conn->error;
                }
            } 
            else 
            {
                echo "No matching token found.";
            }
            echo '<h4>Verification successful!</h4>';
        } 
        else 
        {
            echo 'Verification failed. Invalid token.';
            exit;
        }
    } 
    catch (Exception $e) 
    {
        echo 'Caught exception: ', $e->getMessage(), "\n";
        // echo '<h4>Verification catch!</h4>';
        return null; // Token verification failed
    }
}

verifyToken($token);

?>