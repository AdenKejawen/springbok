<?php
/**
 * TicketExtension.php
 *
 * @category        Springbok
 * @package         
 * @subpackage      
 */

namespace Application\Ticketbundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Loader\LoaderExtension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\BuilderConfiguration;

/**
 * TicketExtension
 *
 * @category        Springbok
 * @package         
 * @subpackage      
 */
class TicketExtension extends LoaderExtension
{
  protected $resources = array(
    'ticket'    => 'ticket.xml',
    'milestone' => 'milestone.xml',
  );

  public function getAlias()
  {
    return 'ticket';
  }

  public function ticketLoad($config)
  {
    $configuration = new BuilderConfiguration();

    $loader = new XmlFileLoader(__DIR__.'/../Resources/config/');
    $configuration->merge($loader->load($this->resources['ticket']));

    return $configuration;
  }

  public function milestoneLoad($config)
  {
    $configuration = new BuilderConfiguration();

    $loader = new XmlFileLoader(__DIR__.'/../Resources/config/');
    $configuration->merge($loader->load($this->resources['milestone']));

    return $configuration;
  }

  /**
   * Returns the base path for the XSD files.
   *
   * @return string The XSD base path
   */
  public function getXsdValidationBasePath()
  {
    return __DIR__.'/../Resources/config/';
  }

  /**
   * Returns the namespace to be used for this extension (XML namespace).
   *
   * @return string The XML namespace
   */
  public function getNamespace()
  {
    return false;
  }
}
