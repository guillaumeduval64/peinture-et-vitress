<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContratRechercheForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder->add('motcle', 'text', array(
            'label' => 'Contrat: ',
            'attr' => array(
                    'placeholder' => "Contrat",
                )));
    }
    
    public function getName()
    {        
        return 'contratrecherche';
    }
}