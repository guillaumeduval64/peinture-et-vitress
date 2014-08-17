<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContratEstimationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
                                                                            
            $builder
                    ->add('date','date', array(
                        'widget' => 'single_text',
                        'format' => 'dd MMM yyyy',
                        'required' => false,
                        'label' => 'Date de rappel: '))
                    ->add('contratEstimation', 'choice', array(
                        'choices' => array('Estimation'=>'Estimation','Contrat'=>'Contrat','Annulé'=>'Annulé'),
                        'label' => 'Statut: ',
                        ))
                    ->add('depot','text',array(
                        'required' => false,
                        'label' => 'Montant du dépôt: ',))
                    ->add('dateDepot','date', array(
                        'widget' => 'single_text',
                        'format' => 'dd MMM yyyy',
                        'required' => false,
                        'label' => 'Date du dépôt: '));
    }
    
    public function getName()
    {
        return 'contrat';
    }    
}