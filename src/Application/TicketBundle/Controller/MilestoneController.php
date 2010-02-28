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
    $milestones = $this->getService()->getAll();
    //all milestones
    return $this->render('TicketBundle:Milestone:index', array('milestones' => $milestones));
  }

  /**
   * display a milestone
   *
   * @return Response
   */
  public function milestoneAction($milestone)
  {
    $milestone = $this->getService()->getById($milestone);
    return $this->render('TicketBundle:Milestone:milestone', array(
      'milestone' => $milestone
     ));
  }
}
