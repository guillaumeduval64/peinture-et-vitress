<?php

namespace MyApp\UtilisateurBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('note', null, array('attr' => array('class' => 'inputText')));
        $builder->add('desciption', 'entity', array(
            'class' => 'MyApp\UtilisateurBundle\Entity\Group',
            'property' => 'group',
            'expanded' => true,
            'multiple' => true,
            'required' => false,
            'label' => 'title'
            ));
    }

    public function getName()
    {
        return 'myapp_utilisateur_registration';
    }
}