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
    var_dump($ticket);

    
    $ticket = $ticketService->getById('4b87dbbb8ead0e932c010000');
    var_dump($ticket);

    return $this->render('SpringbokBundle:Springbok:index');
  }
}
