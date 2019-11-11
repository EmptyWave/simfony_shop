<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 23.09.2019
 * Time: 2:52
 */

namespace Framework\Command;


use Framework\CommandInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class ConfigCommandHandler implements CommandInterface
{
  /**
   * @var RegisterConfigsCommand
   */
  public $command;

  /**
   * ConfigCommandHandler constructor.
   * @param RegisterConfigsCommand $command
   */
  public function __construct(RegisterConfigsCommand $command)
  {
    $this->command = $command;
  }

  public function execute(): void
  {
    try {
      $fileLocator = new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config');
      $loader = new PhpFileLoader($this->command->getContainerBuilder(), $fileLocator);
      $loader->load('parameters.php');
    } catch (\Throwable $e) {
      die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
    }
  }
}