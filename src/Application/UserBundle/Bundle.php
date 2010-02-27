<?php

namespace Application\UserBundle;

use Symfony\Foundation\Bundle\Bundle as BaseBundle;

use Application\UserBundle\DependencyInjection\UserExtension;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Loader\Loader;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;

class Bundle extends BaseBundle
{
  /**
   * build the DIC container for the bundle
   * 
   * @param ContainerInterface $container
   */
  public function buildContainer(ContainerInterface $container)
  {
    Loader::registerExtension(new UserExtension());
  }
}
