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
    $string = str_replace(" ", "", ucwords(strtr($string, "_-", "  ")));
    $string[0] = strtolower($string[0]);
    return $string;
  }
  
}