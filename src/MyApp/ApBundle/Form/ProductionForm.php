<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {               
        $builder     
            ->add('contratCree', 'choice', array(
                'choices' => array('1'=>'Oui','0'=>'Non'),
                'required' => false,
                'label' => 'Contrat? '))
            ->add('period', 'choice', array(
                'choices' => array('Début'=>'Début','Fin'=>'Fin','Autre'=>'Autre'),
                'label' => 'Periode: '))
                
            ->add('previsionDateProd','choice', array(
                'choices' => array('Avril'=>'Avril','Mai'=>'Mai','Juin'=>'Juin','Juillet'=>'Juillet','Aout'=>'Aout','Septembre'=>'Septembre','Octobre'=>'Octobre'),
                'label' => 'Mois: '))
                
            ->add('statut','choice', array(
                'choices' => array('Non Booké'=>'Non Booké','Booké'=>'Booké','Terminé'=>'Terminé'),
                'label' => 'Statut: '))
       
            ->add('dateProd','date', array(
                    'widget' => 'single_text',
                    'format' => 'dd MMM yyyy',
                    'required' => false,
                    'label' => 'Date prod: '
            ))
                
            ->add('previsionHeureD', 'time', array(
                'widget' => 'single_text',
                'label' => 'Prev. h deb: '
            ))
           ->add('previsionHeureF', 'time', array(
                'widget' => 'single_text',
               'label' => 'Prev. h fin: '
            ))
            
            ->add('note', 'textarea', array(
                'attr' => array('rows' => '4', 'cols' =>'40'),
                'label' => 'Note: ',
                'required' => false,
            ));
    }
    
    public function getName()
    {
        return 'production';
    }    
    public function getDefaultOptions(array $options)
    {
        return array(
          'data_class' => 'MyApp\ApBundle\Entity\Production',
        );
    }
}