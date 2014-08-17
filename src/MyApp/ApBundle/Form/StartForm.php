<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StartForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  
          $builder->add('travailleur', 'entity', array(
            'class' => 'MyApp\ApBundle\Entity\Travailleur',
            'property' => 'prenom',
            'expanded' => true,
            'multiple' => true,
            'required' => false,
            'label' => 'Equipe: '
            ));
    }
    
    public function getName()
    {
        return 'StartStop';
    }    
}