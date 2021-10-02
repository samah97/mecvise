<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../app/libraries/PHPMailer/src/Exception.php';
require '../app/libraries/PHPMailer/src/PHPMailer.php';
require '../app/libraries/PHPMailer/src/SMTP.php';

class MailSender
{

    const HOST = 'smtp.gmail.com';
    const SMTPAuth = true;
    const FROM_ADDRESS = 'mecviselb@gmail.com';
    const PASSWORD = 'pgorwyiyagaoixaw'; //mecvise2021
    const PORT = 587;

    public $subject;
    public $body;
    public $toAddress;
    public $toName;

    public function sendMail(){
        $isSent = false;
        try{
            $mailer = new PHPMailer(true);
            $mailer->SMTPDebug = SMTP::DEBUG_OFF;//SMTP::DEBUG_SERVER;
            $mailer->isSMTP();
            $mailer->Host = self::HOST;
            $mailer->SMTPAuth = self::SMTPAuth;
            $mailer->Username = self::FROM_ADDRESS;
            $mailer->Password = self::PASSWORD;
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailer->Port = self::PORT;
            $mailer->setFrom(self::FROM_ADDRESS);
            $mailer->addAddress($this->toAddress,$this->toName);
            $mailer->isHTML(true);
            $mailer->Subject = $this->subject;
            $mailer->Body = $this->body;
            $mailer->send();
            $isSent = true;
        }catch (Exception $exception){
            die($exception);
        }
        return $isSent;
    }
}