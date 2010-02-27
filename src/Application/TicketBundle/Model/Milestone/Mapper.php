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
   * get all milestones
   *
   * @return array[int]Milestone
   */
  public function getAll()
  {
    return static::fromCursor(
      $this->getCollection()->find()
    );
  }

  /**
   * Converts an array to a Milestone object
   *
   * @return \Application\TicketBundle\Model\Milestone
   */
  static public function fromArray(array $array)
  {
    $milestone          = self::arrayToObject($array, 'Application\\TicketBundle\\Model\\Milestone');
    $milestone->tickets = TicketMapper::collectionToObjects($milestone->tickets);

    return $milestone;
  }

  /**
   * Converts a Milestone object into an array
   *
   * @return array
   */
  static public function toArray(Milestone $milestone)
  {
    $array            = self::objectToArray($milestone);
    $array['tickets'] = TicketMapper::collectionToArrays($array['tickets']);

    return $array;
  }
}
