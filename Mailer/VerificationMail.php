<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

function sendVerificationEmail($email, $token) {
    $subject = 'Account Verification';
    $verificationLink = "http://localhost:8000/auth/docVerifyToken.php?token=$token"; // Adjust the URL accordingly
    $message = "Click on the following link to verify your account: $verificationLink";

    $mail = new PHPMailer();

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'surajkumar54985@gmail.com'; // Your Gmail username
        $mail->Password = 'gbqdtasoucsnrtmi'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('surajkumar54985@gmail.com', 'Hospital Admin');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        
        // echo json_encode($mail);

        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}

?>
