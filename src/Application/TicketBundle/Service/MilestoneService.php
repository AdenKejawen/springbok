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
