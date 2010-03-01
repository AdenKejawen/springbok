<?php
/*
 * Mapper.php
 * 
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Model
 */

namespace Application\TicketBundle\Model\Milestone;

use Application\SpringbokBundle\Model\Mapper\MongoMapper;
use Application\TicketBundle\Model\Ticket\Mapper as TicketMapper;
use Application\TicketBundle\Model\Milestone;

/**
 * Mapper
 *
 * DataMapper for milestones
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Model
 */
class Mapper extends MongoMapper
{
  /**
   * @return \MongoCollection
   */
  public function getCollection()
  {
    return $this->mongo->milestones;
  }

  /**
   * Converts an array to a Milestone object
   *
   * @return \Application\TicketBundle\Model\Milestone
   */
  static public function fromArray(array $array)
  {
    $milestone = self::arrayToObject($array, 'Application\\TicketBundle\\Model\\Milestone');

    $ticketIds = array();
    foreach($milestone->tickets as $ticketRef)
    {
      if (!empty($ticketRef['$id'])) 
      {
        //it should not be empty, but let's check for sanity
        $milestone->tickets[] = $ticketRef['$id'];
      }
    }
    
    return $milestone;
  }

  /**
   * Converts a Milestone object into an array
   *
   * @return array
   */
  static public function toArray(Milestone $milestone)
  {
    $array = self::objectToArray($milestone);
    
    $array['tickets'] = array();
    foreach($milestone->tickets as $ticket) {
      $array['tickets'][] = \MongoDBRef::create('tickets', $ticket->id);
    }
    
    return $array;
  }
}
