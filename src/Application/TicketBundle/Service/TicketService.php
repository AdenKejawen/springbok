<?php
/**
 * TicketService.php
 *
 * @category            Springbok
 * @package		TicketBundle
 * @subpackage		Service
 */

namespace Application\TicketBundle\Service;

use Application\TicketBundle\Model;

/**
 * TicketService
 *
 * a service to work with tickets, at first this may seem to just add abstraction
 * but this service as a whole is a reusable component for your controllers, apis,
 * command line interfaces, etc. It does not have to care about the persistance
 * layer, which is a job for the datamappers.
 *
 * @category		Springbok
 * @package		TicketBundle
 * @subpackage		Service
 */
class TicketService extends Service
{
    /**
     * get Ticket by id
     *
     * @param int $id
     * @return \Application\TicketBundle\Model\Ticket
     */
    public function getById($id)
    {
        return $this->getMapper()->getById($id);
    }

    /**
     * get Tickets by tag(s)
     *
     * @param string|array $tag
     * @return array[int]\Application\TicketBundle\Model\Ticket
     */
    public function getByTag($tag)
    {
        return $this->getMapper()->getByTag($tag);
    }

    /**
     * get tickets by user
     *
     * @param User $user
     * @return array[int]\Application\TicketBundle\Model\Ticket
     */
    public function getByUser(User $user)
    {
        return $this->getMapper()->getByUser($user);
    }

    /**
     * get tickets by milestone
     *
     * @param Milestone $milestone
     */
    public function getByMilestone(Milestone $milestone)
    {
        return $this->getMapper()->getByMilestone($milestone);
    }

    /**
     * save a ticket
     *
     * @param Ticket $ticket
     * @return bool
     */
    public function save(Ticket $ticket)
    {
        return $this->getMapper()->save($ticket);
    }

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
