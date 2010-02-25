<?php
/**
 * UserService.php
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Service
 */

namespace Application\UserBundle\Service;

use \Application\UserBundle\Model\User as User;

/**
 * UserService
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Service
 */
class UserService
{
  /**
   * Mapper
   *
   * @var User\Mapper
   */
  protected $mapper;

  /**
   * constructor
   *
   * @param Mapper $mapper
   */
  public function __construct(User\Mapper $mapper)
  {
    $this->mapper = $mapper;
  }

  /**
   * get a user by username
   *
   * @param string $username
   */
  public function getByUserName($username)
  {
    return $this->mapper->getByUserName($username);
  }

  /**
   * get a user by id
   *
   * @param int $id
   */
  public function getById($id)
  {
    return $this->mapper->getById($id);
  }

}