<?php

namespace Scraper\Output;

use Scraper\View\ProductList;

interface ProductListFormatterInterface
{
    /**
     * @param ProductList $productList
     * @return mixed
     */
    public function format(ProductList $productList);
}
