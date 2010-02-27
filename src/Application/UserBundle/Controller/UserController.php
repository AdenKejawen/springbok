<?php

namespace Application\UserBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

class UserController extends Controller
{
  public function indexAction()
  {
    $userService = $this->container->getService('user');

    $user = new \Application\UserBundle\Model\User();
    $user->username = 'ubermuda';
    $user->email = 'grosfrais@gmail.com';
    $user->roles = array('code monkey');

    $userService->save($user);

    var_dump($user);
    var_dump($userService->getByUsername('ubermuda'));

    return $this->createResponse('this is the user controller');
  }
}
