<?php

namespace App\service;



class Mailer {

    protected $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendmail($body, $to) {
        $message = (new \Swift_Message('hell from Email'))
            ->setFrom('marc.borgna@gmail.com')
            ->setTo($to)
            ->setBody(
                $body,
                'text/html'
            )
            ->attach(\Swift_Attachment::fromPath('file/listeSeminaire.pdf')->setFilename('listeSeminaire.pdf'));

        $this->mailer->send($message);
    }
}