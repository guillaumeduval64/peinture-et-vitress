<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ComptabiliteForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('type', 'entity', array(
            'class' => 'MyApp\ApBundle\Entity\Type',
            'property' => 'type',
            'multiple' => false,
            'required' => false,
            'empty_value' => false,
            'label' => 'Type'
        ));

        $builder
                ->add('montant', 'text')
                ->add('date','date', array(
                    'widget' => 'single_text',
                    'format' => 'dd MMM yyyy',
                    'required' => false,
                    'label' => 'Date: '))
                ->add('paiement', 'choice', array('choices' => array('Chèque' => 'Chèque', 'Cash' => 'Cash', 'Carte' => 'Carte'),
                        ))
                 ->add('bilan', 'choice', array(
                        'choices' => array('Bilan' => 'Bilan', 'Hors bilan' => 'Hors bilan'),
                        ))
                ->add('note', 'textarea',array(
                        'attr' => array('rows' => '4', 'cols' =>'40' ),
                        'required' => false,
                    ));
    }

    public function getName() {
        return 'comptabilite';
    }

}