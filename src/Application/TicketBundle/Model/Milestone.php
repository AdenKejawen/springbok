<?php
/**
 * Milestone.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */

namespace Application\TicketBundle\Model;

/**
 * Milestone
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Model
 */
class Milestone
{
  /**
   * name for the milestone
   *
   * @var string
   */
  public $name;

  /**
   * description
   * 
   * @var string
   */
  public $description;

  /**
   * tickets in this milestone
   *
   * @var array[int]Ticket
   */
  public $tickets = array();
}
