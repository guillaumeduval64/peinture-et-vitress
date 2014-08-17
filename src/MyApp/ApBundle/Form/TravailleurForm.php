<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TravailleurForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
          $builder->add('travailleur', 'entity', array(
            'class' => 'MyApp\ApBundle\Entity\Travailleur',
            'property' => 'nom',
            'expanded' => true,
            'multiple' => true,
            'required' => true,
            'label' => 'Etat'
            ));
    }
    
    public function getName()
    {
        return 'travailleur';
    }    
}