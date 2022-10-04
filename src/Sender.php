<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class Message{
    
    public static function setMessage($recipient, $subject, $body)
    {
        try {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'xploreitcbsua@gmail.com';                     //SMTP username
            $mail->Password   = 'gpbmzfwotaiwdpeg';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('xploreitcbsua@gmail.com', 'Team Explore');
            $mail->addAddress($recipient, 'Hi users');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
        
            if($mail->send())
                return "message success";
            else 
                return "message failed";
    
        } catch (Exception $e) {
           return "error : " . $e->getMessage();
        }
    }
}
