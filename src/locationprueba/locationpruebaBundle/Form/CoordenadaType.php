<?php

/**
 * Description of Comentario
 *
 * @author JASMANY
 */

namespace locationprueba\locationpruebaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CoordenadaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('latitud', 'text', array('label' => ' '))
                ->add('longitud', 'text', array('label' => ' '));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => "locationprueba\locationpruebaBundle\Entity\Coordenada"
        );
    }
    
    public function getName()
    {
        return '_';
    }
}

