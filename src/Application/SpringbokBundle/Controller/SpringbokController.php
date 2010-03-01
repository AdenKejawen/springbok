<?php
/**
 * SpringbokController.php
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      Controller
 */
namespace Application\SpringbokBundle\Controller;

use Application\SpringbokBundle\Controller;

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
    if ($this->getUser()->isAuthenticated())
    {
      //we are authenticated so redirect to dashboard
      return $this->redirect($this->generateUrl('dashboard'));
    }
    
    return $this->render('SpringbokBundle:Springbok:index');
  }
}
