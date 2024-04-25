<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;


use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\HttpKernel\KernelEvents;
use Inndividuell\ContaoJobsExtension\EventListener\SitemapListener;
use Doctrine\DBAL\Connection;
/**
 * @Formatter:off
 */
return static function (ContainerConfigurator $container) {

    $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure()
        ->set(SitemapListener::class)
    ;

};
