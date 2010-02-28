<?php
/**
 * Mapper.php
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */

namespace Application\UserBundle\Model\User;

use Application\SpringbokBundle\Model\Mapper\MongoMapper;
use Application\UserBundle\User;

/**
 * Mapper
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */
class Mapper extends MongoMapper
{
  /**
   * @return \MongoCollection
   */
  public function getCollection()
  {
    return $this->mongo->users;
  }

  /**
   * @return \Application\UserBundle\Model\User
   */
  static public function fromArray(array $array)
  {
    return self::arrayToObject($array, 'Application\\UserBundle\\Model\\User');
  }

  /**
   * @return array
   */
  static public function toArray(User $user)
  {
    return self::objectToArray($user);
  }

  /**
   * get a user by username
   *
   * @param string $username
   */
  public function getByUsername($username)
  {
    return is_array($user = $this->getCollection()->findOne(array('username' => $username))) ? static::fromArray($user) : null;
  }
}
