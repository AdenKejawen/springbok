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
   * ticket mapper
   *
   * @var Mapper
   */
  protected $mapper;

  /**
   * constructor
   *
   * @param Mapper $mapper
   */
  public function __construct(Mapper $mapper)
  {
    $this->mapper = $mapper;
  }

  protected $ticketMapper;
  public function setTicketMapper(TicketMapper $mapper)
  {
    $this->ticketMapper = $mapper;
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
   * @return Milestone
   */
  public function getById($id)
  {
    $milestone = $this->mapper->getById($id);
//var_dump($milestone);

    $milestone->tickets = $this->ticketMapper->getByIds($milestone->tickets);
    
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
