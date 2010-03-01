<?php
/**
 * MilestoneController.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */

namespace Application\Ticketbundle\Controller;

use Applicationb\SpringbokBundle\Controller;
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
  protected function getMilestoneService()
  {
    return $this->container->getService('model.milestone');
  }

  /**
   * index of milestones
   *
   * @return Response
   */
  public function indexAction()
  {
    //var_dump($this->getUser());
    $milestones = $this->getMilestoneService()->getAll();
    //all milestones
    return $this->render('TicketBundle:Milestone:index', array('milestones' => $milestones));
  }

  /**
   * display a milestone
   *
   * @return Response
   */
  public function readAction($id)
  {
    $milestone = $this->getMilestoneService()->getById($id);
    return $this->render('TicketBundle:Milestone:read', array(
      'milestone' => $milestone
     ));
  }
}
