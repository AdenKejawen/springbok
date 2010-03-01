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
  /**
   * Mongo instance
   * 
   * @var MongoDB
   */
  protected $mongo;

  /**
   * Returns the MongoCollection used to manage objects
   *
   * This function should also set relevant constraints on the collection
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
   * get objects by a set of ids, useful for references
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
   * Get all objects from the current collection
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
   * save an object
   *
   * @param object $object
   * @return bool
   */
  public function save($object)
  {
    $data = static::toArray($object);

    if (empty($data['_id']))
    {
      unset($data['_id']); 
      //make sure _it's_id is not present, or the insert won't overwrite
      
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
        if (!empty($val)) 
        {
          $val = new \MongoID($val);
        }
        else
        {
          $val = null;
        }
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
      if ($key == 'id')
      {
        continue; //sanity check, we can not have saved id's
      }
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
