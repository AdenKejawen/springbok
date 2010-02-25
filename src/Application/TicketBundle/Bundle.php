<?php
/**
 * Bundle.php
 *
 * @category        Springbok
 * @package         TicketBundle
 */

namespace Application\TicketBundle;

use Application\Ticketbundle\DependencyInjection\TicketExtension;
use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Loader\Loader;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;

/**
 * main configurator class for bundle
 *
 * @category        Springbok
 * @package         TicketBundle
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
    Loader::registerExtension(new TicketExtension());
  }
}