<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 2:00
 */

namespace Service\Compare\Comparator;


use Service\Compare\CompareInterface;
use Model\Entity\Product;

class NameComparator implements CompareInterface
{
  /**
   * @param Product $a
   * @param Product $b
   * @return int
   */
  public function compare($a, $b): int
  {
    return strcmp($a->getName(),$b->getName());
  }
}