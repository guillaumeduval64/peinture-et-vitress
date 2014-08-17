<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientEtatForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {     
            $builder
            ->add('etat', 'choice', array('choices' => array('A recontacter'=>'A recontacter','Rappeler'=>'Rappeler','Rdv'=>'Rdv','Done'=>'Done','2nd service'=>'2nd service','2013'=>'2013','Annulé'=>'Annulé'),'label' => 'Etat: '));
            }
    
    public function getName()
    {
        return 'client';
    }    
}