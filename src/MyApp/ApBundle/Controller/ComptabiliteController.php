<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Client;
use MyApp\ApBundle\Entity\DateTable;
use MyApp\ApBundle\Entity\Contrat;
use MyApp\ApBundle\Entity\Production;
use MyApp\ApBundle\Entity\Comptabilite;
use MyApp\ApBundle\Form\ComptabiliteForm;

class ComptabiliteController extends ContainerAware
{
    public function listerAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();
        
        
                $message = '';
        $comptabilite = new Comptabilite();
        $form = $this->container->get('form.factory')->create(new ComptabiliteForm(), $comptabilite);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
                    
            if ($form->isValid()) 
                {       

                    $user = $this->container->get('security.context')->getToken()->getUser(); 
                    $comptabilite -> setUser($user);
                    $date = new DateTable();
                    $comptabilite->setDateTable($date);
                    $date ->setDate(new \DateTime());
                    $em->persist($comptabilite);
                    $em->flush();
                    $message='Bill ajouté avec succès !';
                    
                }
               
        }
        
        
        $qb = $em->createQueryBuilder();
        
        $qb->select('c')
            ->from('MyAppApBundle:Comptabilite', 'c')
            ->orderBy('c.created', 'DESC');

        
            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);

        $types= $em->getRepository('MyAppApBundle:Type')->findAll();

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Comptabilite:lister.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
        'types' => $types,
        'form' => $form->createView(),
 	));
    }
    
    public function ajouterAction($id = null)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $message = '';
        $comptabilite = new Comptabilite();
        $form = $this->container->get('form.factory')->create(new ComptabiliteForm(), $comptabilite);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);
        if($id != null){
            $production = $em->find('MyAppApBundle:Production', $id);
            if ($form->isValid()) 
                {       
                    $comptabilite -> setProduction($production);
                    $user = $this->container->get('security.context')->getToken()->getUser(); 
                    $comptabilite -> setUser($user);
                    $date = new DateTable();
                    $comptabilite->setDateTable($date);
                    $date ->setDate(new \DateTime());
                    $em->persist($comptabilite);
                    $em->flush();
                    $message='Bill ajouté avec succès !';
                    }
                }
                   else {
            if ($form->isValid()) 
                {       
                    $user = $this->container->get('security.context')->getToken()->getUser(); 
                    $comptabilite -> setUser($user);
                    $date = new DateTable();
                    $comptabilite->setDateTable($date);
                    $date ->setDate(new \DateTime());
                    $em->persist($comptabilite);
                    $em->flush();
                    $message='Bill ajouté avec succès !';

                    }
                }
                if($id != null){
                    return new Response($this->container->get('router')->generate('myapp_production_modifier',array( 'id'=>$id))); 
                }
        }

    return new RedirectResponse($this->container->get('router')->generate('myapp_comptabilite_lister',array('id'=>$id, 'message'=>'Service supprimé avec succès !'))); 

    }
     public function voirEssenceAction($id=null)
    {
	$em = $this->container->get('doctrine')->getEntityManager();
        
        $comptabilite = new Comptabilite();
        $form = $this->container->get('form.factory')->create(new ComptabiliteForm(), $comptabilite);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
                    
            if ($form->isValid()) 
                {       

                    $user = $this->container->get('security.context')->getToken()->getUser(); 
                    $comptabilite -> setUser($user);
                    $date = new DateTable();
                    $comptabilite->setDateTable($date);
                    $date ->setDate(new \DateTime());
                    $em->persist($comptabilite);
                    $em->flush();
                    $message='Bill ajouté avec succès !';
                    
                }
               
        }
        
        $qb = $em->createQueryBuilder();

        $qb->select('c')
            ->from('MyAppApBundle:Comptabilite', 'c')
            ->where('c.type= :id')
            ->orderBy('c.created', 'DESC')
            ->setParameter('id', $id);

           $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);

        $types= $em->getRepository('MyAppApBundle:Type')->findAll();

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Comptabilite:lister.html.twig', 
	array(
	'pagination' => $pagination,
        'form' => $form->createView(),
        'message' => '',
        'types' => $types,
        
 	));
    }
    public function voirAction($id=null)
    {
	$em = $this->container->get('doctrine')->getEntityManager();

	$comptabilite= $em->getRepository('MyAppApBundle:Comptabilite')->find($id);

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Comptabilite:voir.html.twig', 
	array(
	'comptabilite' => $comptabilite,
        'message' => '',
 	));
    }
    public function supprimerAction($id=null)
    {
	$em = $this->container->get('doctrine')->getEntityManager();

	$comptabilite= $em->getRepository('MyAppApBundle:Comptabilite')->find($id);
        
        $em->remove($comptabilite);
        $em->flush(); 
    return new RedirectResponse($this->container->get('router')->generate('myapp_comptabilite_lister',array('id'=>$id, 'message'=>'Service supprimé avec succès !'))); 

    }
}
