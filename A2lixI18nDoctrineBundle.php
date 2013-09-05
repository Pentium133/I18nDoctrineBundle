<?php

namespace A2lix\I18nDoctrineBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle,
    Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author David ALLIX
 */
class A2lixI18nDoctrineBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }
    
    public function boot()
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $conf = $em->getConfiguration();
        $conf->addFilter(
            'oneLocale',
            'A2lix\I18nDoctrineBundle\Doctrine\ORM\Filter\OneLocaleFilter'
        );
        $conf->addFilter(
            'manyLocales',
            'A2lix\I18nDoctrineBundle\Doctrine\ORM\Filter\ManyLocalesFilter'
        );
        $em->getFilters()->enable('oneLocale');
        $em->getFilters()->enable('manyLocales');
    }    
}
