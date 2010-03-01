<?php
/**
 * Project.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Model
 */

namespace Application\ProjectBundle\Model;

use Application\SpringbokBundle\Model\DomainObject;

/**
 * Project
 *
 * DomainObject for objects
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Model
 */
class Project extends DomainObject
{
  /**
   * identifier
   *
   * @var string
   */
  public $id;

  /**
   * name
   *
   * @var string
   */
  public $name;

  /**
   * tags
   * 
   * @var array[int]string
   */
  public $tags = array();

  /**
   * milestones
   * 
   * @var array[int]Milestone
   */
  public $milestones = array();
}