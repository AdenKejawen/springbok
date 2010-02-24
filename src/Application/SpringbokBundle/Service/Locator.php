<?php
/**
 * Locator.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Service
 */

namespace Application\SpringbokBundle\Service;

/**
 * Locator
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Service
 */
class Locator
{
    /**
     * this is a simple interface
     * 
     * @return Service
     */
    public static function get($serviceName)
    {

    }

    /**
     * This is more specific but less abstract
     *
     * @return Service
     */
    public static function getTicketService()
    {
        
    }
}