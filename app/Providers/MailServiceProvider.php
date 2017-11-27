<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use Mail;

class MailServiceProvider extends ServiceProvider
{
    public static function sendMail($toEmailId, $from, $subject, $body) {
        set_time_limit(120);
        $data = array(
        	"to"=> $toEmailId,
        	"from" => $from,
        	"subject" => $subject,
        	"text" => $body);
       /* $mail = new PHPMailer;

        //Enable SMTP debugging. 
        $mail->SMTPDebug = 2;  
        $mail->Debugoutput = 'html';

        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = Config::get('mail.host');
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = Config::get('mail.encryption');                           
        //Set TCP port to connect to 
        $mail->Port = 587;                   
        //Provide username and password     
        $mail->Username = Config::get('mail.username');
        $mail->Password = Config::get('mail.password');

        //From email address and name
        $mail->From = Config::get('mail.from.address');
        $mail->FromName = Config::get('mail.from.name');

        $mail->addAddress($data['to'], '');

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $body;


        if(!$mail->send()) 
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } 
        else 
        {
            echo "Message has been sent successfully";
        }*/

        Mail::send('emails.send', ['content' => $body], function ($message) use ($data)
        {
            $message->subject($data['subject']);
            $message->from($data['from']['address'],$data['from']['name']);

            $message->to($data['to']);

        });
        return ['message' => 'Mail Sent'];
    }
}