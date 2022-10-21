<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userName', TextType::class, [
                'required' => true,
                // 'row_attr' => [
                //     'class' => 'col-6 ml-3',
                //     ],
                'attr' => ['class' => 'FirstNameField'],
                    'constraints' => [
                        new Regex([
                            'pattern' => "/^([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[a-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+([-]([a-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[a-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+)*$/",
                            'message' => 'Prénom invalide (numéros non autorisés)'
                        ]),
                    ]
                ])

            ->add('userLastname', TextType::class, [
            'required' => true,
            'attr' => ['class' => 'LastNameField'],
                'constraints' => [
                    new Regex([
                        'pattern' => "/^([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[a-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+([-]([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[a-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+)*$/",
                        'message' => 'Nom invalide (numéros non autorisés)'
                    ]),
                ]
            ])

            ->add('birthdate', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'required' => true,
            ])

            ->add('address', EntityType::class, [
                'mapped' => false,
                'class' => Address::class,
                // each entry in the array will be a "text" field
                // 'entry_type' => TextType::class,
                // these options are passed to each "adress" type
                // 'entry_options' => [
                //     'attr' => ['class' => 'col-md-6'],
                // ],
            ])



            ->add('phoneNumber', TextType::class, [
                'required' => true,
                'attr' => [
                    'class' => 'PhoneField',
                    ],  
                'constraints' => [
                    new Regex([
                        'pattern' => "/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/", // French phone number
                        'message' => 'Numéro de téléphone invalide'
                    ]),
                ]
            ])

            ->add('email', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'EmailField'],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
                        'message' => 'Email invalide'
                    ]),
                ]
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => "Veuillez accepter nos conditions d'utilisation",
                    ]),
                ],
            ])

            ->add('pro', CheckboxType::class, [
                'mapped' => false,
                'required' => false,
                'row_attr' => [
                    'onclick' => 'proSubForm()',
                ],
                ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            
            ->add('proCompanyName', TextType::class, [
                'required' => false,
                ])

            ->add('proDuns', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]{9}$/',
                        'message' => 'Numéro invalide : entrée à 9 chiffres (ex: "123456789")'
                    ]),
                ]
            ])

            ->add('proJobPosition', TextType::class, [
                'required' => false,
                ])
        ;

    }




    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
