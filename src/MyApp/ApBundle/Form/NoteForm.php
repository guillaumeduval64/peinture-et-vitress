<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NoteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {     
            $builder->add('note', 'textarea',array('attr' => array('rows' => '4', 'cols' =>'40' )));
    }
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'MyApp\ApBundle\Entity\Note',
        );
    }
    public function getName()
    {
        return 'note';
    }    
}