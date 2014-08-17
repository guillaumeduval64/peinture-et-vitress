<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ClientServiceForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
       $builder->add('service','entity', array(
            'class' => 'MyApp\ApBundle\Entity\Service',
            'property' => 'type',
            'multiple' => false,
            'empty_value' => false,
            'required' => false,
            'label' => 'Service'
            )); 
        $builder
            ->add('prix')
            ->add('note','textarea',array('attr' => array(
                'rows' => '4', 'cols' =>'40' ),
                'required' => false,))
            ->add('image', new ImageForm(),
             array('required' => false))
            ;
            }
                
    public function getName()
    {
        return 'clientService';
    }    
}