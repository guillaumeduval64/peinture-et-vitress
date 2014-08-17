<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EmailForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {     
          $builder->add('email','email',array('label' => 'Email: ', 'error_bubbling' => true));
    }    
    
    public function getName()
    {
        return 'client';
    }    
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'MyApp\ApBundle\Entity\Client',
        );
    }
}