<?php
/**
 * ProjectExtension.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      DependencyInjction
 */

namespace Application\ProjectBundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Loader\LoaderExtension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\BuilderConfiguration;

/**
 * ProjectExtension
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      DependencyInjction
 */
class ProjectExtension extends LoaderExtension
{
  protected $resources = array(
    'project'    => 'project.xml'
  );

  /**
   * this should be automated by the bundle?
   * 
   * @return string
   */
  public function getAlias()
  {
    return 'project';
  }

  /**
   * load project config
   * 
   * @param mixed $config
   * @return BuilderConfiguration
   */
  public function projectLoad($config)
  {
    $configuration = new BuilderConfiguration();

    $loader = new XmlFileLoader(__DIR__ . '/../Resources/config/');
    $configuration->merge($loader->load($this->resources['project']));

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
