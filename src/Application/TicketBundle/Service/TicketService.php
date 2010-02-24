<?php
/**
 * TicketService.php
 *
 * @category		Springbok
 * @package			TicketBundle
 * @subpackage		Service
 */

namespace Application\TicketBundle\Service;

use Symfony\Framework\WebBundle\Controller;

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
	 * get tickets by milestone
	 *
	 * @param Milestone $milestone
	 * @return array[int]Ticket
	 */
	public function getTicketsByMilestone(Milestone $milestone) 
	{
	}
}
