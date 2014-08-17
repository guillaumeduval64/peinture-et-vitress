<?php

namespace MyApp\ApBundle\Controller;
use MyApp\ApBundle\Entity\Document;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DocumentController extends ContainerAware
{
  
/**
 * @Template()
 */
public function uploadAction()
{
    $document = new Document();
    $form = $this->createFormBuilder($document)
        ->add('name')
        ->add('file')
        ->getForm()
    ;

    if ($this->getRequest()->getMethod() === 'POST') {
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();

            $em->persist($document);
            $em->flush();

            $this->redirect($this->generateUrl('...'));
        }
    }

    return array('form' => $form->createView());
}
    
    
    
}
