<?php

namespace App\service;



use Twig\Environment;

class Mailer {

    protected $mailer;

    public function __construct(\Swift_Mailer $mailer, Environment $environment)
    {
        $this->mailer = $mailer;
        $this->environment = $environment;
    }

    public function sendmail($to) {
        $message = (new \Swift_Message('hell from Email'))
            ->setContentType('text/html')
            ->setFrom('marc.borgna@gmail.com')
            ->setTo('marc.borgna@gmail.com');
            //->attach(\Swift_Attachment::fromPath('file/listeSeminaire.pdf')->setFilename('listeSeminaire.pdf'));
        $img = $message->embed(\Swift_Image::fromPath('build/logo.png'));
        $message->setBody($this->environment->render('emails/registration.html.twig', ['img' => $img]));
	$message->setBody('coucou');
        $this->mailer->send($message);

    }
}
