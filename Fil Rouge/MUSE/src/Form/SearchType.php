<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Category;
use App\Entity\Supplier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Mot-clé'
                ]
                ])

                ->add('categories', EntityType::class, [
                    'label' => false,
                    'required' => false,
                    'class' => Category::class,
                    'expanded' => true,
                    'multiple' => true
                ])

                ->add('supplier', EntityType::class, [
                    'label' => false,
                    'required' => false,
                    'class' => Supplier::class,
                    'mapped' =>false,
                    'multiple' => false,
                    'choice_label' => 'name'
                ])

                ->add('min', NumberType::class, [
                    'label' => false,
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Prix min'
                    ]
                ])

                ->add('max', NumberType::class, [
                    'label' => false,
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Prix max'
                    ]
                ])

                ->add('discount', CheckboxType::class, [
                    'label' => 'En promotion',
                    'required' => false,
                ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}