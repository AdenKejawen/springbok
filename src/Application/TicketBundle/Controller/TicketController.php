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
   * read a single ticket
   * 
   * @param string $ticketId
   */
  public function readAction($id)
  {
    $ticket = $this->getTicketService()->getById($id);
    return $this->render('TicketBundle:Ticket:read', array('ticket' => $ticket));
  }

  /**
   * see a queue of tickets the current user is assigned to
   * 
   * @return Response
   */
  public function queueAction()
  {
    $user = $this->getUser()->getUser();
    $queue = $this->getTicketService()->getbyAssignee($user);
    
    return $this->render('TicketBundle:Ticket:queue', array('queue' => $queue));
  }


  /**
   * get ticket service
   *
   * @return TicketService
   */
  protected function getTicketService()
  {
    return $this->container->getService('model.ticket');
  }

  /**
   * get milestoneservice
   *
   * @return MilestoneService
   */
  protected function getMilestoneService()
  {
    return $this->container->getService('model.milestone');
  }
}
