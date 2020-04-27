<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\service\Mailer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/envoyerContact", name="envoyerContact")
     */
    public function envoyerContact(Request $request, ManagerRegistry $doctrine, Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $e = $doctrine->getManager();
            $date = new \DateTime();
            $contact->setDateHeureContact($date);
            $e->persist($contact);
            $e->flush();
            $this->addFlash(
                'notice',
                'Votre demande a bien été envoyé'
            );
            $body = $this->renderView(
                'emails/registration.html.twig'
            );
            $this->forward('App\Controller\RequeteController::SeminairesCoursPDF');

            $mailer->sendmail($body, $contact->getMail());


            return $this->redirectToRoute('envoyerContact', ["id" => $contact->getId()]);
        }
        return $this->render('contact/formulaire.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
