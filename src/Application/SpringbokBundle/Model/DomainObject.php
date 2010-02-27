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
     * @param string $what
     */
    public function __get($what)
    {
      $funcName = 'get' . ucfirst($what);
      //check if getWhat() exists then use that, as a kind of poor man's property

      if (!method_exists($this, $funcName)) {
        throw new Excepton('Property ' . $what . ' not found in object of class ' . get_class($this));
      }

      return $this->$funcName();
    }

    /**
     * setter
     * 
     * @param string $what
     * @param mixed $value
     */
    public function __set($what, $value)
    {
      $funcName = 'set' . ucfirst($what);

      if (!method_exists($this, $funcName)) {
        //do we still set it? :x
      }

      $this->$funcName($value);
    }
}