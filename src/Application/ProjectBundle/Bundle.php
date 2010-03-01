<?php
/**
 * Bundle.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Bundle
 */

namespace Application\ProjectBundle;

use Application\ProjectBundle\DependencyInjection\ProjectExtension;
use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Loader\Loader;

/**
 * Bundle
 *
 * The bundle kernel for the ProjectBundle
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Bundle
 */
class Bundle extends BaseBundle
{
  /**
   * build the DIC container for the bundle
   *
   * @param ContainerInterface $container
   */
  public function buildContainer(ContainerInterface $container)
  {
    Loader::registerExtension(new ProjectExtension());
  }
}
