<?php
/**
 * Inflector.php
 *
 * @category        Springbok
 * @package
 * @subpackage
 */

namespace Application\SpringbokBundle\Model;

/**
 * Inflector
 *
 * @category        Springbok
 * @package
 * @subpackage
 */
class Inflector
{
  /**
   * inflect to under_score
   * 
   * @param string $string
   * @return string
   */
  public static function toUnderscore($string)
  {
    return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $string));
  }

  /**
   * inflect to camelCase
   *
   * @param string $string
   * @return string
   */
  public static function toCamelCase($string)
  {
    $replacer = function($matches)
    {
      return $matches[1].strtoupper($matches[2]);
    };
    return preg_replace_callback('/([a-z])_([a-z])/', $replacer, strtolower($string));
  }
}
