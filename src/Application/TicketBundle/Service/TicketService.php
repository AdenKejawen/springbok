<?php
/**
 * TicketService.php
 *
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Service
 */

namespace Application\TicketBundle\Service;

use Application\TicketBundle\Model;

/**
 * TicketService
 *
 * a service to work with tickets
 *
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Service
 */
class TicketService extends Service
{
    /**
     * get a ticket by it's id
     *
     * @param int $id 
     * @return Model\Ticket $ticket
     */
    public function getById($id)
    {}

    /**
     * get tickets by milestone
     *
     * @param Model\Milestone Milestone $milestone
     * @return array[int]Ticket
     */
    public function getByMilestone(Milestone $milestone)
    {}

    /**
     * get mapper
     *
     * this has to be DI-i-fied
     *
     * @return Model\Ticket\Mapper
     */
    protected function getMapper()
    {}
}
