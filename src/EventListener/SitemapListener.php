<?php
namespace Inndividuell\ContaoJobsExtension\EventListener;

use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Event\SitemapEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Doctrine\DBAL\Connection;
#[AsEventListener(ContaoCoreEvents::SITEMAP)]
class SitemapListener
{
    private $database;

    public function __construct(Connection $database)
    {
        $this->database = $database;
    }
    public function __invoke(SitemapEvent $event): void
    {
        $sitemap = $event->getDocument();
        $urlSet = $sitemap->childNodes[0];

        $host = $event->getRequest()->server->get('HTTP_HOST');
        $request_scheme = $event->getRequest()->server->get('REQUEST_SCHEME');

        $host_complete = $request_scheme.'://'.$host.'/job/';
        $result = $this->database->fetchAllAssociative("SELECT * FROM tl_inn_jobs");

        foreach ($result as $manufacturer){

            $loc = $sitemap->createElement('loc');
            $loc->appendChild($sitemap->createTextNode($host_complete.$manufacturer['alias'].'.html'));

            $urlEl = $sitemap->createElement('url');
            $urlEl->appendChild($loc);
            $urlSet->appendChild($urlEl);
        }

    }
}
