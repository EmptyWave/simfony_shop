<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 2:41
 */

namespace Framework\Command;


use Framework\CommandInterface;

class RoutesCommandHandler implements CommandInterface
{
  /**
   * @var RegisterRoutesCommand
   */
  public $command;

  /**
   * ConfigCommandHandler constructor.
   * @param RegisterRoutesCommand $command
   */
  public function __construct(RegisterRoutesCommand $command)
  {
    $this->command = $command;
  }

  public function execute(): void
  {
    $routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
    $this->command->getContainerBuilder()->set('route_collection', $routeCollection);
  }
}