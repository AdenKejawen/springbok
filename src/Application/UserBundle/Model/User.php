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
class User extends \Application\SpringbokBundle\Model\DomainObject
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
   * full name
   * 
   * @var string
   */
  public $fullName;

  /**
   * biography
   *
   * @var string
   */
  public $bio;
}