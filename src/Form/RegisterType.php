<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 50,
                    'minMessage' => "Veuillez entrer un Prénom de 2 caractères minimum",
                    'maxMessage' => "Veuillez entrer un Prénom de 50 caractères maximum"
                ]),
                'attr' => [
                    'placeholder' => 'John'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 50,
                    'minMessage' => "Veuillez entrer un Nom de 2 caractères minimum",
                    'maxMessage' => "Veuillez entrer un Nom de 50 caractères maximum"
                ]),
                'attr' => [
                    'placeholder' => 'Rambo'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60,
                    'minMessage' => "Veuillez entrer un Email de 2 caractères minimum",
                    'maxMessage' => "Veuillez entrer un Email de 60 caractères maximum"
                ]),
                'attr' => [
                    'placeholder' => 'john@rambo.com'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe saisis ne sont pas identiques',
                'label' => 'Mot de passe',
                'required' => true,
                'first_options' => [ 
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Saisissez un mot de passe'
                ]],
                'second_options' => [ 
                    'label' => 'Confirmez mot de passe',
                    'attr' => [
                        'placeholder' => 'Retapez votre mot de passe'
                ]]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
