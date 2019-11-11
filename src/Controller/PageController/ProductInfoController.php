<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:09
 */

namespace Controller\PageController;

use Controller\ProductPageControllerInterface;
use Framework\BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Service\Order\Basket;
use Service\Product\ProductService;

class ProductInfoController extends BaseController implements ProductPageControllerInterface
{
  /**
   * @param Request $request
   * @param string $id
   * @return Response
   */
  public function action(Request $request, string $id): Response
  {
    $basket = (new Basket($request->getSession()));

    if ($request->isMethod(Request::METHOD_POST)) {
      $basket->addProduct((int)$request->request->get('product'));
    }

    $productInfo = (new ProductService())->getInfo((int)$id);

    if ($productInfo === null) {
      return $this->render('error404.html.php');
    }

    $isInBasket = $basket->isProductInBasket($productInfo->getId());

    return $this->render(
      'product/info.html.php',
      ['productInfo' => $productInfo, 'isInBasket' => $isInBasket]
    );
  }
}