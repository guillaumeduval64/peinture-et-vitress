<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {     
        
        $builder->add('titles', 'entity', array(
            'class' => 'MyApp\ApBundle\Entity\Titles',
            'property' => 'type',
            'expanded' => true,
            'multiple' => true,
            'required' => false,
            'label' => 'title'
            ));
                
        $builder
            ->add('ancien', 'choice', array(
                'choices' => array('0'=>'Nouveau','1'=>'Ancien'),
                'label' => 'Client depuis? ',))
            ->add('etat', 'choice', array('choices' => array('A recontacter'=>'A recontacter','Rappeler'=>'Rappeler','Rdv'=>'Rdv','Done'=>'Done','2nd service'=>'2nd service','2013'=>'2013','Annulé'=>'Annulé'),'label' => 'Etat: '))
            ->add('flag')
            ->add('nom')
            ->add('prenom','text',array(
                'label' => 'client.prenom',
                'required' =>false,))
            ->add('number','text',array(
                'label' => 'Numéro: ',
                'required' =>false,))
            ->add('street','text',array(
                'label' => 'Rue: ',
                'required' => false,)) 
            ->add('city','text',array('label' => 'Ville: '))
            ->add('pc','text',array(
                'label' => 'Code-postal: ',
                'required' =>false,))
            ->add('phones', 'collection', array('type'         => new PhoneForm(),
                                                          'allow_add'    => true,
                                                          'allow_delete' => true))
            ->add('email','text',array(
                    'label' => 'Email: ',
                    'required' => false,
                ))
            ->add('date','date', array(
                    'widget' => 'single_text',
                    'format' => 'dd MMM yyyy',
                    'required' => false,
                    'label' => 'Date: '))
            ->add('heure', 'time', array(
                'widget' => 'single_text',
                'label' => 'Prev. h fin: '
                ));
        
            $builder->add('city', 'entity', array(
            'class' => 'MyApp\ApBundle\Entity\City',
            'query_builder' => function ($repository) { return $repository->createQueryBuilder('p')
                                                            ->orderBy('p.city', 'ASC')
                                                            ; },
            'property' => 'city',
            'empty_value' => false,
            'multiple' => false,
            'required' => false,
            'label' => 'City'
            ));
                    
            $builder->add('service','entity', array(
            'class' => 'MyApp\ApBundle\Entity\Service',
            'property' => 'type',
            'multiple' => false,
            'empty_value' => false,
            'required' => false,
            'label' => 'Service'
            )); 
            
            }
    
    public function getName()
    {
        return 'client';
    }    
}