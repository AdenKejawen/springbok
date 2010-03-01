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
   * salt for the password
   * 
   * @var string
   */
  public $salt;

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


  /**
   * check wether a password matches the hashed password
   *
   * @param string $password
   */
  public function passwordMatches($password)
  {
    return self::hash($password, $this->salt) == $this->password;
  }

  /**
   * set a new password and hash with a random salt
   * 
   * @param string $newPassword
   * @return void
   */
  public function setAndHashPassword($newPassword)
  {
    $this->salt = self::generateSalt();

    $this->password = self::hash($newPassword, $this->salt);
  }

  /**
   * generate a random salt
   *
   * @return void
   */
  protected static function generateSalt()
  {
    $salt = '';

    $alNum = 'abcdefghijklmnopqrstuvwxyz0123456789';
    for ($x = 0; $x < 20; $x++)
    {
      $salt .= $alNum[rand(0, 36)];
    }

    return $salt;
  }

  /**
   * hash a password with salt
   *
   * @param string $password
   * @param string $salt
   * @return string
   */
  protected static function hash($password, $salt)
  {
    return md5($password . $salt);
  }
}
