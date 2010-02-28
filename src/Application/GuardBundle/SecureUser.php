<?php

namespace Application\GuardBundle;

use Symfony\Framework\WebBundle\User;

class SecureUser extends User
{
  public function isAuthenticated()
  {
    return $this->getAttribute('is_authenticated', false);
  }

  public function setAuthenticated($bool)
  {
    $this->setAttribute('is_authenticated', $bool);
  }
}
