<?php

namespace FrontEnd\SuperBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FenetreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type','choice', array(
                    'choices' => array(
                        'simple' => 'Simple',
                        'double' => 'Double',
                        'autre'=>'Autre'
                    ),
                    'required'    => true,
                    'expanded' => true,
                    'multiple' => false,
                    'empty_data'  => null

                    ))
            ->add('nombre', null, array('label' => false))
            ->add('description', null, array('label' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEnd\SuperBundle\Entity\Fenetre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'frontend_superbundle_fenetre';
    }
}
