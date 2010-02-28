<?php

namespace Application\SpringbokBundle;

use Application\SpringbokBundle\DependencyInjection\SpringbokExtension;
use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Loader\Loader;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;

class Bundle extends BaseBundle
{
  public function buildContainer(ContainerInterface $container)
  {
    Loader::registerExtension(new SpringbokExtension());
  }
}
