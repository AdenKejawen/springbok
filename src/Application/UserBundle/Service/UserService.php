<?php
/**
 * UserService.php
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Service
 */

namespace Application\UserBundle\Service;

use Application\UserBundle\Model\User\Mapper;
use Application\UserBundle\Model\User;

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
  public function __construct(Mapper $mapper)
  {
    $this->mapper = $mapper;
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

  /**
   * Saves the user
   *
   * @param \Application\UserBundle\Model\User
   * @return boolean
   */
  public function save(User $user)
  {
    return $this->mapper->save($user);
  }

  /**
   * Get a user by username
   *
   * @param string $username
   * @return Application\UserBundle\Model\User
   */
  public function getByUsername($username)
  {
    return $this->mapper->getByUsername($username);
  }
}
