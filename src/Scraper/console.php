<?php
require_once(__DIR__.'/../../vendor/autoload.php');

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', __DIR__."/../../vendor/jms/serializer/src");

use Symfony\Component\Console\Application;

$console = new Application();
$console->add(
    new \Scraper\Command\ProductExtractorCommand(
        new \Scraper\DataProvider\GoutteScraper(),
        new \Scraper\Output\JsonProductListFormatter()
    )
);
$console->run();