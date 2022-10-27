<?php

namespace App\Form;

use App\Entity\Address;
use App\Service\Cart\CartService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SelectAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // $cartService->setUser($user);

        $builder
            ->add('selectBillingAddress', EntityType::class, [
                'mapped' => false,
                'required' => true,
                'class' => Address::class,
                'choice_label' => 'name',

                // 'choices' => $address->getName(),
                // 'choice_value' => 'name',
                // 'choice_label' => function (?Address $address) {
                //     return $address ? strtoupper($address->getName()) : '';
                // },
            ])
            ->add('selectDeliveryAddress', EntityType::class, [
                'mapped' => false,
                'required' => true,
                'class' => Address::class,
                'choice_label' => 'name',

            //     'choice_value' => 'name',
                // 'choice_label' => function (?Address $address) {
                //     return $address ? strtoupper($address->getName()) : '';
                // },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
