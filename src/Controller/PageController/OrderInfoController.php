<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:10
 */

namespace Controller\PageController;

use Framework\BaseController;
use Controller\PageControllerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Service\Order\Basket;
use Service\User\Security;
use Exception;

class OrderInfoController extends BaseController implements PageControllerInterface
{
  /**
   * @param Request $request
   * @return Response
   * @throws Exception
   */
  public function action(Request $request): Response
  {
    if ($request->isMethod(Request::METHOD_POST)) {
      return $this->redirect('order_checkout');
    }

    $basket = new Basket($request->getSession());
    $productList = $basket->getProductsInfo();
    $totalPrice = $basket->calculateProductsTotalPrice();
    $isLogged = (new Security($request->getSession()))->isLogged();

    return $this->render(
      'order/info.html.php',
      [
        'productList' => $productList,
        'isLogged' => $isLogged,
        'totalPrice' => $totalPrice
      ]
    );
  }
}