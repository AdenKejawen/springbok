<?php

namespace Application\GuardBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

class GuardController extends Controller
{
  public function loginAction()
  {
    return $this->render('GuardBundle:Guard:login');
  }

  public function secureAction()
  {
  }
}
