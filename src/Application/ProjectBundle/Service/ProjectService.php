<?php
/**
 * ProjectService.php
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Service
 */

namespace Application\ProjectBundle\Service;

use Application\ProjectBundle\Model\Project;
use Application\ProjectBundle\Model\Project\Mapper as ProjectMapper;
/**
 * ProjectService
 *
 * @category        Springbok
 * @package         ProjectBundle
 * @subpackage      Service
 */
class ProjectService
{

  /**
   * project mapper
   *
   * @var ProjectMapper
   */
  protected $mapper;

  /**
   * constructor
   *
   * @param ProjectMapper $mapper
   */
  public function __construct(ProjectMapper $mapper)
  {
    $this->mapper = $mapper;
  }

  /**
   * get all
   *
   * @return array[int]Project
   */
  public function getAll()
  {
    return $this->mapper->getAll();
  }

  /**
   * get a project by id
   * 
   * @param int $id
   * @return Project
   */
  public function getById($id)
  {
    return $this->mapper->getById($id);
  }

  /**
   * save a project
   * 
   * @param Project $project
   * @return bool
   */
  public function save(Project $project)
  {
    return $this->mapper->save($project);
  }
}