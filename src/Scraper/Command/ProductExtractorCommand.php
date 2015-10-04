<?php

namespace Scraper\Command;

use Scraper\DataProvider\GoutteScraper;
use Scraper\DataProvider\WebProductScraperInterface;
use Scraper\Output\JsonProductListFormatter;
use Scraper\Output\ProductListFormatterInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductExtractorCommand extends Command
{
    /**
     * @var WebProductScraperInterface
     */
    private $dataProvider;

    /**
     * @var ProductListFormatterInterface
     */
    private $formatter;

    public function __construct(WebProductScraperInterface $dataProvider, ProductListFormatterInterface $formatter, $name = null)
    {
        $this->dataProvider = $dataProvider;
        $this->formatter = $formatter;
        parent::__construct($name);
    }


    protected function configure()
    {
        $this->setName('sainsbury:scraper')
            ->setDescription('Test scraper')
            ->addArgument('url', InputArgument::REQUIRED, 'Root url to scrape');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!filter_var($input->getArgument("url"), FILTER_VALIDATE_URL)) {
            throw new \Exception(sprintf("'%s' does not look like a valid url", $input->getArgument("url")));
        }

        $output->write(
            $this->formatter->format(
                $this->dataProvider->scrape($input->getArgument("url"))
            )
        );
    }

}