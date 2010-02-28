<?php

namespace Application\SpringbokBundle;

use Application\GuardBundle\SecureUser;
use Application\UserBundle\Service\UserService;
use Application\UserBundle\Model\User;

class SpringbokUser extends SecureUser
{
  protected $user, $userService;

  public function setUserService(UserService $service)
  {
    $this->userService = $service;
  }

  public function login(User $user)
  {
    $this->setAuthenticated(true);
    $this->setUser($user);
  }

  public function logout()
  {
    $this->setAuthenticated(false);
    $this->user = null;
  }

  public function setUser(User $user)
  {
    $this->user = $user;
    $this->setAttribute('username', $user->username);
  }

  public function getUser()
  {
    if (!$this->isAuthenticated())
    {
      throw new LogicException('The user is not authenticated');
    }

    if (null === $this->user)
    {
      $this->user = $this->userService->getByUsername($this->getAttribute('username'));
    }

    return $this->user;
  }
}
