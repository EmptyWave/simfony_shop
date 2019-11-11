<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 1:48
 */

namespace Service\Product;

use Service\Compare\CompareInterface;

class ProductSort
{
  /**
   * @var CompareInterface
   */
  private $comparator;

  /**
   * ProductSort constructor.
   * @param CompareInterface $comparator
   */
  public function __construct(CompareInterface $comparator)
  {
    $this->comparator = $comparator;
  }

  /**
   * @param array $products
   * @return array
   */
  public function sort(array $products):array
  {
    usort($products,[$this->comparator, 'compare']);

    return $products;
  }

}