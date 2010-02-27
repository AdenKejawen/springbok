<?php
/**
 * MapperInterface.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */

namespace Application\SpringbokBundle\Model;

/**
 * MapperInterface
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */
interface MapperInterface
{
  /**
   * translate domainobject to array
   * 
   * @param DomainObject $object
   * @return array
   */
  static public function objectToArray($object);

  /**
   * translate array into domainobject
   *
   * @param array $array
   * @param string $className classname of the DomainObject
   * @return DomainObject
   */
  static public function arrayToObject(array $array, $className);

  /**
   * save a domainobject
   *
   * @param DomainObject $object
   * @return bool
   */
  public function save($object);
}
