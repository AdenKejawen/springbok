<?php

namespace Application\GuardBundle\Controller;

use Symfony\Framework\WebBundle\Controller;
use Application\UserBundle\Model\User;

class GuardController extends Controller
{
  public function loginAction()
  {
    return $this->render('GuardBundle:Guard:login');
  }

  public function signupAction()
  {
    if ($this->getRequest()->getMethod() == 'POST')
    {
      /**
       * Hopefuly a better method to access POST variables will be provided
       * by the framework at some point.
       *
       * Anyway, it's all going to be trashed when a proper forms implementation
       * is released.
       */
      $user = new User();
      $user->username = $this->getRequest()->getParameter('username');
      $user->password = $this->getRequest()->getParameter('password');

      $this->container->getService('model.user')->save($user);

      $this->getUser()->login($user);

      return $this->redirect($this->generateUrl('user_dashboard'));
    }

    return $this->render('GuardBundle:Guard:signup');
  }
}
