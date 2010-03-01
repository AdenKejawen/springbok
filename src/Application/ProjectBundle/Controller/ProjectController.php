<?php
/**
 * ProjectController.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Controller
 */

namespace Application\ProjectBundle\Controller;

use Symfony\Framework\WebBundle\Controller;
use Symfony\Components\RequestHandler\Response;

/**
 * ProjectController
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Controller
 */
class ProjectController extends Controller
{
  /**
   * overview of projects
   *
   * @return Response
   */
  public function indexAction()
  {
    $projects = $this->getProjectService()->getAll();
    return $this->render('ProjectBundle:Project:index', array('projects' => $projects));
  }

  /**
   * get project service
   *
   * @return ProjectService
   */
  protected function getProjectService()
  {
    return $this->container->getService('model.project');
  }
}