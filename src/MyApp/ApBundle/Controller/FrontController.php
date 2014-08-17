<?php

namespace MyApp\ApBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends ContainerAware
{
    /**
     * This is just an example howto use barcodes and to display them
     */
    public function indexAction(Request $request)
    {
    
        return $this->container->get('templating')->renderResponse(
            'MyAppApBundle:Front:index.html.twig',
            array(

            )
        );
    }

}