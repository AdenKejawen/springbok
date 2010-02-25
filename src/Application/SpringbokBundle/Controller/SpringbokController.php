<?php

namespace Application\SpringbokBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

class SpringbokController extends Controller
{
  public function indexAction()
  {
    var_dump($this->container->getTicketService());
    return $this->render('SpringbokBundle:Springbok:index');
  }
}
