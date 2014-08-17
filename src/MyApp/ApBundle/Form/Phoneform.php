<?php
// src/Sdz/BlogBundle/Form/CategorieType.php
 
namespace MyApp\ApBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 
class PhoneForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {

    $builder->add('phoneType', 'entity', array(
                'class' => 'MyApp\ApBundle\Entity\PhoneType',
                'property' => 'PhoneType',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'label' => 'Type de téléphone:'
                ));

    $builder
      ->add('phone', 'text') // Ici, explicitez le type du champ
    ;
  }
 
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'MyApp\ApBundle\Entity\Phone'
    ));
  }
 
  public function getName()
  {
    return 'MyApp_apbundle_phoneform';
  }
}