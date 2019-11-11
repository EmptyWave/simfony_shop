<?php

declare(strict_types=1);

namespace Controller;

use Controller\PageController\UserAuthenticationController;
use Controller\PageController\UserLogoutController;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
  /**
   * @param Request $request
   * @return Response
   */
    public function authenticationAction(Request $request): Response
    {
      return (new UserAuthenticationController())->action($request);
    }

  /**
   * @param Request $request
   * @return Response
   * @throws Exception
   */
    public function logoutAction(Request $request): Response
    {
      return (new UserLogoutController())->action($request);
    }
}
