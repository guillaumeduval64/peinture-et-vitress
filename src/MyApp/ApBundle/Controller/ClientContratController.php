<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Client;
use MyApp\ApBundle\Entity\ClientService;
use MyApp\ApBundle\Entity\Service;
use MyApp\ApBundle\Entity\Note;
use MyApp\ApBundle\Form\ClientServiceForm;
use MyApp\ApBundle\Form\ClientForm;
use MyApp\ApBundle\Form\NoteForm;
use MyApp\ApBundle\Form\ClientEtatForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ClientContratController extends ContainerAware
{
    public function voirAction($id=null)
    {
        $message='';
	$em = $this->container->get('doctrine')->getEntityManager();
        $contrat= $em->getRepository('MyAppApBundle:Contrat')->find($id);
 
        $qb = $em->createQueryBuilder();
        $qb->select('sum(s.prix) FROM MyAppApBundle:Contrat c JOIN c.clientService s WHERE c.id = :id')->setParameter('id', $id);

        $query = $qb->getQuery();
        $total = $query->getResult();
        $contrat = $em->find('MyAppApBundle:Contrat', $id);
        $depot= $contrat ->getDepot();
        $balance= ($total[0][1] - $depot);
   

	return $this->container->get('templating')->renderResponse('MyAppApBundle:ContratClient:voir.html.twig', 
	array(
	'contrat' => $contrat,
        'message' => $message,
        'total' => $total,
        'balance' => $balance,
            ));
         }
     
}
