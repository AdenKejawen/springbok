<?php
/**
 * ProjectController.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Controller
 */

namespace Application\ProjectBundle\Controller;

use Application\SpringbokBundle\Controller;
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
//    $project = new \Application\ProjectBundle\Model\Project();
//    $project->name = 'Naneau\'s Project';
//    $project->description = 'It is a very cool project :x';
//    $this->getProjectService()->save($project);
    
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
