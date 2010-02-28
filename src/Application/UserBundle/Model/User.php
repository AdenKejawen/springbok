<?php
/**
 * User.php
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */

namespace Application\UserBundle\Model;

/**
 * User
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */
class User
{
  /**
   * Id
   *
   * @var int
   */
  public $id;

  /**
   * username
   * 
   * @var string
   */
  public $username;

  /**
   * password
   *
   * @var string
   */
  public $password;

  /**
   * email
   *
   * @var string
   */
  public $email;

  /**
   * roles
   *
   * @var array
   */
  public $roles = array();

  /**
   * Tells whether a user as a given role
   *
   * @param string $role
   * @return boolean
   */
  public function hasRole($role)
  {
    return in_array($role, $this->roles);
  }
}
