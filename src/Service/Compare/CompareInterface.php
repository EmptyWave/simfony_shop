<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 1:46
 */

namespace Service\Compare;


interface CompareInterface
{
  public function compare($a,$b): int;
}