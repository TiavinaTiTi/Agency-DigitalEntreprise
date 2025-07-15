<?php
namespace App\Service;

class ContactMailer
{
    public function __construct(private MailerInterface $mailer, private string $adminEmail) {}

    public function sendContact(ContactDTO $data): void
    {
        $mail = (new TemplatedEmail())
            ->to($this->adminEmail)
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
            ->from($this->adminEmail)
            ->subject('Merci pour votre message')
            ->htmlTemplate('emails/confirm-mail.html.twig')
            ->context(['site' => $this->adminEmail]);

        $this->mailer->send($confirm);
    }
}
