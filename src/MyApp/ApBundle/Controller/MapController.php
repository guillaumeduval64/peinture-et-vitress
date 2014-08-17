<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MyApp\ApBundle\Entity\Client;
use MyApp\ApBundle\Entity\Satisfaction;
use MyApp\ApBundle\Form\satisfactionForm;
use Ivory\GoogleMapBundle\Model\MapTypeId;
use Ivory\GoogleMapBundle\Model\Overlays\Animation;
use Ivory\GoogleMapBundle\Model\Events\MouseEvent;


class MapController extends ContainerAware
{
     public function voirToutClientAction()
   
    { 
	$em = $this->container->get('doctrine')->getEntityManager();


        
        

        $dql = "SELECT count (c.id) as test, c.id,c.lat,c.lng, c.nom as nom, c.prenom as prenom, c.number as number, c.street as street FROM MyAppApBundle:ClientService a JOIN a.client c WHERE a.client=c.id GROUP BY c.id";
        $query = $em->createQuery($dql);
       
        $markers = $query->getArrayResult();
        json_encode($markers);
        

          return $this->container->get('templating')->renderResponse('MyAppApBundle:Map:voirClient.html.twig', array(
                'markers' => $markers,

    ));
    } 
    
    
    public function voirAction()
    {
        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Map:voir.html.twig');
    }
    
     public function voirClientAction($id = null)
    {
        $message='';
	$em = $this->container->get('doctrine')->getEntityManager();
        $client = $em->find('MyAppApBundle:Client', $id);
        
        if (isset($id)) 
            {
                    // modification d'un acteur existant : on recherche ses données
                    $client = $em->find('MyAppApBundle:Client', $id);
                    if (!$client)
                    {
                            $message='Aucun client trouvé';
                    }
            }
        return $this->container->get('templating')->renderResponse(
        'MyAppApBundle:Map:voirClient.html.twig',array(
                'client' => $client,
                )); 
        }
        
   public function journeyAction()
    {
        $geocoder = $this->container->get('ivory_google_map.geocoder');
        
        $response = $geocoder->geocode('100 st joseph ouest montreal');
        $response = $geocoder->geocode('33 côte sainte cataherine montreal');

        $map = $this->container->get('ivory_google_map.map');

        foreach($response->getResults() as $result)
        {
            // Request the google map merker service
            $marker = $this->container->get('ivory_google_map.marker');

            // Position the marker
            $marker->setPosition($result->getGeometry()->getLocation());

            // Add the marker to the map
            $map->addMarker($marker);
        }


        return $this->container->get('templating')->renderResponse('MyAppApBundle:Map:journey.html.twig', array(
        'map' => $map,
        ));
    }

}
