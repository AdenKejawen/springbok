<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

namespace Application\TicketBundle\Model\Ticket;

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
   * @return string
   */
  public function getClassName()
  {
    return 'Application\\TicketBundle\\Model\\Ticket';
  }

  /**
   * get Tickets by tag(s)
   *
   * @param string|array $tag
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByTag($tag)
  {
    return $this->fromCursor(
      $this->getCollection()->find(array('tags' => $tag))
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
    return $this->fromCursor(
      $this->collection->find(array('reporterName' => $user->username))
    );
  }
}
