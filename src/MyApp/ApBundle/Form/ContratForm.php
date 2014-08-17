<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContratForm extends AbstractType
{
    public $clientId;
    
    public function __construct($id) {
        $this->clientId = $id;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $clientId = $this->clientId;
        $builder->add('clientService', 'entity', array(
            'class' => 'MyApp\ApBundle\Entity\ClientService',
            'query_builder' => function ($repository) use ($clientId) { return $repository->createQueryBuilder('p','u')
                                                                            ->select('p','u')
                                                                            ->leftJoin('p.service', 'u')
                                                                            ->where('p.client = :id')
                                                                            ->setParameter('id', $clientId); },
            'property' => 'ServiceCreated',
            'expanded' => true,
            'multiple' => true,
            'required' => true,
            'label' => 'Services: '));
                                                                            
            $builder->add('numero','text', array('label' =>'contrat n: '))
                    ->add('date','date', array(
                        'widget' => 'single_text',
                        'format' => 'dd MMM yyyy',
                        'required' => false,
                        'label' => 'Date de rappel: '))
                    ->add('contratEstimation', 'choice', array(
                        'choices' => array('Estimation'=>'Estimation','Contrat'=>'Contrat'),
                        'label' => 'Statut: ',
                        ));
    }
    
    public function getName()
    {
        return 'contrat';
    }    
}