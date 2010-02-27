<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\SpringbokBundle\Model\Mapper;

use Application\SpringbokBundle\Model\MapperInterface;
use Application\SpringbokBundle\Model\Inflector;

/**
 * MongoMapper
 *
 * Base mongo enabled mapper
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */
abstract class MongoMapper implements MapperInterface
{
  protected $mongo;

  /**
   * Returns the MongoCollection used to manage objects
   *
   * @return \MongoCollection
   */
  abstract public function getCollection();

  /**
   * Constructor
   *
   * @param \MongoDB $mongo
   */
  public function __construct(\MongoDB $mongo)
  {
    $this->mongo = $mongo;
  }

  /**
   * get Object by id
   *
   * @param int $id
   * @return \Application\TicketBundle\Model\Ticket|bool
   */
  public function getById($id)
  {
    $data = $this->getCollection()->findOne(array('_id' => new \MongoId($id)));

    if (empty($data))
    {
      return false;
    }

    return static::fromArray($data);
  }


  /**
   * save an object
   *
   * @param object $object
   * @return bool
   */
  public function save($object)
  {
    $data = static::objectToArray($object);

    if (empty($data['id']))
    {
      $success = $success = $this->getCollection()->insert($data);

      $object->id = (string) $data['_id'];
      //set the id after insert
    }
    else
    {
      $success = $this->getCollection()->save($data);
    }

    return $success;
  }
  
  /**
   * create an array of tickets from a cursor
   *
   * @param MongoCursor $cursor
   * @return array[int]Ticket
   */
  static public function fromCursor(\MongoCursor $cursor)
  {
    $objects = array();
    foreach($cursor as $data)
    {
      $objects[] = static::fromArray($data);
    }
    return $objects;
  }

  /**
   * parse from domainobject to mongo array notation
   *
   * @param object $object
   * @return array
   */
  static public function objectToArray($object)
  {
    $data = array();

    foreach(get_object_vars($object) as $key => $val)
    {
      if ($key == 'id')
      {
        $key = '_id';
        $val = new \MongoID($val);
      }
      //turn id into MongoID
      $key = Inflector::toUnderscore($key);
      $data[$key] = $val;
      //FIXME we need filtering from camelCase to under_score
    }

    return $data;
  }

  /**
   * parse from array to DomainObject
   *
   * @param array $data
   * @return object
   */
  static public function arrayToObject(array $array, $className)
  {
    $object  = new $className();

    foreach($array as $key => $val)
    {
      if ($key == '_id')
      {
        $key = 'id';
        $val = (string) $val;
      }
      
      $key = Inflector::toCamelCase($key);

      $object->$key = $val;
    }
    return $object;
  }

  /**
   * Parses an array of arrays to an array of instances
   *
   * @param array
   * @return array
   */
  static public function collectionToObjects($collection)
  {
    foreach($collection as $i => $array)
    {
      $collection[$i] = static::fromArray($array);
    }

    return $collection;
  }

  /**
   * Parses an array of arrays to an array of instances
   *
   * @param array
   * @return array
   */
  static public function collectionToArrays($collection)
  {
    foreach($collection as $i => $object)
    {
      $collection[$i] = static::toArray($object);
    }

    return $collection;
  }
}
