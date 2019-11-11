<?php

declare(strict_types=1);

namespace Controller;

use Controller\PageController\ProductInfoController;
use Controller\PageController\ProductListController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController
{
    /**
     * Информация о продукте
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function infoAction(Request $request, string $id): Response
    {
        return (new ProductInfoController())->action($request, $id);
    }

  /**
   * @param Request $request
   * @return Response
   */
    public function listAction(Request $request): Response
    {
        return (new ProductListController())->action($request);
    }
}
