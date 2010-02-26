<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

namespace Application\TicketBundle\Model\Ticket;

use \Application\TicketBundle\Model as Model;
use \Application\UserBundle\Model\User as User;

/**
 * Mapper
 *
 * DataMapper for tickets
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Model
 */
class Mapper
{
  /**
   * mongo collection to the tickets
   *
   * @var \MongoCollection
   */
  protected $collection;

  /**
   * constructor
   *
   * @param MongoDB $mongo
   */
  public function __construct(\MongoDB $mongo)
  {
    $this->mongo = $mongo;

    $this->collection = $mongo->tickets;
    //we need constraints, but this will do for now
    //FIXME add constraints
  }

  /**
   * get Ticket by id
   *
   * @param int $id
   * @return \Application\TicketBundle\Model\Ticket
   */
  public function getById($id)
  {
    return $this->collection->findOne(array('_id' => new MongoId($id)), true);
  }

  /**
   * get Tickets by tag(s)
   *
   * @param string|array $tag
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByTag($tag)
  {
  }

  /**
   * get tickets by user
   *
   * @param User $user
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByUser(User\User $user)
  {
  }

  /**
   * save a ticket
   *
   * @param Ticket $ticket
   * @return bool
   */
  public function save(Model\Ticket $ticket)
  {
    $data = $this->toArray($ticket);
    
    if (empty($data['id'])) {
      $success = $success = $this->collection->insert($data);
      
      $ticket->id = (string) $data['_id'];
      //set the id after insert
    } else {
      $success = $this->collection->save($data);
    }
    
    return $success;
  }

  /**
   * parse from domainobject to mongo array notation
   *
   * @param Model\Ticket $ticket
   * @return array
   */
  protected function toArray(Model\Ticket $ticket)
  {
    $data = array();

    foreach(get_object_vars($ticket) as $key => $val)
    {
      $data[$key] = $val;
      //FIXME we need filtering from camelCase to under_score
    }

    return $data;
  }

  /**
   * parse from array to DomainObject
   *
   * @param array $data
   * @return Model\Ticket
   */
  protected function fromArray(array $data)
  {

  }
}
