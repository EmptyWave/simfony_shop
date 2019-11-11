<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:07
 */

namespace Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

interface PageControllerInterface
{
  /**
   * @param Request $request
   * @return null|Response
   */
  public function action(Request $request): ?Response;
}