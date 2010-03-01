<?php
/**
 * Ticket.php
 * 
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Model
 */

namespace Application\TicketBundle\Model; 

use Application\SpringbokBundle\Model\DomainObject;

/**
 * Ticket
 * 
 * DomainObject for tickets
 * 
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Model
 */
class Ticket extends DomainObject
{
  /**
   * id
   *
   * @var id
   */
  public $id;

  /**
   * title
   *
   * @var string
   */
  public $title;

  /**
   * description
   *
   * @var string
   */
  public $description;

  /**
   * tags
   *
   * @var array
   */
  public $tags = array();

  /**
   * name of the reporter
   *
   * @var string
   */
  public $reporterName;

  /**
   * assignees
   * 
   * @var array[int]string
   */
  public $assignedTo = array();

  /**
   * array of comments
   * 
   * @var array[int]Comment
   */
  public $comments = array();

  /**
   * get reporter
   * 
   * @return User
   */
  public function getReporter()
  {
    //use service to find reporter using $this->reporterName;
  }
}
