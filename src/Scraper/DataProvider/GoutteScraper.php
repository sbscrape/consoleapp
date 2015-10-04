<?php

namespace Scraper\DataProvider;

use Goutte\Client;
use Scraper\View\Product;
use Scraper\View\ProductList;
use Symfony\Component\DomCrawler\Crawler;

class GoutteScraper implements WebProductScraperInterface
{
    /**
     * @param string $url
     * @return ProductList $list
     */
    public function scrape($url)
    {
        $productList = new ProductList();

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $crawler->filterXPath('//*[@class="productInfo"]/h3/a')->each(function ($node) use ($productList, $client) {
            /** @var Crawler $node */
            $product = new Product();

            $link = $node->link();
            $subPage = $client->click($link);

            $subPage->filter('.productTitleDescriptionContainer > h1')->first()->each(function ($node) use ($product) {
                /** @var Crawler $node */
                $product->title = trim($node->text());
            });

            $subPage->filter('.pricePerUnit')->each(function ($node) use ($product) {
                /** @var Crawler $node */
                $product->unitPrice = $node->text();
            });

            $product->size = sprintf("%.2f", strlen($subPage->html()) / 1024);

            $subPage->filter('.pricePerUnit')->each(function ($node) use ($product) {
                /** @var Crawler $node */
                preg_match("/[\d\.]+/", $node->text(), $price);
                $product->unitPrice = $price[0];
            });

            $subPage->filter('htmlcontent > div')->first()->each(function ($node) use ($product) {
                /** @var Crawler $node */
                $product->description = trim($node->text());
            });
            $productList->addProduct($product);
        });
        return $productList;

    }
}