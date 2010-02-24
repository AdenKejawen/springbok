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
 * A service to work with tickets, at first this may seem to just add abstraction
 * but this service as a whole is a reusable component for your controllers, apis,
 * command line interfaces, etc. It does not have to care about the persistance
 * layer, which is a job for the datamappers. For instance, if you want to add
 * caching to the model layer, you can do it here.
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
     * @return Ticket
     */
    public function getById($id)
    {
        return $this->getMapper()->getById($id);
    }

    /**
     * get Tickets by tag(s)
     *
     * @param string|array $tag
     * @return array[int]Ticket
     */
    public function getByTag($tag)
    {
        return $this->getMapper()->getByTag($tag);
    }

    /**
     * get tickets by user
     *
     * @param User $user
     * @return array[int]Ticket
     */
    public function getByUser(User $user)
    {
        return $this->getMapper()->getByUser($user);
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
