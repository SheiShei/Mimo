<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
class Mail {
        public function sendMail($subject, $token, $address) {
                $message = file_get_contents('C:\wamp64\www\mimo\application\libraries\mail_template/mail.html');
                $message = str_replace('%tokenemail%', $token, $message);
                
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->isHTML();
                $mail->Username = 'thisismimomusic@gmail.com';
                $mail->Password = 'm1momusic';
                $mail->SetFrom('no-reply@howcode.org');
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->AddAddress($address);

                $mail->Send();
        }
}
?>
