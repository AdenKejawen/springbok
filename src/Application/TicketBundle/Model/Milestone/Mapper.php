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
  public function getCollection()
  {
    return $this->mongo->milestones;
  }

  static public function fromArray(array $array)
  {
    $milestone          = self::arrayToObject($array, '\\Application\\TicketBundle\\Model\\Milestone');
    $milestone->tickets = TicketMapper::collectionToObjects($milestone->tickets);
  }
}
