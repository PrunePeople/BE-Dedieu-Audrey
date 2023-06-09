<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\ReservationFormType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('price')
            ->add('city')
            ->add('postal_code');

        // Vérifie si le produit existe déjà
        if ($options['data'] && $options['data']->getId()) {
            $builder->add('reservation_text', null, [
                'label' => 'Message de réservation',
                'required' => false,
                'attr' => [
                    'rows' => 5,
                ],
            ]);
        }
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
