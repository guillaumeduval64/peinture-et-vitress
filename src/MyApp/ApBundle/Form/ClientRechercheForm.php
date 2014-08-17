<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientRechercheForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder->add('motcle', 'text', array(
            'label' => 'Recherche(nom, prenom, tél.): ',
            'required' =>false,
            'attr' => array(
                    'placeholder' => "Nom + Prenom + Tél",
                )
            ));
    }
    
    public function getName()
    {        
        return 'clientrecherche';
    }
}