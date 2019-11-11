<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:11
 */

namespace Controller\PageController;

use Framework\BaseController;
use Controller\PageControllerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Service\Order\Basket;
use Service\User\Security;
use Service\Billing\Exception\BillingException;
use Service\Communication\Exception\CommunicationException;

class OrderCheckoutController extends BaseController implements PageControllerInterface
{
  /**
   * @param Request $request
   * @return Response
   * @throws BillingException
   * @throws CommunicationException
   */
  public function action(Request $request): Response
  {
    $isLogged = (new Security($request->getSession()))->isLogged();
    if (!$isLogged) {
      return $this->redirect('user_authentication');
    }

    (new Basket($request->getSession()))->checkout();

    return $this->render('order/checkout.html.php');
  }
}