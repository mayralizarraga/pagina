<?php

namespace CAII\PublicacionesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicacionReporteType extends AbstractType
{
    public function __construct($em) {
        $this->em = $em;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('tituloLibro')
            ->add('fecha')
            ->add('issn')
            ->add('paginas')
            ->add('doi')
            ->add('volumen')
            ->add('serie')
            ->add('TipoPublicacion','entity', array(
                     'class' => 'PublicacionesBundle:TipoPublicacion',
                     'property' => 'nombre',
                     'disabled'=> true,
                     'read_only' => true,
                     'data' => $this->em->getReference("PublicacionesBundle:TipoPublicacion", 3)
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CAII\PublicacionesBundle\Entity\Publicacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caii_publicacionesbundle_publicacion';
    }
}