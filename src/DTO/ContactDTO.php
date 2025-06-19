<?php

namespace App\DTO;
use Symfony\Component\Validator\Constraints as Assert;
class ContactDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 100)]
    public string $firstName = '';

    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 100)]
    public string $lastName = '';
    #[Assert\NotBlank]
    public string $phone = '';
    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email = '';
    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 180)]
    public string $message = '';
}

