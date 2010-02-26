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
    $ticketService->save($ticket);
//    $ticketService->getById(1);

    return $this->render('SpringbokBundle:Springbok:index');
  }
}
