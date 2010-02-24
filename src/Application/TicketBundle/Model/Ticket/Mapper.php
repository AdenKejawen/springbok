<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\TicketBundle\Model\Ticket;

use \Application\SpringbokBundle\Model;

/**
 * Mapper
 *
 * DataMapper for tickets
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Model
 */
class Mapper
{
    /**
     * get Ticket by id
     * 
     * @param int $id 
     * @return \Application\TicketBundle\Model\Ticket
     */
    public function getById($id) {}

    /**
     * get Tickets by tag(s)
     *
     * @param string|array $tag
     * @return array[int]\Application\TicketBundle\Model\Ticket
     */
    public function getByTag($tag) {}

    /**
     * get tickets by user
     *
     * @param User $user
     * @return array[int]\Application\TicketBundle\Model\Ticket
     */
    public function getByUser(User $user) {}

    /**
     * get tickets by milestone
     *
     * @param Milestone $milestone
     */
    public function getByMilestone(Milestone $milestone) {}

    /**
     * save a ticket
     * 
     * @param Ticket $ticket
     * @return bool
     */
    public function save(Ticket $ticket) {}

    /**
     * get mongo instance
     *
     * @return somethigmongo-y
     */
    protected function getMongo() {}
}