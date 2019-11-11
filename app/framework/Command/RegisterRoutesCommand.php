<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 2:34
 */

namespace Framework\Command;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterRoutesCommand
{
  /**
   * @var ContainerBuilder
   */
  public $containerBuilder;

  /**
   * ConfigCommandHandler constructor.
   * @param ContainerBuilder $containerBuilder
   */
  public function __construct(ContainerBuilder $containerBuilder)
  {
    $this->containerBuilder = $containerBuilder;
  }

  /**
   * @return ContainerBuilder
   */
  public function getContainerBuilder(){
    return $this->containerBuilder;
  }
}