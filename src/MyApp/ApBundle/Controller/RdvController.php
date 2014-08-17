<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Client;
use Sorien\DataGridBundle\Grid\Source\Entity;
use Sorien\DataGridBundle\Grid\Column\TextColumn;
use Sorien\DataGridBundle\Grid\Column\ActionsColumn;
use Sorien\DataGridBundle\Grid\Action\MassAction;
use Sorien\DataGridBundle\Grid\Action\DeleteMassAction;
use Sorien\DataGridBundle\Grid\Action\RowAction;

class RdvController extends ContainerAware
{
    public function listerAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();
         $user = $this->container->get('security.context')->getToken()->getUsername();
                $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('MyAppApBundle:Client', 'a')
        ->where('a.etat = :var')  
        ->andWhere('a.user = :user')
        ->setParameters(array('var' => 'Rappeler',
                        'user'=> $user));



            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
        
        return $this->container->get('templating')->renderResponse('MyAppApBundle:Rdv:lister.html.twig', 
	array(
        'pagination' => $pagination,  
        'message' => '',
 	));
    }
    
    public function listerRdvAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();
             $user = $this->container->get('security.context')->getToken()->getUsername();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('MyAppApBundle:Client', 'a')
        ->where('a.etat = :var')      
        ->andWhere('a.user = :user')
        ->setParameters(array('var'=> 'Rdv',
                        'user'=> $user));

            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
        
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Rdv:listerRDV.html.twig', 
	array(
	'pagination' => $pagination,  
        'message' => '',
 	));
    }
     public function listerRienAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();
                     $user = $this->container->get('security.context')->getToken()->getUsername();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('MyAppApBundle:Client', 'a')
        ->where('a.etat = :var')      
        ->andWhere('a.user = :user')
        ->setParameters(array('var'=> 'A recontacter',
                        'user'=> $user));

            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Rdv:listerRien.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));
    }
    public function listerDoneAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();
                     $user = $this->container->get('security.context')->getToken()->getUsername();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('MyAppApBundle:Client', 'a')
        ->where('a.etat = :var')      
        ->andWhere('a.user = :user')
        ->setParameters(array('var'=> 'Done',
                        'user'=> $user));


            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Rdv:listerDone.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));
    }
    
    public function listerSecondeAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('MyAppApBundle:Client', 'a')
        ->where('a.etat = :var')      
        ->andWhere('a.user = :user')
        ->setParameters(array('var'=> '2nd Service',
                        'user'=> $user));


            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Rdv:listerSeconde.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));
    }
    
    public function listerAnneeAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();    
        
                $user = $this->container->get('security.context')->getToken()->getUsername();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('MyAppApBundle:Client', 'a')
        ->where('a.etat = :var')      
        ->andWhere('a.user = :user')
        ->setParameters(array('var'=> '2013',
                        'user'=> $user));
        

            $paginator = $this->container->get('knp_paginator');
            $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Rdv:listerAnnee.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));
    }
}
