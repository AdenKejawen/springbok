<?php
/**
 * MilestoneController.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */

namespace Application\Ticketbundle\Controller;

use Symfony\Framework\WebBundle\Controller;
use Application\TicketBundle\Service\MilestoneService;

/**
 * MilestoneController
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */
class MilestoneController extends Controller
{
  /**
   * get service
   *
   * @return MilestoneService
   */
  protected function getService()
  {
    return $this->container->getService('milestone');
  }

  /**
   * index of milestones
   *
   * @return Response
   */
  public function indexAction()
  {
    $milestones = $this->getService()->getAll();
    //all milestones
    return $this->render('TicketBundle:Milestone:index', array('milestones' => $milestones));
  }

  /**
   * display a milestone
   *
   * @return Response
   */
  public function milestoneAction()
  {
    $id = $this->getRequest()->getParameter('milestone');

    $milestone = $this->getService()->getById($id);
    return $this->render('TicketBundle:Milestone:milestone', array(
      'milestone' => $milestone
     ));
  }
}