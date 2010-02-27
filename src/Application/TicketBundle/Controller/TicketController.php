<?php
/**
 * TicketController.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */

namespace Application\Ticketbundle\Controller;

use Symfony\Framework\WebBundle\Controller;

/**
 * TicketController
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */
class TicketController extends Controller
{
  /**
   * index of tickets... not so useful without a milestone?
   *
   * @return Response
   */
  public function indexAction()
  {
    $ticketService = $this->container->getService('ticket.mapper');

    $ticket               = new \Application\TicketBundle\Model\Ticket();
    $ticket->reporterName = 'naneau';
    $ticket->title        = 'springbok ftw';
    $ticket->tags         = array('mongo', 'awesome', 'mirmo', 'naneau');
    $ticket->description  = 'Springbok Rules!';

    $ticketService->save($ticket);

    $milestoneService = $this->container->getService('milestone.mapper');

    $milestone = new \Application\TicketBundle\Model\Milestone();
    $milestone->name = 'awesome milestone';
    $milestone->description = 'this is an awesome milestone, as the name says it all';
    $milestone->tickets[] = $ticket;

    $milestoneService->save($milestone);

    var_dump(\Application\TicketBundle\Model\Milestone\Mapper::toArray($milestone));

    var_dump($milestone);
  }
}