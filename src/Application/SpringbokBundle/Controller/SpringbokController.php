<?php

namespace Application\SpringbokBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

class SpringbokController extends Controller
{
  public function indexAction()
  {
#    $ticketService = $this->container->getService('ticket.mapper');
#    
#    $ticket = new \Application\TicketBundle\Model\Ticket();
#    $ticket->reporterName = 'naneau';
#    $ticket->title = 'springbok ftw';
#    
#    $ticket->tags = array('mongo', 'awesome', 'mirmo', 'naneau');
#
#    $ticket->description = 'Springbok Rules!';
#    $ticketService->save($ticket);
#    var_dump($ticketService->getById($ticket->id));
#    
#    echo 'awesome tickets';
#    var_dump($ticketService->getByTag('awesome'));
#
#    echo 'Naneau\'s tickets';
#    $user = new \Application\UserBundle\Model\User();
#    $user->username = 'naneau';
#    $tickets = $ticketService->getByReporter($user);
#    var_dump($tickets);

    return $this->render('SpringbokBundle:Springbok:index');
  }
}
