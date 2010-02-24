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
        //check if getWhat() exists then use that, as a kind of property
    }

    /**
     * setter
     * 
     * @param string $what
     * @param mixed $value
     */
    public function __set($what, $value)
    {
        //set stuff using setWhat(), see __get()
        //most props will be read-only though
    }
}