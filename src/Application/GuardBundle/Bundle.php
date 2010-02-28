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

    $safeActions = array(
      'login' => array(
        '_bundle' => 'GuardBundle',
        '_controller' => 'Guard',
        '_action' => 'login',
      ),
      'signup' => array(
        '_bundle' => 'GuardBundle',
        '_controller' => 'Guard',
        '_action' => 'signup',
      )
    );

    $isAuthenticated = $user->isAuthenticated();

    $isSafe = false;

    foreach($safeActions as $params)
    {
      $isSafeBundle     = $request->getPathParameter('_bundle') === $params['_bundle'];
      $isSafeController = $request->getPathParameter('_controller') === $params['_controller'];
      $isSafeAction     = $request->getPathParameter('_action') === $params['_action'];

      $isSafe = $isSafe || ($isSafeBundle && $isSafeController && $isSafeAction);
    }


    // if the use is not authenticated
    // and we are not already on the login page
    if (!($user->isAuthenticated() || $isSafe))
    {
      $controller = new GuardController($this->container);
      $response = $controller->loginAction();
      $event->setReturnValue($response);
      $event->setProcessed(true);
    }

    return $event;
  }
}
