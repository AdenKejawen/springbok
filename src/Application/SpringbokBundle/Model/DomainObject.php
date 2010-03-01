<?php
/**
 * DomainObject.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */

namespace Application\SpringbokBundle\Model;

/**
 * DomainObject
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */
class DomainObject
{
  /**
   * overloaded getter
   *
   * @param string $name
   */
  public function __get($name)
  {
    $funcName = 'get' . ucfirst($name);
    //check if getName() exists then use that, as a kind of poor man's property

    if (!method_exists($this, $funcName)) {
      throw new Excepton('Property ' . $name . ' not found in object of class ' . get_class($this));
    }

    return $this->$funcName();
  }

  /**
   * setter
   * 
   * @param string $name
   * @param mixed $value
   */
  public function __set($name, $value)
  {
    $funcName = 'set' . ucfirst($what);

    if (method_exists($this, $funcName))
    {
      $this->$funcName($value);
    }
    else
    {
      $this->$name = $value;
    }
  }
}
