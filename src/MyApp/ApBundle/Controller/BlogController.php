<?php
 namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends ContainerAware
{

  public function traductionAction($name)
  {
    return $this->container->get('templating')->renderResponse('MyAppApBundle:Blog:traduction.html.twig', array(
      'name' => $name
    ));
  }
}