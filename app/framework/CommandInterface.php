<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 2:35
 */

namespace Framework;


interface CommandInterface
{
  public function execute():void;
}