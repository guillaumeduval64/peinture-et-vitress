<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class DashboardController extends ContainerAware
{
    public function voirAction() 
     {   
        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:lister.html.twig');
     }  

public function nbProductionAction()
     { 

  $user = $this->container->get('security.context')->getToken()->getUser();

  if($user ='anon.'){
$userId =1;
$user = 'rado';
  }else{
   $userId = $user->getId(); 
   $user = $user->getUsername();
  }

  $nbProduction = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Contrat')
                         ->getAllProductionsFranchiseCount($user);

$year = date("o");
$month = date("m");
$week = date("W");

$nbProductionObj=$this->container->get('doctrine.orm.entity_manager')
    ->getRepository('MyAppApBundle:ObjectifSemaine')
    ->getObjectifProdByFranchise($userId, $year);

$nbContrat = $nbProductionObj[0]->getObjectif()->getNbContrat() ;


$nbProductionObj = $nbProductionObj[0] ->getValeur();

$difObjectifProd = $nbProduction[0][1] - $nbProductionObj;
if ($nbProduction[0][1]>0) {
  $percentageObjectifProd = ($nbProduction[0][1]/$nbContrat)*100;
}else{
  $percentageObjectifProd =0;
  $nbProductionObj ;
}


$nbProductionMonth = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Contrat')
                         ->getAllProductionsFranchiseCountMonth($user);

$nbProductionObjM=$this->container->get('doctrine.orm.entity_manager')
    ->getRepository('MyAppApBundle:ObjectifSemaine')
    ->getObjectifProdByFranchiseMonth($userId,$month);



if ($nbProductionMonth[0][1]>0) {
  $nbProductionObjM = $nbProductionObjM[0] ->getValeur();
  $difObjectifProdM = $nbProductionMonth[0][1] - $nbProductionObjM;

  $percentageObjectifProdM = ($nbProductionMonth[0][1])/($difObjectifProdM*$nbContrat)*100;


}else{
  $percentageObjectifProdM =0;
 
  $nbProductionObjM[0] ->getValeur();
}

$nbProductionWeek = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Contrat')
                         ->getAllProductionsFranchiseCountWeek($user);

$nbProductionObjW=$this->container->get('doctrine.orm.entity_manager')
    ->getRepository('MyAppApBundle:ObjectifSemaine')
    ->getObjectifProdByFranchiseWeek($userId, $week);


if ($nbProductionWeek[0][1]>0) {
  $nbProductionObjW = $nbProductionObjW[0] ->getValeur();
  $difObjectifProdW = $nbProductionWeek[0][1] - $nbProductionObjW;
  $percentageObjectifProdW =($nbProductionWeek[0][1])/($difObjectifProdW*$nbContrat)*100;

}else{
  $percentageObjectifProdW =0;
  $nbProductionObjW[0] ->getValeur();
}


        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:nbProduction.html.twig', 
  array(
                'nbProduction' => $nbProduction,
                'nbProductionObj' => $nbProductionObj,
                'percentageObjectifProd' => $percentageObjectifProd,
                'percentageObjectifProdM' => $percentageObjectifProdM,
                'percentageObjectifProdW' => $percentageObjectifProdW,
                'nbProductionMonth' => $nbProductionMonth,
                'nbProductionObjM' => $nbProductionObjM,
                'nbProductionWeek' => $nbProductionWeek,
                'user' => $user,    
  ));
}  

public function nbClientAction()
     {   
                $user = $this->container->get('security.context')->getToken()->getUsername();
  $nbClient = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Client')
                         ->getAllClientsByFranchiseCount($user);

$nbClientWeek = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Client')
                         ->getAllClientsByFranchiseCountWeek($user);

$nbClientMonth = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Client')
                         ->getAllClientsByFranchiseCountMonth($user);
        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:nbClient.html.twig', 
  array(
                'nbClient' => $nbClient,
                'nbClientWeek' => $nbClientWeek,
                'nbClientMonth' => $nbClientMonth,
                'user' => $user,
  ));
}   

public function nbEstimationAction()
{   
  $user = $this->container->get('security.context')->getToken()->getUsername();
  $nbEstimation = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Contrat')
                         ->getAllEstimationsFranchiseCount($user);

$nbEstimationMonth = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Contrat')
                         ->getAllEstimationsFranchiseCountMonth($user);

$nbEstimationWeek = $this->container->get('doctrine.orm.entity_manager')
                         ->getRepository('MyAppApBundle:Contrat')
                         ->getAllEstimationsFranchiseCountWeek($user);

        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:nbEstimation.html.twig', 
  array(
                'nbEstimation' => $nbEstimation,
                'nbEstimationWeek' => $nbEstimationWeek,
                'nbEstimationMonth' => $nbEstimationMonth,
                'user' => $user,
  ));
}  

public function nbContratAction()
{   
  $user = $this->container->get('security.context')->getToken()->getUsername();

  $nbContrat = $this->container->get('doctrine.orm.entity_manager')
                           ->getRepository('MyAppApBundle:Contrat')
                           ->getAllContratsFranchiseCount($user);

  $nbContratMonth = $this->container->get('doctrine.orm.entity_manager')
                           ->getRepository('MyAppApBundle:Contrat')
                           ->getAllContratsFranchiseCountMonth($user);

  $nbContratWeek = $this->container->get('doctrine.orm.entity_manager')
                           ->getRepository('MyAppApBundle:Contrat')
                           ->getAllContratsFranchiseCountWeek($user);

        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:nbContrat.html.twig', 
  array(
                'nbContrat' => $nbContrat,
                'nbContratWeek' => $nbContratWeek,
                'nbContratMonth' => $nbContratMonth,
                'user' => $user,
  ));
}  

public function produitUtilisateurAction()
     {   
          $em = $this->container->get('doctrine')->getEntityManager();
                $username = $this->container->get('security.context')->getToken()->getUsername();

                $qb = $em->createQueryBuilder();
                $qb ->select('sum (a.prix)')
                  ->from('MyAppApBundle:ClientService', 'a')
                  ->join('a.client', 's')
                  ->join('s.contrat', 'c')
                  ->join('c.production', 'p')
                  ->where("s.user LIKE :username ")
                  ->andWhere("p.statut LIKE :Termine")
                  ->setParameters(array('username' => $username,'Termine' => 'Terminé'));
        $query = $qb->getQuery();               
        $nbDollarProduit = $query->getResult();
        
                     $qbcount = $em->createQueryBuilder();
                $qbcount ->select('COUNT (a.prix)')
                  ->from('MyAppApBundle:ClientService', 'a')
                  ->join('a.client', 's')
                  ->join('s.contrat', 'c')
                  ->join('c.production', 'p')
                  ->where("s.user LIKE :username ")
                  ->andWhere("p.statut LIKE :Termine")
                  ->setParameters(array('username' => $username,'Termine' => 'Terminé'));
        $querycount = $qbcount->getQuery();               
        $nbProduit = $querycount->getResult();

        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:produitUtilisateur.html.twig', 
	array(
                'nbDollarProduit' => $nbDollarProduit,
                'nbProduit' => $nbProduit,
                'username' => $username,
 	));
    }    
   public function produitUtilisateurSemaineAction()
     {   
        
       //Query nombre de $ prosuit par user par semaine prend -7 jours mais pas la semaine...
                $em = $this->container->get('doctrine')->getEntityManager();
                $username = $this->container->get('security.context')->getToken()->getUsername();
                
                $qb = $em->createQueryBuilder();
                $qb ->select('sum (a.prix)')
                  ->from('MyAppApBundle:ClientService', 'a')
                  ->join('a.client', 's')
                  ->join('s.contrat', 'c')
                  ->join('c.production', 'p')
                  ->where("s.user LIKE :username ")
                  ->andWhere("p.statut LIKE :Termine")
                  ->andWhere ("p.created >= :date")
                  ->setParameters(array(
                      'username' => $username,
                      'Termine' => 'Terminé',
                      'date' =>new \DateTime('-1 week')
                      ));
        $query = $qb->getQuery();               
        $nbDollarProduitSemaine = $query->getResult();

        return $this->container->get('templating')->renderResponse('MyAppApBundle:Dashboard:produitUtilisateurSemaine.html.twig', 
	array(
                'nbDollarProduitSemaine' => $nbDollarProduitSemaine,
                'username' => $username,
 	));
    }    
}