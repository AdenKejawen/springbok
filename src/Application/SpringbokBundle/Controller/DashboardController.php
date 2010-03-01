<?php
/**
 * DashboardController
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Controller
 */

namespace Application\SpringbokBundle\Controller;

use Application\SpringbokBundle\Controller;
use Symfony\Components\RequestHandler\Response;

/**
 * DashboardController
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Controller
 */
class DashboardController extends Controller
{
  /**
   * dashboard index
   *
   * @return Response
   */
  public function indexAction()
  {
    return $this->render('SpringbokBundle:Dashboard:index');
  }
}
