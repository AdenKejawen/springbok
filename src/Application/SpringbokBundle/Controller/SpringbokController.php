<?php
/**
 * SpringbokController.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Controller
 */
namespace Application\SpringbokBundle\Controller;

use Symfony\Framework\WebBundle\Controller;

/**
 * SpringbokController
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Controller
 */
class SpringbokController extends Controller
{
  /**
   * index, should probably forward to the dashboard for logged in users
   *
   * @return Response
   */
  public function indexAction()
  {
    return $this->render('SpringbokBundle:Springbok:index');
  }
}
