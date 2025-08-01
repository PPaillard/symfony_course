<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Episode;
use App\Entity\Family;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class, [
                'required' => false, // default is true
                'attr' => [
                    'placeholder' => 'Doe',
                    'class' => 'form-control',
                ],
                'label' => 'Family name',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'help' => 'Please enter your name'
            ])
            ->add('birthdate')
            ->add('family', EntityType::class, [
                'class' => Family::class,
                'choice_label' => 'name',
            ])
            /*->add('episodes', EntityType::class, [
                'class' => Episode::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
