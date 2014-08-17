<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ImageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
       $builder->add('file','file', array('required' => false,));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\ApBundle\Entity\Image',
        ));
    }
    
    public function getName()
    {
        return 'Image';
    }    
}