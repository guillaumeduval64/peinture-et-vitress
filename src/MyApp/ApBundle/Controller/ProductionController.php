<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Client;
use MyApp\ApBundle\Entity\DateTable;
use MyApp\ApBundle\Entity\StartStop;
use MyApp\ApBundle\Entity\Production;
use MyApp\ApBundle\Entity\Comptabilite;
use MyApp\ApBundle\Entity\Travailleur;
use MyApp\ApBundle\Entity\Contrat;
use MyApp\ApBundle\Form\ProductionForm;
use MyApp\ApBundle\Form\ComptabiliteForm;
use MyApp\ApBundle\Form\StartForm;
use MyApp\ApBundle\Form\StopForm;

class ProductionController extends ContainerAware
{
    public function startAction(Production $production)
{
        $startStop = new StartStop;
        $message='';
	$em = $this->container->get('doctrine')->getEntityManager();
        if (isset($id)) 
            {
                    // modification d'un acteur existant : on recherche ses données

                    if (!$production)
                    {
                            $message='Aucune production trouvée';
                    }
            }
            $formStart = $this->container->get('form.factory')->create(new StartForm(), $startStop);

            $request = $this->container->get('request');

            if ($request->getMethod() == 'POST') 
            {
                        $formStart->bind($request);

                if ($formStart->isValid()) 
                {

                        $startStop->setProduction($production);
                        $startStop -> setHeureD(new \DateTime());
                        $startStop -> setHeureF(new \DateTime('00:00:00'));              
                        $production -> setHeureD(new \DateTime());
                        $em->persist($production);
                        $em->persist($startStop);
                        $em->flush();
                            $message='Start ajouté avec succès !';
                            
                }
            }

        $query = $em->createQuery('SELECT a.id, u.heureD, u.heureF, b.prenom FROM MyAppApBundle:Production a JOIN a.startStop u LEFT JOIN u.travailleur b WHERE a.id = :id')
        ->setParameter('id', $production->getId());
        $equipe = $query->getResult();

    return new RedirectResponse($this->container->get('router')->generate('myapp_production_modifier',array('id' => $production->getId())));

}
        public function stopAction($id = null,$test = null)
{
         
        $message='';
	$em = $this->container->get('doctrine')->getEntityManager();
        if (isset($test)) 
            {
                    // modification d'un acteur existant : on recherche ses données
                    $production = $em->find('MyAppApBundle:Production', $id);

                    if (!$production)
                    {
                            $message='Aucune production trouvée';
                    }
            }
            $startStop = $em->find('MyAppApBundle:startStop', $test);

                        $startStop->setProduction($production);
                        $startStop -> setHeureF(new \DateTime());
                        $production -> setHeureF(new \DateTime());
                        $em->persist($production);
                        $em->persist($startStop);
                        $em->flush();
                            $message='Stop ajouté avec succès !';

        $query = $em->createQuery('SELECT u.id, u.heureD, u.heureF, b.prenom FROM MyAppApBundle:Production a JOIN a.startStop u LEFT JOIN u.travailleur b WHERE a.id = :id')
        ->setParameter('id', $id);
        $equipe = $query->getResult();
        

        return new RedirectResponse($this->container->get('router')->generate('myapp_production_modifier',array('id' => $id)));
        }
    public function listerAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb->select('p')
        ->from('MyAppApBundle:Production', 'p')
        ->orderBy('p.dateProd', 'DESC')
        ->where('p.statut = :booke')
        ->setParameter('booke', 'Booké');


        $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Production:lister.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));
    }
    
    public function bookeAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb->select('p')
        ->from('MyAppApBundle:Production', 'p')
        ->orderBy('p.previsionDateProd', 'ASC')
        ->addOrderBy('p.period', 'ASC')
        ->where('p.statut = :booke')
        ->setParameter('booke', 'Non Booké');



        $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Production:listerdefinir.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));   

    }
        public function termineAction()
    {
    	$em = $this->container->get('doctrine')->getEntityManager();
        
        $qb = $em->createQueryBuilder();
        $qb->select('p')
        ->from('MyAppApBundle:Production', 'p')
        ->orderBy('p.dateProd', 'ASC')
        ->where('p.statut = :booke')
        ->setParameter('booke', 'Terminé');
        
        $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Production:listertermine.html.twig', 
	array(
	'pagination' => $pagination,
        'message' => '',
 	));
    }
    
    public function ajouterAction(Production $production)
    {
        $message = '';
       
        $form = $this->container->get('form.factory')->create(new ProductionForm(), $production);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);
                    
            if ($form->isValid()) 
                {      
                    $em = $this->container->get('doctrine')->getEntityManager();
                    $client = $em->find('MyAppApBundle:Client', $id);
                    if (!$client)
                    {
                            $message='Aucun client trouvé';
                    }
                    $production -> setClient($client);
                    $production -> setHeureF(new \DateTime('00:00:00'));
                    $production -> setHeureD(new \DateTime('00:00:00'));
                    
                    $em->persist($production);
                    $em->flush();
                    $message='Production ajouté avec succès !';
                }
         }

        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Production:ajouter.html.twig',
        array(
            'form' => $form->createView(),
            'message' => $message
        ));
    }

    public function modifierAction($id = null)
    {
        $message='';
	$em = $this->container->get('doctrine')->getEntityManager();
                $conn = $this->container->get('database_connection');
        $sql=('SELECT c.id, c.heureD,c.heureF, group_concat( e.prenom ) AS prenom
FROM Production a
JOIN StartStop c ON c.production_id = a.id
JOIN startstop_travailleur d ON c.id = d.startstop_id
JOIN Travailleur e ON d.travailleur_id = e.id
WHERE a.id = :id
GROUP BY c.id');
        
 $equipe = $conn->prepare($sql);
$equipe->bindValue("id", $id);
$equipe->execute();

        
        
         $query = $em->createQuery('SELECT a FROM MyAppApBundle:Contrat a JOIN a.production u WHERE u.id = :id')
        ->setParameter('id', $id);
        $contrat = $query->getResult();
        
        if (isset($id)) 
            {
                    // modification d'un acteur existant : on recherche ses données
                    $production = $em->find('MyAppApBundle:Production', $id);

                    if (!$production)
                    {
                            $message='Aucune production trouvée';
                    }
            }
            $formEtat = $this->container->get('form.factory')->create(new ProductionForm(), $production);

            $request = $this->container->get('request');

            if ($request->getMethod() == 'POST') 
            {
                        $formEtat->bind($request);

                if ($formEtat->isValid()) 
                {
                        $em->persist($production);
                        $em->flush();

                        if (isset($id)) 
                            {
                            }
                }
            }
            $comptabilite = new Comptabilite();
                    $form = $this->container->get('form.factory')->create(new ComptabiliteForm(), $comptabilite);

                    if (isset($id)) 
            {
                    // modification d'un acteur existant : on recherche ses données
                    $production = $em->find('MyAppApBundle:Production', $id);

                    if (!$production)
                    {
                            $message='Aucune production trouvée';
                    }
            }
            $formStart = $this->container->get('form.factory')->create(new StartForm());

        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Production:modifier.html.twig',
                array(
              'form' => $form->createView(), 
                'message' => '',
                'contrat' => $contrat,
                'production' => $production,
                'equipe' => $equipe,
                'formStart' => $formStart->createView(), 
                'formEtat' => $formEtat->createView()
                ));
        }

    public function comptabiliteAction($id = null)
    {
                $message='';
	$em = $this->container->get('doctrine')->getEntityManager();
            
        $comptabilite = new Comptabilite();
        $production = $em->find('MyAppApBundle:Production', $id);
        $form = $this->container->get('form.factory')->create(new ComptabiliteForm(), $comptabilite);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);
                    
            if ($form->isValid()) 
                {       
                    if ($production)
                    {
                        $comptabilite -> setProduction($production);
                    }
                    $user = $this->container->get('security.context')->getToken()->getUser(); 
                    $comptabilite -> setUser($user);
                    $date = new DateTable();
                    $comptabilite->setDateTable($date);
                    $date ->setDate(new \DateTime());
                    $em->persist($comptabilite);
                    $em->flush();
                    $message='Bill ajouté avec succès !';
                    
                }
                    return new RedirectResponse($this->container->get('router')->generate('myapp_production_modifier',array('id'=>$id, 'message'=>'Service supprimé avec succès !')));

        }
                return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Production:modifier.html.twig',
                array(
                'form' => $form->createView(), 
                    ));
            
    }
   
    public function statAction($id=null)
    {
    	$em = $this->container->get('doctrine')->getEntityManager();

	$production = $em->find('MyAppApBundle:Production', $id);

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Production:stat.html.twig', 
	array(
	'production' => $production,
        'message' => '',
 	));
    }
}