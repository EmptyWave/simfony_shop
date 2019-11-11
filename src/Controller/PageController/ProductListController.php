<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:09
 */

namespace Controller\PageController;

use Controller\PageControllerInterface;
use Framework\BaseController;
use Service\Product\ProductService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProductListController extends BaseController implements PageControllerInterface
{
  public function action(Request $request): Response
  {
    $productList = (new ProductService())->getAll(
      $request->query->get('sort', '')
    );

    return $this->render(
      'product/list.html.php',
      ['productList' => $productList]
    );
  }
}