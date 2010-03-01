<?php

namespace Application\UserBundle\Controller;

use Application\SpringbokBundle\Controller;

class UserController extends Controller
{
  public function dashboardAction()
  {
    return $this->render('UserBundle:User:dashboard', array('user' => $this->getUser()->getUser()));
  }
}
