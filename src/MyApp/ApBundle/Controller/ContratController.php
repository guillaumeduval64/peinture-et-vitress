<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Contrat;
use MyApp\ApBundle\Entity\Comptabilite;
use MyApp\ApBundle\Entity\Client;
use MyApp\ApBundle\Entity\Production;
use MyApp\ApBundle\Entity\ClientService;
use MyApp\ApBundle\Form\ContratForm;
use MyApp\ApBundle\Form\ContratEstimationForm;
use MyApp\ApBundle\Form\ContratRechercheForm;
use Sorien\DataGridBundle\Grid\Source\Entity;
use Sorien\DataGridBundle\Grid\Column\TextColumn;
use Sorien\DataGridBundle\Grid\Column\ActionsColumn;
use Sorien\DataGridBundle\Grid\Action\MassAction;
use Sorien\DataGridBundle\Grid\Action\DeleteMassAction;
use Sorien\DataGridBundle\Grid\Action\RowAction;

class ContratController extends ContainerAware
{
    
    public function rechercherAction()
    {               
        $request = $this->container->get('request');

        if($request->isXmlHttpRequest())
        {
            $motcle = '';
            $motcle = $request->request->get('motcle');

            $em = $this->container->get('doctrine')->getEntityManager();
            $production= $em->getRepository('MyAppApBundle:Production')->findAll();

            if($motcle != '')
            {
                $qb = $em->createQueryBuilder();

                $qb->select('c')
                    ->from('MyAppApBundle:Contrat', 'c')
                    ->where("c.numero LIKE :motcle")
                    ->andWhere("c.contratEstimation = 'Contrat'")
                    ->orderBy('c.numero', 'ASC')
                    ->setParameter('motcle', '%'.$motcle.'%');

    
         $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            150/*limit per page*/
                );
        $pagination->setPageRange(7);
        
            }
            else {
                                $qb = $em->createQueryBuilder();

                $qb->select('c')
                    ->from('MyAppApBundle:Contrat', 'c')
                    ->where("c.numero")
                    ->orderBy('c.numero', 'ASC');

    
         $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            150/*limit per page*/
                );
                
                $production= $em->getRepository('MyAppApBundle:Production')->findAll();
            }

            return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:liste.html.twig', array(
                'pagination' => $pagination,
                'production' => $production,
                ));
        }
        else {
            return $this->listerAction();
        }
    }
    
    public function listerAction()
    {
//	 $clientService = $this->getDoctrine()
  //      ->getRepository('AcmeStoreBundle:ClientService')
    //    ->findOneByJoinedToClientService($id);
    $em = $this->container->get('doctrine')->getEntityManager();
    $production= $em->getRepository('MyAppApBundle:Production')->findAll();
    $form = $this->container->get('form.factory')->create(new ContratRechercheForm());
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $dql = "SELECT c FROM MyAppApBundle:Contrat c JOIN c.client cl WHERE cl.user = :user AND c.contratEstimation = 'Contrat' ORDER BY c.id DESC";
        $query = $em->createQuery($dql);
        $query -> setParameter('user', $user);
    
         $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
        
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:lister.html.twig', 
	array(
	'pagination' => $pagination, 
        'production' => $production,
        'message' => '',
        'form' => $form->createView(),
 	));
    }
    
    public function listerTermineAction()
    {
//	 $clientService = $this->getDoctrine()
  //      ->getRepository('AcmeStoreBundle:ClientService')
    //    ->findOneByJoinedToClientService($id);
    $em = $this->container->get('doctrine')->getEntityManager();
    $production= $em->getRepository('MyAppApBundle:Production')->findAll();
    $form = $this->container->get('form.factory')->create(new ContratRechercheForm());
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $dql = "SELECT c FROM MyAppApBundle:Contrat c JOIN c.client cl JOIN c.production p WHERE cl.user = :user AND c.contratEstimation = 'Contrat' ORDER BY c.id DESC";
        $query = $em->createQuery($dql);
        $query -> setParameter('user', $user);
    
         $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
        
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:lister.html.twig', 
	array(
	'pagination' => $pagination, 
        'production' => $production,
        'message' => '',
        'form' => $form->createView(),
 	));
    }
    
     public function listerEstimationAction()
    {
//	 $clientService = $this->getDoctrine()
  //      ->getRepository('AcmeStoreBundle:ClientService')
    //    ->findOneByJoinedToClientService($id);
    $em = $this->container->get('doctrine')->getEntityManager();
    $production= $em->getRepository('MyAppApBundle:Production')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $dql = "SELECT c FROM MyAppApBundle:Contrat c JOIN c.client cl WHERE cl.user = :user AND c.contratEstimation = 'Estimation' ORDER BY c.id DESC";
        $query = $em->createQuery($dql);
        $query -> setParameter('user', $user);
    
         $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);
    

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:listerEstimation.html.twig', 
	array(
	'pagination' => $pagination, 
        'production' => $production,
        'message' => '',
 	));
    }
    
    public function listerAnnuleAction()
    {
//	 $clientService = $this->getDoctrine()
  //      ->getRepository('AcmeStoreBundle:ClientService')
    //    ->findOneByJoinedToClientService($id);
    $em = $this->container->get('doctrine')->getEntityManager();
    $production= $em->getRepository('MyAppApBundle:Production')->findAll();
    
            $user = $this->container->get('security.context')->getToken()->getUsername();
        $dql = "SELECT c FROM MyAppApBundle:Contrat c JOIN c.client cl WHERE cl.user = :user AND c.contratEstimation = 'Annulé' ORDER BY c.id DESC";
        $query = $em->createQuery($dql);
        $query -> setParameter('user', $user);
    
         $paginator = $this->container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->container->get('request')->query->get('page', 1)/*page number*/,
            15/*limit per page*/
                );
        $pagination->setPageRange(7);

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:listerAnnule.html.twig', 
	array(
	'pagination' => $pagination, 
        'production' => $production,
        'message' => '',
 	));
    }
    
    public function ajouterAction($id = null)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $message = '';
        $contrat = new Contrat();
        
        $services = $em->find('MyAppApBundle:Service', $id);
        
        $client = $em->find('MyAppApBundle:Client', $id);
                
        $form = $this->container->get('form.factory')->create(new ContratForm($id), $contrat);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);

            //var_dump($test);
//j'ai enlevé le  if ($form->isValid()) qui me faisait pas passer
  
                    $em = $this->container->get('doctrine')->getEntityManager();
                    $production = new Production();
                    $contrat -> setProduction($production);

                    if ($contrat -> getContratEstimation() =="Estimation")
                        { 
                        $production -> setStatut('Non défini');
                        } 
                    else
                        { 
                        $production -> setStatut('Non Booké');
                        } 

                    $production -> setClient($client);
                    $contrat -> setClient($client);
                    $em->persist($production);
                    $em->persist($contrat);
                    $em->flush();
                    $message='Contrat ajouté avec succès !';
                     return new RedirectResponse($this->container->get('router')->generate('myapp_estimation_voirClient',array('id'=>$id, 'message'=>'Service supprimé avec succès !'))); 
              
         }

        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Contrat:ajouter.html.twig',
        array(
            'form' => $form->createView(),
            'message' => $message,
            'services' => $services,   
            'client' => $client,
            
        ));
    }
    public function voirContratAction() {
		
		$em = $this->container->get('doctrine')->getEntityManager();


		$contrats = $em->getRepository('MyAppApBundle:Contrat')->findAll(); //Or any other method you would like to use for fetching the entities from DB
		
		
		
		//Pass the form to a template and render it
		return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:liste.html.twig', array(        
                   'contrats' => $contrats));
	}
        
    public function voirAction($id=null)
    {
	$em = $this->container->get('doctrine')->getEntityManager();
     
//        $qb = $em->createQueryBuilder();
//        $qb->select('c.*, a.*')
//        ->from('Contrat', 'c')
//        ->leftJoin('c.contrat_ClientService', 'ca', Expr\Join::ON, 'c.id = ca.contrat_id')
//        ->leftJoin('ca.ClientService', 'a', Expr\Join::ON, 'a.id = ca.clientservice_id')
//        ->where('c.id = :id')
//        ->orderBy('c.created', 'DESC')
//        ->setParameter('id', $id);
//
//        $query = $qb->getQuery();
//        $clientservices = $query->getResult();
//        $query = $em->createQuery('SELECT c FROM MyAppApBundle:Contrat c JOIN c.clientService a 
//     WHERE c.id = :id ORDER BY c.created')->setParameter('id', $id);
//        $query = $query->getQuery();
//        $contrat = $query->getResult();
//        var_dump($clientservices); die;
        $contrat= $em->getRepository('MyAppApBundle:Contrat')->find($id);    
    $production = $contrat -> getProduction();
        $form = $this->container->get('form.factory')->create(new ContratEstimationForm($id), $contrat);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);
                    
            if ($form->isValid()) 
                {                 
                 if ($contrat -> getContratEstimation() =="Estimation")
                        { 
                        $production -> setStatut('Non défini');
                        } 
                    else
                        { 
                        $production -> setStatut('Non Booké');
                        } 
                        
                    $em->persist($contrat);
                    $em->persist($production);
                    $em->flush();
                }
                        
               $contrat= $em->getRepository('MyAppApBundle:Contrat')->find($id);
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:voir.html.twig', 
	array(
	'contrat' => $contrat,
        'message' => '',
        'form' => $form->createView(),
            ));
         }
	
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:voir.html.twig', 
	array(
        'form' => $form->createView(),
	'contrat' => $contrat,
        'message' => '',
 	));
    }
    
    public function pdfAction($id=null)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        
       $contrat= $em->getRepository('MyAppApBundle:Contrat')->find($id);
       $production= $em->getRepository('MyAppApBundle:Production')->findAll();
       $message2= 15;
       $rueGuillaume = '100 Bd Saint-Joseph Ouest';
       $appartementGuillaume = '2';
       $villeCpGuillaume = 'Montréal, H2T-2P6, QC';
     
	return $this->container->get('templating')->renderResponse('MyAppApBundle:Contrat:report.html.php', array(
            'message2' => $message2,
            'rueGuillaume' => $rueGuillaume,
            'appartementGuillaume' => $appartementGuillaume,
            'villeCpGuillaume' => $villeCpGuillaume,
	));
    }
   
    public function supprimerServiceAction($idd=null, $id=null)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
          $contrat= $em->getRepository('MyAppApBundle:Contrat')->find($id);
          $clientService= $em->getRepository('MyAppApBundle:ClientService')->find($idd);
          $contrat->getClientService()->removeElement($clientService);
            $em->persist($contrat);
            $em->flush(); //only call this after you've made all your data modifications 
    return new RedirectResponse($this->container->get('router')->generate('myapp_contrat_voir',array('id'=>$id, 'message'=>'Service supprimé avec succès !'))); 
    } 
}
