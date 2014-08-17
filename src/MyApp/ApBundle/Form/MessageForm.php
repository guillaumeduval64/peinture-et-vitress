<?php

namespace MyApp\ApBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('message','textarea', array('attr' => array('rows' => '4', 'cols' =>'40' )));
    }

    public function getName() {
        return 'message';
    }

}