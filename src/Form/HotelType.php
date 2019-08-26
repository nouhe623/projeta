<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\Hotel;
use App\Entity\Pension;
 use Symfony\Component\Form\AbstractType;
use App\Form\HotelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomhotel', null, [ 'label' =>'Nom Hotel'])
            ->add('adresse')
            ->add('occupation')
            ->add('service')
            ->add('pension', EntityType::class , array ('class' => 'App\Entity\Pension') )
            ->add('description')
            ->add('hebergement')
            ->add('restauration')
            ->add('diveservice')
            ->add('price')
            ->add('avis', ChoiceType::class, ['choices' => Hotel::avis])
            ->add('destination')
         ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hotel::class,
        ]);
    }

 
  

    private function getChoices()
        {
           $choices = Hotel::avis;
           $output = [] ;
           foreach($choices as $k => $v)
             { 
               $output[$v]=$k;
             }
             return $output;

        }
 }
