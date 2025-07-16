<?php
namespace App\Service;

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

class ContactMailer
{
    public function __construct(private MailerInterface $mailer, private string $contactEmail) {}

    public function sendContact(ContactDTO $data): void
    {
        $mail = (new TemplatedEmail())
            ->to($this->contactEmail)
            ->from($data->email)
            ->subject('Message de la page contact '.$data->lastName)
            ->htmlTemplate('emails/admin-mail.html.twig')
            ->context(['data' => $data]);

        $this->mailer->send($mail);
    }

    public function sendConfirmation(ContactDTO $data): void
    {
        $confirm = (new TemplatedEmail())
            ->to($data->email)
            ->from($this->contactEmail)
            ->subject('Merci pour votre message')
            ->htmlTemplate('emails/confirm-mail.html.twig')
            ->context(['site' => $this->contactEmail]);

        $this->mailer->send($confirm);
    }
}
