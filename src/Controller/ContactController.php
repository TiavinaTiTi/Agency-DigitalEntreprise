<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use App\Service\ContactMailer;
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
    public function index(Request $request, ContactMailer $contactMailer ): Response
    {
//        $this->denyAccessUnlessGranted('ROLE_USER');
        $EMAIL_SITE = 'digital@entreprise.com';
        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            try {
                
                $contactMailer->sendContact($data);
                $contactMailer->sendConfirmation($data);

                $this->addFlash('success','Message envoyer avec succees');
            }catch (TransportExceptionInterface $e){
                $this->addFlash('danger', 'Le message n\'a pas pu être envoyé.');
            }
            return $this->redirectToRoute('contact.index');
        }


        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form
        ]);
    }
}
