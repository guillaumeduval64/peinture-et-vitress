<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Satisfaction;
use MyApp\ApBundle\Entity\Client;
use MyApp\ApBundle\Entity\Contrat;
use MyApp\ApBundle\Entity\SatisfactionEquipe;
use MyApp\ApBundle\Form\SatisfactionForm;
use MyApp\ApBundle\Form\ClientForm;
use MyApp\ApBundle\Form\EmailForm;
use MyApp\ApBundle\Form\SatisfactionEquipeForm;
use MyApp\ApBundle\Form\ClientRechercheForm;

class SatisfactionController extends ContainerAware
{
    public function listerAction()
    {
	$em = $this->container->get('doctrine')->getEntityManager();

	$comptabilites= $em->getRepository('MyAppApBundle:Comptabilite')->findAll();

	return $this->container->get('templating')->renderResponse('MyAppApBundle:Comptabilite:lister.html.twig', 
	array(
	'comptabilites' => $comptabilites,
        'message' => '',
 	));
    }
    
    public function ajouterAction($id)
    {
        $message = '';
 
        $em = $this->container->get('doctrine')->getEntityManager();
        $user = $this->container->get('security.context')->getToken()->getUser(); 
        $production = $em->find('MyAppApBundle:Production', $id);
        $satisfaction = $production ->getSatisfaction();
        if (isset($satisfaction)) 
	{
	}
	else 
	{
		// ajout d'un nouvel acteur
		$satisfaction = new Satisfaction();
	}
        
        $form = $this->container->get('form.factory')->create(new SatisfactionForm(), $satisfaction);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form->bind($request);
                    
            if ($form->isValid()) 
                {       
                    if ($production)
                    {
                        $production -> setSatisfaction($satisfaction);
                        
                    }
                    $satisfaction -> setUser($user); 
                    $em->persist($satisfaction);
                    $em->persist($production);
                    $em->flush();
                    $message='Merci !';
                }
                return new RedirectResponse($this->container->get('router')->generate('myapp_satisfaction_remerciement', array('id' => $id,'production' => $production)));
        }

        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Satisfaction:ajouter.html.twig',
        array(
            'form' => $form->createView(),
            'message' => $message,
            'satisfaction' => $satisfaction,
            'production' => $production,
        ));
    }
    
public function equipeAction($id)
    {
        $message = '';
        
        $em = $this->container->get('doctrine')->getEntityManager();
        $user = $this->container->get('security.context')->getToken()->getUser(); 
        $production = $em->find('MyAppApBundle:Production', $id);
        $query = $em->createQuery('SELECT c.id FROM MyAppApBundle:Production p JOIN p.client c 
            WHERE p.id = :id')->setParameter('id', $id);
        $clientId = $query->getResult();
        $client = $em->find('MyAppApBundle:Client', $clientId[0]);
        
                
        $satisfactionEquipe = $production -> getSatisfactionEquipe();
          if (isset($satisfactionEquipe)) 
	{
	}
	else 
	{
		// ajout d'un nouvel acteur
		$satisfactionEquipe = new SatisfactionEquipe();
	}
        $form = $this->container->get('form.factory')->create(new SatisfactionEquipeForm(), $satisfactionEquipe);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form-bind($request);
                    
            if ($form->isValid()) 
                {       
                    if ($production)
                    {
                        $production -> setSatisfactionEquipe($satisfactionEquipe);
                        
                    }
                    $satisfactionEquipe -> setUser($user); 
                    $client -> setEtat('Done');
                    $em->persist($satisfactionEquipe);
                    $em->persist($production);
                    $em->persist($client);
                    $em->flush();
                    $message='Merci !';
                }
             return new RedirectResponse($this->container->get('router')->generate('myapp_production_modifier', array('id' => $id)));    
        }

        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Satisfaction:equipe.html.twig',
        array(
            'form' => $form->createView(),
            'satisfactionEquipe' => $satisfactionEquipe,
        ));
    }
    public function emailAction($id)
        {
        $messageValidation = '';
         $em = $this->container->get('doctrine')->getEntityManager();
        $production = $em->find('MyAppApBundle:Production', $id);
        $qb = $em->createQueryBuilder();
        $qb->select('a.id') 
                ->from ('MyAppApBundle:Production','p') 
                ->JOIN ('p.client','a')
                ->WHERE ('p.id = :id')
                ->setParameter('id', $id);
        
        $query = $qb->getQuery();
        $idClient = $query->getResult();

        $client = $em->find('MyAppApBundle:Client', $idClient[0]);
        $form = $this->container->get('form.factory')->create(new EmailForm(),$client);
        $request = $this->container->get('request');
        if ($request->getMethod() == 'POST') 
        {
            $form-bind($request);
         $contratCree =  $production->getContratCree();   

            if ($form->isValid()) 
                {       
                if ($contratCree == 1) 
                    { 
                    $email= $client ->getEmail();
                    $client->setEmail($email);
                    $em->persist($client);
                    $em->flush();
                    
                    
                    $qb = $em->createQueryBuilder();
                    $qb->select('c.id') 
                            ->from ('MyAppApBundle:Comptabilite','c') 
                            ->JOIN ('c.production','a')
                            ->WHERE ('a.id = :id')
                            ->setParameter('id', $id);
                    $query = $qb->getQuery();
                    $recus = $query->getResult();


                    
                    
                    
                    
                    
                    
                    
                    $qb = $em->createQueryBuilder();
                    $qb->select('c.id') 
                            ->from ('MyAppApBundle:Contrat','c') 
                            ->JOIN ('c.production','p')
                            ->WHERE ('p.id = :id')
                            ->setParameter('id', $id);
                    $query = $qb->getQuery();
                    $idContrat = $query->getResult();

                    
                    $contrat= $em->getRepository('MyAppApBundle:Contrat')->find($idContrat[0]);
                    
                    $qb = $em->createQueryBuilder();
                    $qb->select('sum(s.prix) FROM MyAppApBundle:Contrat c JOIN c.clientService s WHERE c.id = :id')->setParameter('id', $contrat ->getId());
                    $query = $qb->getQuery();
                    $total = $query->getResult();
                    
             
                    
                    $numeroContrat = $contrat ->getNumero();
                    $depot= $contrat ->getDepot();
                    $balance= ($total[0][1] - $depot);
                    $request->request->all();
                    $message = \Swift_Message::newInstance()
                    ->setSubject('Reçu Lavage de vitres / Contrat numéro '.$numeroContrat)
                    ->setFrom('guillaume.duval@gmail.com')
                    ->setTo($email)
                    ->setBody($this->container->get('templating')->render('MyAppApBundle:ContratClient:voirEmail.html.twig', array(	
                                'contrat' => $contrat,
                                'messageValidation' => $messageValidation,
                                'total' => $total,
                                'balance' => $balance,)),
                                'text/html');

                    $this->container->get('mailer')->send($message);
                        
                        $messageValidation = 'Le courriel à été envoyé, Merci!';
                $i=0;
                foreach ($recus as $recu) {
                    
                    $message = \Swift_Message::newInstance()
                    ->setSubject('Reçu Lavage de vitres / Contrat numéro '.$recu)
                    ->setFrom('guillaume.duval@gmail.com')
                    ->setTo($email)
                    ->setBody($this->container->get('templating')->render('MyAppApBundle:ContratClient:voirRecuEmail.html.twig', array(	
                                'contrat' => $contrat,
                                'messageValidation' => $messageValidation,
                                'total' => $total,
                                'balance' => $balance,)),
                                'text/html');  
                      $this->container->get('mailer')->send($message);
                      $i++;
                    }
                
                                }
                else{
                    $messageValidation = 'Merci!';
                }
                }
                 
       }
       
        
        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Satisfaction:remerciement.html.twig',
        array(
            'form' => $form->createView(),
            'messageValidation' => $messageValidation,
            'production' => $production,
        ));
    }
}
