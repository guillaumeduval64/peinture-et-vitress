<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SatisfactionEquipeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {             
        $builder
            ->add('difficulte','choice', array(
                                            'choices' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
                                            'expanded' =>true,
                                            'label'=>'Difficultés du contrat?'))
            ->add('sympathie', 'choice', array('choices' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),
                                            'expanded' =>true,
                                            'label'=>'client sympathique?'))
            ->add('notes','textarea',array('attr' => array('rows' => '4', 'cols' =>'40' ),'label'=>'notes / commentaires??'))          
                ;
            $builder->add('particularite', 'entity', array(
                'class' => 'MyApp\ApBundle\Entity\Particularite',
                'property' => 'particularite',
                'empty_value' => false,
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'label' => 'Particularités:'
                ));
                }
    
    public function getName()
    {
        return 'satisfactionEquipe';
    }    
}