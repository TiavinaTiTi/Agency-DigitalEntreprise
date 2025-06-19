<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'empty_data' => '',
                'attr' => [
                    'placeholder' => 'Saisir votre nom'
                ]
            ])
            ->add('lastName', TextType::class, [
                'empty_data' => '',
                'attr' => [
                    'placeholder' => 'Saisir votre prenom'
                ]
            ])
            ->add('phone', TextType::class, [
                'empty_data' => '',
                'attr' => [
                    'placeholder' => 'Votre numero de telephone'
                ]
            ])
            ->add('email', EmailType::class, [
                'empty_data' => '',
                'attr' => [
                    'placeholder' => 'Votre addresse e-mail'
                ]
            ])
            ->add('message', TextareaType::class, [
                'empty_data' => '',
                'attr' => [
                    'placeholder' => 'Saisir votre message...'
                ]
            ])
            ->add('save', ButtonType::class,[
                'attr' => [
                    'class' => 'btn-dark w-100',
                ],
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
        ]);
    }
}
