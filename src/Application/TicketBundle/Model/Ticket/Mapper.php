<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

namespace Application\TicketBundle\Model\Ticket;

use Application\TicketBundle\Model\Ticket;
use Application\UserBundle\Model\User;
use Application\SpringbokBundle\Model\Mapper\MongoMapper;

/**
 * Mapper
 *
 * DataMapper for tickets
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
    return $this->mongo->tickets;
  }

  /**
   * get Tickets by tag(s)
   *
   * @param string|array $tag
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByTag($tag)
  {
    return static::fromCursor(
      $this->getCollection()->find(array('tags' => $tag))
    );

  }

  /**
   * get by assignee
   *
   * @param User $user
   * @return array[int]Ticket
   */
  public function getByAssignee(User $user)
  {
    return static::fromCursor(
      $this->getCollection()->find(array('assigned_to' => $user->username))
    );
  }

  /**
   * get tickets by a set of ids, useful for references
   * 
   * @param array $ids array of ids in string form ('hash1', 'hash2');
   * @return array[int]Ticket
   */
  public function getByIds($ids)
  {
    foreach($ids as $key => $val)
    {
      $ids[$key] = new \MongoId($val);
    }
    
    return static::fromCursor(
      $this->getCollection()->find(array('_id' => array('$in' => $ids)))
    );
  }

  /**
   * get tickets by user
   *
   * @param User $user
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByReporter(User $user)
  {
    return static::fromCursor(
      $this->collection->find(array('reporter_name' => $user->username))
    );
  }

  /**
   * @return \Application\TicketBundle\Model\Ticket
   */
  static public function fromArray(array $array)
  {
    return self::arrayToObject($array, 'Application\\TicketBundle\\Model\\Ticket');
  }

  /**
   * translate Ticket into array representaiton
   *
   * @return array
   */
  static public function toArray(Ticket $ticket)
  {
    return self::objectToArray($ticket);
  }
}
