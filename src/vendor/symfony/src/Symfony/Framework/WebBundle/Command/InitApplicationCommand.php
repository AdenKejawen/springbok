<?php

namespace Symfony\Framework\WebBundle\Command;

use Symfony\Components\Console\Command\Command as BaseCommand;
use Symfony\Components\Console\Input\InputArgument;
use Symfony\Components\Console\Input\InputOption;
use Symfony\Components\Console\Input\InputInterface;
use Symfony\Components\Console\Output\OutputInterface;
use Symfony\Components\Console\Output\Output;
use Symfony\Framework\WebBundle\Util\Filesystem;
use Symfony\Framework\WebBundle\Util\Mustache;

/*
 * This file is part of the symfony framework.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Initializes a new bundle.
 *
 * @package    symfony
 * @subpackage console
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 */
class InitApplicationCommand extends BaseCommand
{
  /**
   * @see Command
   */
  protected function configure()
  {
    $this
      ->setDefinition(array(
        new InputArgument('name', InputArgument::REQUIRED, 'The name of the application to create'),
      ))
      ->setName('init:application')
    ;
  }

  /**
   * @see Command
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $name = $input->getArgument('name');

    $output->writeln(sprintf('Initializing application "<info>%s</info>"', $name));

    if (file_exists($targetDir = getcwd().'/'.$name))
    {
      throw new \RuntimeException(sprintf('Application "%s" already exists.', $name));
    }
    
    $kernelClassName = $name.'Kernel';

    $filesystem = new Filesystem();
    $filesystem->mirror(__DIR__.'/../Resources/skeleton/application/yaml/', $targetDir);

    Mustache::renderDir($targetDir, array(
      'class' => $name,
    ));

    $filesystem->rename($targetDir.'/Kernel.php', $targetDir.'/'.$kernelClassName.'.php');
    $filesystem->chmod($targetDir.'/console', 0755);
  }
}
