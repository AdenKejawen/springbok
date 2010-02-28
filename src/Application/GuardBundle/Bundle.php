<?php

namespace Application\GuardBundle;

use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\EventDispatcher\Event;

use Application\GuardBundle\Controller\GuardController;

class Bundle extends BaseBundle
{
  protected $container;

  /**
   * Binds $this->filterRequest() to the core.request event
   *
   * @param \Symfony\Components\DependencyInjection\ContainerInterface
   */
  public function boot(ContainerInterface $container)
  {
    $this->container = $container;

    $dispatcher = $container->getService('event_dispatcher');
    $dispatcher->connect('core.request', array($this, 'filterRequest'));
  }

  /**
   * Filters the request, checking the user authentication
   *
   * @parameter \Symfony\Components\EventDispatcher\Event $event
   * @return \Symfony\Components\EventDispatcher\Event
   */
  public function filterRequest(Event $event)
  {
    $user = $this->container->getUserService();
    $request = $event->getParameter('request');

    $safeControllers = array('Guard', 'Exception');
    $isAuthenticated = $user->isAuthenticated();

    // if the use is not authenticated
    // and we are not on a safe route
    if (!($user->isAuthenticated() || in_array($request->getPathParameter('_controller'), $safeControllers)))
    {
      $controller = new GuardController($this->container);
      $response = $controller->loginAction();
      $event->setReturnValue($response);

      return true;
    }

    return false;
  }
}
