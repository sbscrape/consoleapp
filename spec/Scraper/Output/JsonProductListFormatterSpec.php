<?php

namespace spec\Scraper\Output;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Scraper\Output\JsonProductListFormatter;
use Scraper\View\Product;
use Scraper\View\ProductList;

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', __DIR__."/../../../vendor/jms/serializer/src");

/**
 * Class JsonProductListFormatterSpec
 * @package spec\Scraper\Output
 * @mixin JsonProductListFormatter
 */
class JsonProductListFormatterSpec extends ObjectBehavior
{
    public function it_should_return_valid_json()
    {
        $productList = new ProductList([new Product()]);
        $json = $this->format($productList)->getWrappedObject();
        assert(json_decode($json) !== null);
    }
}
