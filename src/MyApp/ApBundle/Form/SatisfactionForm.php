<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SatisfactionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
       
        
        $builder
            ->add('appel','choice', array(
                                            'choices' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
                                            'required' =>false,
                                            'expanded' =>true,
                                            'label'=>'Les appels ont-ils été éffectués en temps voulu?'))
            ->add('equipe', 'choice', array('choices' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
                                            'expanded' =>true,
                                            'required' =>false,
                                            'label'=>'L equipe de travail a-t-elle été sympathique?'))
            ->add('service', 'choice', array('choices' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
                                            'expanded' =>true,
                                            'required' =>false,
                                            'label'=>'Appréciation du sevice globalement:'))
            ->add('peinture', 'choice', array(
                                            'choices' => array('Oui'=>'Oui','Non'=>'Non'),
                                            'expanded' =>true,
                                            'label'=>'Savez vous que nous faisons aussi de la peinture intérieur et extérieur. Si vous voulez être appelé à ce sujet répondez oui...',
                                            'required' =>false,
                    ))
            ->add('question','textarea',array(
                'attr' => array('rows' => '4', 'cols' =>'40' ),
                'label'=>'Questions / commentaires??',
                'required' =>false,
                ))          
                ;}
                
          
                
    public function getName()
    {
        return 'satisfaction';
    }    
}