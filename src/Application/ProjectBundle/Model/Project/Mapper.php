<?php
/**
 * Mapper.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Model
 */

namespace Application\ProjectBundle\Model\Project;

use Application\SpringbokBundle\Model\Mapper\MongoMapper;
use Application\SpringbokBundle\Model\DomainObject;
use Application\ProjectBundle\Model\Project;

/**
 * Mapper
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Model
 */
class Mapper extends MongoMapper
{
  /**
   * 
   * @return \MongoCollection
   */
  public function getCollection()
  {
    return $this->mongo->projects;
  }

  /**
   * get all projects
   * 
   * @return array[int]Project
   */
  public function getAll()
  {
    return static::fromCursor(
      $this->getCollection()->find()
    );
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
   * to array from project
   *
   * @param DomainObject $object
   * @return array
   */
  public function toArray(DomainObject $object)
  {
    return self::objectToArray($ticket);
  }

  /**
   * from array to project
   * 
   * @param array $data
   * @return Project
   */
  public function fromArray(array $data)
  {
    return self::arrayToObject($array, 'Application\\ProjectBundle\\Model\\Project');
  }
}