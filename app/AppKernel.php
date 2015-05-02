<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new CAII\BackendBundle\BackendBundle(),
            new CAII\MiembroBundle\MiembroBundle(),
            new CAII\ProyectoBundle\ProyectoBundle(),
            new CAII\PublicacionesBundle\PublicacionesBundle(),
            new CAII\PortadaBundle\PortadaBundle(),
            new CAII\EntidadFinancieraBundle\EntidadFinancieraBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new CAII\NoticiaBundle\NoticiaBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new CAII\RecursoBundle\RecursoBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            //$bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();

        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
