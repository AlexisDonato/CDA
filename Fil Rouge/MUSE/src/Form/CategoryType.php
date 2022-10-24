<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la catégorie',
                'row_attr' => [
                    'class' => 'col-md-6 ml-3',
                    ],
                ])
            ->add('products', null, [
                'label' => 'Produits concernés',
                'help' => 'Pas obligatoire ici. Vous pouvez en sélectionner plusieurs en maintenant la touche `Ctrl` enfoncée',
                'row_attr' => [
                    'class' => 'col-md-6 ml-3',
                    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
