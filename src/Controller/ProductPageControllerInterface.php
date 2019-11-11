<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:46
 */

namespace Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

interface ProductPageControllerInterface
{
  /**
   * @param Request $request
   * @param string $id
   * @return null|Response
   */
  public function action(Request $request, string $id): ?Response;
}