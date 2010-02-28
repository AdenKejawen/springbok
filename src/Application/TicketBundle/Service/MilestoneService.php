<?php
/**
 * MilestoneService.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Service
 */

namespace Application\TicketBundle\Service;

use Application\TicketBundle\Model\Milestone;
use Application\TicketBundle\Model\Milestone\Mapper;
use Application\TicketBundle\Model\Ticket\Mapper as TicketMapper;

/**
 * MilestoneService
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Service
 */
class MilestoneService
{
  /**
   * milestone mapper
   *
   * @var Mapper
   */
  protected $mapper;

  /**
   * ticket mapper
   * 
   * @var TicketMapper
   */
  protected $ticketMapper;

  /**
   * constructor
   *
   * @param Mapper $mapper
   */
  public function __construct(Mapper $mapper, TicketMapper $ticketMapper)
  {
    $this->mapper = $mapper;
    $this->ticketMapper = $ticketMapper;
  }

  /**
   * get all milestones
   * 
   * @return array[int]Milestone
   */
  public function getAll()
  {
    return $this->mapper->getAll();
  }

  /**
   * get milestone by id
   *
   * @param int $id
   * @param bool $getTickets
   * @return Milestone
   */
  public function getById($id, $getTickets = true)
  {
    $milestone = $this->mapper->getById($id);

    if ($getTickets) {
      $milestone->tickets = $this->ticketMapper->getByIds($milestone->tickets);
    }
    return $milestone;

  }

  /**
   * save a milestone
   *
   * @return bool
   */
  public function save(Milestone $milestone)
  {
    foreach($milestone->tickets as $ticket)
    {
      $this->ticketMapper->save($ticket);
    }
    
    return $this->mapper->save($milestone);
  }

  /**
   * get mapper
   *
   * 
   */
  protected function getMapper()
  {
  }
}
