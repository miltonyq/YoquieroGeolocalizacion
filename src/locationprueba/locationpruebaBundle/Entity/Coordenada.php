<?php

/**
 * Description of Comentario
 *
 * @author JASMANY
 */

namespace locationprueba\locationpruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Table(name="coordenada")
 *@ORM\Entity  
 *@ORM\Entity(repositoryClass="locationprueba\locationpruebaBundle\Entity\CoordenadaRepository") 
 */
class Coordenada 
{
    //Id de Coordenada
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    //Latitud de Coordenada
    /**
     * @ORM\Column(type="float")
     */
    protected $latitud;
    
    //Longitud de Coordenada
    /**
     * @ORM\Column(type="float")
     */
    protected $longitud;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * Get latitud
     *
     * @return float 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * Get longitud
     *
     * @return float 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }
}