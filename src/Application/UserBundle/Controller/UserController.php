<?php

namespace Application\UserBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

class UserController extends Controller
{
  public function dashboardAction()
  {
    return $this->render('UserBundle:User:dashboard', array('user' => $this->getUser()->getUser()));
  }
}
