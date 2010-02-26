<?php

namespace Application\SpringbokBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

class SpringbokController extends Controller
{
  public function indexAction()
  {
    $ticketService = $this->container->getService('ticket.mapper');
    
    $ticket = new \Application\TicketBundle\Model\Ticket();
    $ticket->reporterName = 'naneau';
    $ticket->title = 'springbok ftw';
    $ticket->description = 'Springbok Rules!';
//    $ticketService->save($ticket);
//    var_dump($ticket);

    $user = new \Application\UserBundle\Model\User();
    $user->username = 'naneau';
    $ticket = $ticketService->getByReporter($user);
    var_dump($ticket);

    return $this->render('SpringbokBundle:Springbok:index');
  }
}
