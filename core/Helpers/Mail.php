<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public static function sendMail($to, $subj, $body)
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->SMTPSecure = "tls"; // "tls";
        $mail->Host = "smtp.gmail.com"; // "smtp.gmail.com";

        $credentials = App::getData('mail_server_credentials');

        $mail->Username = $credentials['username'];
        $mail->Password = $credentials['password'];

        $mail->SMTPAuth = true;
        $mail->Port = "587"; // 587;

        $mail->From = $credentials['username'];
        $mail->FromName = "Kawi Online Magazine";

        $mail->isHTML();
        $mail->addAddress($to);
        $mail->Subject = $subj;
        $mail->Body = $body;
        
        try {
            $mail->send();
        } catch (Exception $e) {
            echo $mail->ErrorInfo;
        }
    }
}
