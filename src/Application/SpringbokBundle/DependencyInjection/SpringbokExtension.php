<?php
/**
 * SpringbokExtension.php
 *
 * @category        Springbok
 * @package         
 * @subpackage      
 */

namespace Application\SpringbokBundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Loader\LoaderExtension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\BuilderConfiguration;

/**
 * SpringbokExtension
 *
 * @category        Springbok
 * @package         
 * @subpackage      
 */
class SpringbokExtension extends LoaderExtension
{
  protected $resources = array(
    'springbok' => 'springbok.xml',
  );

  public function getAlias()
  {
    return 'springbok';
  }

  public function springbokLoad($config)
  {
    $configuration = new BuilderConfiguration();

    $loader = new XmlFileLoader(__DIR__.'/../Resources/config/');
    $configuration->merge($loader->load($this->resources['springbok']));

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
