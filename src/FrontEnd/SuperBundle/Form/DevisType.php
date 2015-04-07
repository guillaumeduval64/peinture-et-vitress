<?php

namespace FrontEnd\SuperBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DevisType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('cellulaire')
            ->add('email')
            ->add('houseType', 'choice', array(
                    'choices' => array(
                        'maison' => 'Maison',
                        'appartement' => 'Appartement'
                    ),
                    'required'    => true,
                    'expanded' => true,
                    'multiple' => false,
                    'empty_data'  => null
                    ))
            ->add('intExt', 'choice', array(
                    'choices' => array(
                        'IntExt' => 'Intérieur et extérieur',
                        'Interieur' => 'Intérieur',
                        'Exterieur' => 'Extérieur',
                    ),
                    'required'    => true,
                    'expanded' => true,
                    'multiple' => false,
                    'empty_data'  => null,
                    'label' => false
                    ))
            ->add('fenetres','text', array('label'=>'Nombre de fenêtre'))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEnd\SuperBundle\Entity\Devis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'frontend_superbundle_devis';
    }
}
