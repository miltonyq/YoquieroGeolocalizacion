<?php

namespace locationprueba\locationpruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('locationpruebaBundle:Default:index.html.twig', array('name' => $name));
    }
}
