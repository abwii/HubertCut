<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RdvFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'homme',
                    'Femme' => 'femme',
                    'Mixte' => 'mixte',
                ],
            ])
            ->add('Longueur', ChoiceType::class,[
                'choices' => [
                    // $this->getCutLengthChoices(),
                    'Court' => 'court',
                    'Mi-long' => 'mi-long',
                    'Long' => 'long',
                ],
            ])
            ->add('Coupe', ChoiceType::class,[
                'choices' => [
                    
                ],
            ])
            ->add('Extras', ChoiceType::class,[
                'choices' => [
                    'Aucun' => 'aucun',
                    'Shampoing (+10€)' => 'shampoing',
                    'Brushing (+20€)' => 'brushing',
                    'Teinture (+30€)' => 'teinture',
                ],
            ])
            ->add('Adresse', ChoiceType::class,[
                'choices' => [
                    'A domicile' => 'a_domicile',
                    'Sur place' => 'sur place',
                ],
            ])
            ->add('Commentaire', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
