<?php

namespace CAII\PublicacionesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicacionNacionalType extends AbstractType
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
            ->add('fecha','date', array( 'years' => range(date('Y') - 25, date('Y') + 20),
                                                'required'=> false,
                                                'empty_value'  => '',
                ))
            ->add('isbn')
            ->add('paginas')
            ->add('doi')
            ->add('congreso')
            ->add('ciudad')
            ->add('issn')
            ->add('idiomaIngles')
            ->add('file')
            ->add('TipoPublicacion','entity', array(
                     'class' => 'PublicacionesBundle:TipoPublicacion',
                     'data' => $this->em->getReference("PublicacionesBundle:TipoPublicacion", 7)
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
