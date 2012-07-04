<?php

/**
 * Description of Comentario
 *
 * @author JASMANY
 */

namespace locationprueba\locationpruebaBundle\Entity;
use Doctrine\ORM\EntityRepository;

/**
 * Description of CoordenadaRepository
 *
 * @author Jasmany
 */

class CoordenadaRepository extends EntityRepository
{
    public function todos_empresas()
    {
        return $this->getEntityManager()
                    ->createQuery('select u from locationprueba\locationpruebaBundle\Entity\Coordenada u')
                    ->getResult();
    }
}
