<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact.index')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $EMAIL_SITE = 'digital@entreprise.com';

        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            try {
                $mail = (new TemplatedEmail())
                    ->to($EMAIL_SITE)
                    ->from($data->email)
                    ->subject('Message de la page contact '.$data->lastName)
                    ->htmlTemplate('emails/admin-mail.html.twig')
                    ->context(['data' => $data]); // Envoyer le data vers template
                $mailer->send($mail);

                // Mail confirmation
                $confirm = (new TemplatedEmail())
                    ->to($data->email)
                    ->from($EMAIL_SITE)
                    ->subject('Merci pour votre message sur notre site')
                    ->htmlTemplate('emails/confirm-mail.html.twig')
                    ->context(['site' => $EMAIL_SITE]);
                $mailer->send($confirm);

                $this->addFlash('success','Message envoyer avec succees');
            }catch (TransportExceptionInterface $e){
                $this->addFlash('danger', 'Message n\' est pas envoyer');
            }
            return $this->redirectToRoute('contact.index');
        }


        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form
        ]);
    }
}
