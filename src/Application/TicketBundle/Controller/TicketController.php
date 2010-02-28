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
  }

  /**
   * see a queue of tickets the current user is assigned to
   * 
   * @return Response
   */
  public function queueAction()
  {
    $userName = 'naneau';
    //needs to come from user service (currently logged in user)

    $user = $this->container->getService('user')->getByUsername($userName);
    $queue = $this->getTicketService()->getbyAssignee($user);
    
    return $this->createResponse('lalal');
  }

  /**
   * get ticket service
   *
   * @return TicketService
   */
  protected function getTicketService()
  {
    return $this->container->getService('ticket');
  }

  /**
   * get milestoneservice
   *
   * @return MilestoneService
   */
  protected function getMilestoneService()
  {
    return $this->container->getService('milestone');
  }
//
//        $milestone = new \Application\TicketBundle\Model\Milestone();
//    $milestone->name = 'new milestone';
//    $milestone->description = 'lalalalaal';
//    //new milestone
//
//    $ticket = new \Application\TicketBundle\Model\Ticket;
//    $ticket->title = 'naneauticket 2';
//    $ticket->reporterName = 'ubermuda';
//    $ticket->description = 'this is assigned to naneau';
//    $ticket->tags = array('naneau','awesome');
//    //new ticket
//
//    $milestone = $this->getMilestoneService()->getById('4b8a74898ead0e0787140000');
//    echo 'tickets before add ';
//    var_dump($milestone->tickets);
//
//    $this->getTicketService()->save($ticket);
//    echo 'ticket saved, id : ' . $ticket->id . '<br />';
//
//    $milestone->tickets[] = $ticket;
//    echo 'tickets milestone before save';
//    var_dump($milestone->tickets);
//
//    $this->getMilestoneService()->save($milestone);
//    echo 'milestone saved, id: ' . $milestone->id . '<br />';
//
//    $milestone = $this->getMilestoneService()->getById('4b8a74898ead0e0787140000');
//
//    echo 'tickets in milestone';
//    var_dump($milestone->tickets);
}