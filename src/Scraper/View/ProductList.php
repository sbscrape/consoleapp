<?php

namespace Scraper\View;

use Traversable;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;

class ProductList implements \Countable, \IteratorAggregate
{
    /**
     * @var array
     * @SerializedName("results")
     */
    private $list = [];

    /**
     * @param array $list
     */
    public function __construct(array $list = [])
    {
        foreach ($list as $item) {
            $this->addProduct($item);
        }

    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->list[] = $product;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->list);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }

    /**
     * @VirtualProperty
     * @SerializedName("total")
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->list as $item) {
            $total += (float)$item->unitPrice;
        }
        return $total;

    }

}