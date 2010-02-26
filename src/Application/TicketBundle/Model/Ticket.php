<?php
/**
 * Ticket.php
 * 
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Model
 */

namespace Application\TicketBundle\Model; 

/**
 * Ticket
 * 
 * DomainObject for tickets
 * 
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Model
 */
class Ticket
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
   * get reporter
   * 
   * @return User
   */
  public function getReporter()
  {
    //use service to find reporter using $this->reporterName;
  }
}
