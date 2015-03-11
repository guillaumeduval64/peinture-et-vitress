<?php

namespace FrontEnd\SuperBundle\Controller;

use FrontEnd\SuperBundle\Entity\Devis;   
use FrontEnd\SuperBundle\Entity\Fenetre;   
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontEnd\SuperBundle\Form\DevisType;
use Symfony\Component\HttpFoundation\Request;



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


	public function estimationAction(Request $request)
    {
$data = $request->request->get('formName');
$devis = New Devis();
             $em = $this->getDoctrine()->getManager();
//nom                 
$devis->setNom($data[0]['value']);
$devis->setPrenom($data[1]['value']);
$devis->setCellulaire($data[2]['value']);
$devis->setEmail($data[3]['value']);
$devis->setHouseType($data[4]['value']);
$devis->setHouseTypeFloors($data[5]['value']);
$devis->setBasement($data[6]['value']);
$devis->setIntExt($data[7]['value']);

$i= -1;
$a=0;
foreach ($data as $d) {

  if (substr($d['name'],0,36) == "frontend_superbundle_devis[fenetres]") {
    

   $r = fmod($a, 3);

    if($r == 0){
      $i++;
    }
     

    ++$a;
  }


  if ($d['name'] == "frontend_superbundle_devis[fenetres][".$i."][type]") {
     $fenetre = new Fenetre();
    $fenetre->setType($d['value']);
/*    echo $i;
    echo $d['name'];
var_dump($fenetre->getType());*/
  }
  elseif ($d['name'] == "frontend_superbundle_devis[fenetres][".$i."][nombre]") {
 $fenetre->setNombre($d['value']); 

}
    elseif ($d['name'] == "frontend_superbundle_devis[fenetres][".$i."][description]") {
 $fenetre->setDescription($d['value']);
         $fenetre->setDevis($devis);
        $em->persist($fenetre);
        $em->flush();



   }



  }

   
  //var_dump($key);
 // var_dump($data);
  //echo "salope";






$prix = 80;


   

$devisId = $devis->getId();
$query = $em->createQuery("SELECT u, a FROM FrontEndSuperBundle:Fenetre u JOIN u.devis a WHERE a.id = $devisId");

$listeFenetres = $query->getResult();


foreach($listeFenetres as $fenetre)
{
  $nombreFenetre = $fenetre->getNombre();

  switch ($fenetre->getType()) {
    case 'double':
    

      $prix += 20 * $nombreFenetre;

      break;
    
    case 'autre':
      $prix += 30 * $nombreFenetre;
      break;
    

    default:
      $prix += 15 * $nombreFenetre;
      break;
  }
}


$devis->setPrix($prix);

 $em->persist($devis);
 

      $em->flush();


       return $this->container->get('templating')->renderResponse('FrontEndSuperBundle:Default:listePrix.html.twig', array(
            'prix' => $prix
            ));

    }


}





