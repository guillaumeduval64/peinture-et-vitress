<?php

namespace FrontEnd\SuperBundle\Controller;

use FrontEnd\SuperBundle\Entity\Devis;   
use FrontEnd\SuperBundle\Entity\Fenetre;   
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontEnd\SuperBundle\Form\DevisType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $devis = New Devis();
        $form = $this->createForm(new DevisType, $devis-> setHouseType('maison'));



$prix=0;

        return $this->render('FrontEndSuperBundle:Default:index.html.twig',
        	array(
        		 'form' => $form->createView(),
        		 'prix'=> $prix
        		));
    }
	public function estimationAction()
    {

  $request = $this->get('request');

  $form = '';
        $form = $request->request->get('form');
var_dump($form)
   $devis = New Devis();



        if ($form->isValid()) {
                  $em = $this->getDoctrine()->getManager();
                 

foreach ($devis->getFenetres() as $fenetre) {
	$fenetre->setDevis($devis);

}
 $em->persist($devis);
 $em->flush();
      }

    

$devis = $this->container->get('front_end_super.calculservice');

$prix = $devis ->estimation($form);      

       return $this->container->get('templating')->renderResponse('FrontEndSuperBundle:Default:listePrix.html.twig', array(
            'prix' => $prix
            ));

    }
}





