<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

namespace Application\TicketBundle\Model\Ticket;

use \Application\TicketBundle\Model as Model;
use \Application\UserBundle\Model as User;

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
   * @return \Application\TicketBundle\Model\Ticket|bool
   */
  public function getById($id)
  {
    $data = $this->collection->findOne(array('_id' => new \MongoId($id)));

    if (empty($data))
    {
      return false;
    }

    return $this->fromArray($data);
  }

  /**
   * get Tickets by tag(s)
   *
   * @param string|array $tag
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByTag($tag)
  {
    return $this->toArrayFromCursor(
      $this->collection->find(array('tags' => $tag))
    );
  }

  /**
   * get tickets by user
   *
   * @param User $user
   * @return array[int]\Application\TicketBundle\Model\Ticket
   */
  public function getByReporter(User\User $user)
  {
    return $this->toArrayFromCursor(
      $this->collection->find(array('reporterName' => $user->username))
    );
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

    if (empty($data['id']))
    {
      $success = $success = $this->collection->insert($data);

      $ticket->id = (string) $data['_id'];
      //set the id after insert
    }
    else
    {
      $success = $this->collection->save($data);
    }

    return $success;
  }
  
  /**
   * create an array of tickets from a cursor
   *
   * @param MongoCursor $cursor
   * @return array[int]Ticket
   */
  protected function toArrayFromCursor(\MongoCursor $cursor)
  {
    $tickets = array();
    foreach($cursor as $data)
    {
      $tickets[] = $this->fromArray($data);
    }
    return $tickets;
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
      if ($key == 'id')
      {
        $key = '_id';
        $val = new \MongoID($val);
      }
      //turn id into MongoID

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
    $instance = new Model\Ticket();
    foreach($data as $key => $val)
    {
      if ($key == '_id')
      {
        $key = 'id';
        $val = (string) $val;
      }

      $instance->$key = $val;
    }
    return $instance;
  }
}
