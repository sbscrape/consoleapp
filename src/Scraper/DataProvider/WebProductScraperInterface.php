<?php

namespace Scraper\DataProvider;

use Scraper\View\ProductList;

interface WebProductScraperInterface
{
    /**
     * @param string $url
     * @return ProductList $list
     */
    public function scrape($url);
}