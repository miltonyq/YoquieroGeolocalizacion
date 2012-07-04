<?php

/**
 * Description of Comentario
 *
 * @author JASMANY
 */

namespace locationprueba\locationpruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use locationprueba\locationpruebaBundle\Form\CoordenadaType;
use locationprueba\locationpruebaBundle\Entity\CoordenadaRepository;



class localController extends Controller 
{
    public function locacionAction()
    {
        //$lat=-16.509373371565342;
        //$lon=-68.124155475502;
        
       
        
        $em = $this->get('doctrine')->getEntityManager();
        $form= $this->get('form.factory')->create(new CoordenadaType());
        $request=$this->get('request');
       
        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            if ($form->isValid()) 
            {
                $coordenada = $form->getData();
                $em->persist($coordenada);
                $em->flush();
            }
        }
        
        $latlong = $em->getRepository('locationpruebaBundle:Coordenada')->todos_empresas();
        
        return $this->render('locationpruebaBundle:Geolocation:locacion.html.twig',
                    array( 'form' => $form->createView(),
                           'latlong'=>$latlong));
    }
}
