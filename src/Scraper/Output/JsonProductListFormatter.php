<?php

namespace Scraper\Output;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Scraper\View\ProductList;

class JsonProductListFormatter implements ProductListFormatterInterface
{
    /**
     * @param ProductList $productList
     * @return string
     */
    public function format(ProductList $productList)
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize($productList, 'json');
    }

}