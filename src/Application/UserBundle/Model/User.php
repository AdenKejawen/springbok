<?php
/**
 * User.php
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */

namespace Application\UserBundle\Model;

use Application\SpringbokBundle\Model\DomainObject;

/**
 * User
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */
class User extends DomainObject
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
  public $hashedPassword;

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
   * add a role to this user
   * 
   * @param string $role
   * @return void
   */
  public function addRole($role)
  {
    $this->removeRole($role);
    //make sure we don't get duplicates
    
    $this->roles[] = $role;
  }

  /**
   * remove a role from the suer
   *
   * @param string $role
   * @return void
   */
  public function removeRole($role)
  {
    foreach($this->roles as $key => $checkRole)
    {
      if ($checkRole == $role)
      {
        unset($this->roles[$key]);
      }
    }
  }

  /**
   * set a new password and hash with a random salt
   *
   * can be accessed as a setter property like $user->password = 'n3w_P455w0rd';
   *
   * @param string $newPassword
   * @return void
   */
  public function setPassword($newPassword)
  {
    $this->salt = self::generateSalt();

    $this->hashedPassword = self::hash($newPassword, $this->salt);
  }

  /**
   * You can't get the password
   *
   * @throw \LogicException
   */
  public function getPassword()
  {
    throw new LogicException('You can\'t retrieve a user\'s password, sorry');

  }

  /**
   * check wether a password matches the hashed password
   *
   * @param string $password
   */
  public function passwordMatches($password)
  {
    return self::hash($password, $this->salt) == $this->hashedPassword;

    $this->hashedPassword = self::hash($password, $this->salt);
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
