<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;


use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\HttpKernel\KernelEvents;
use Inndividuell\ContaoJobsExtension\EventListener\SitemapListener;

/**
 * @Formatter:off
 */
return static function (ContainerConfigurator $container) {

    $container->services()
        ->set(SitemapListener::class)
        ->args([
            service(ScopeMatcher::class),
            service('security.helper')
        ])
        ->tag('kernel.event_listener', ['event' => ContaoCoreEvents::SITEMAP])
    ;

};
